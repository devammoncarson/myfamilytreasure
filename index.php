<?php

require 'model/connection_db.php';
require 'model/forum_process_db.php';

//---DEFAULT TO LOGIN PAGE---
$action = filter_input(INPUT_POST, 'action');
$actions = filter_input(INPUT_GET, 'actions');
if ($action == NULL && $actions == NULL) {
    include('view/login.php');
}

//---VALIDATE AND AUTHENTICATE USER LOGIN---
if ($action === 'login') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($email == NULL || $email == FALSE) {
        $error = "Invalid email. Please re-enter your email. (ex: johnsmith@example.com)";
    } else if ($password == NULL || $password == false) {
        $error = "Please enter";
    } else {
        $user_info = validate_login($email, $password);
        $user_id = $user_info['userID'];
        $lifetime = 60 * 60; // 1 hour
        session_set_cookie_params($lifetime, '/');
        session_start();
        $_SESSION["user_id"] = $user_info['userID'];
        $_SESSION["first_name"] = $user_info['firstName'];
        $_SESSION["last_name"] = $user_info['lastName'];
        $_SESSION["rights"] = $user_info['rights'];

        if ($user_id !== NULL) {
            $comments = get_comments();
            include('forum/forum.php');
        } else {
            $error = "Your email or password was not found in our records. Please try again or contact your system administrator.";
            include('view/login.php');
        }
    }
//RETURN TO FORUM WHEN "HOME" IS CLICKED
} else if ($actions === 'goforum') {
    $comments = get_comments();
	include('forum/forum.php');
	
//END SESSION WHEN LOG OUT IS CLICKED
} else if ($actions === 'logout') {
    setcookie("lifetime", "", time() - 3600);
	session_destroy();
    header("Location: /index.php");
}

//---ALLOW THE USER TO POST A COMMENT---   
else if ($action === 'add_comment') {
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
    if ($comment == NULL || $comment == FALSE) {
        $error = "ERROR! You cannot submit an empty comment.";
        include('forum/post.php');
    } else {
        add_comment($comment);
        $comments = get_comments();
        include('forum/forum.php');
    }
}

//---ALLOW THE USER TO EDIT A COMMENT---
if ($action === 'edit') {

// GET THE COMMENT AND USER
    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
    $comment_id = filter_input(INPUT_POST, 'comment_id', FILTER_VALIDATE_INT);
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
    if ($user_id != $_SESSION["user_id"] && $_SESSION["rights"] != 1) {
        $error = "ERROR! Please don't EDIT someone else's comment! You may only edit your own.";
        $comments = get_comments();
        include('forum/forum.php');
    } else {
        include('forum/edit.php');
	}
	
//MAKE THE SAVE COMMENT BUTTON WORK
} else if ($action === 'edit_save') {

// Get the comment/user data
    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
    $comment_id = filter_input(INPUT_POST, 'comment_id', FILTER_VALIDATE_INT);
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
    if ($comment == NULL || $comment == FALSE) {
        $error = "ERROR! You cannot submit an empty comment.";
        include('forum/edit.php');
    } else {
        $result = edit_comment($comment_id, $comment);
        if (!$result) {
            header("Location: /model/error.php");
        }
        $comments = get_comments();
        include('forum/forum.php');
    }
}

//---ALLOW THE USER TO DELETE A COMMENT---
else if ($action === 'delete_comment') {
    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
    $comment_id = filter_input(INPUT_POST, 'comment_id', FILTER_VALIDATE_INT);
    if ($user_id != $_SESSION["user_id"] && $_SESSION["rights"] != 1) {
        $comments = get_comments();
        $error = "ERROR! Please don't DELETE someone else's comment! You may only delete your own.";
        include('forum/forum.php');
    } else {
        delete_comment($comment_id);
        $comments = get_comments();
        include('forum/forum.php');
    }
}

