<?php

session_start();

//AUTHENTICATE LOGIN
function validate_login($email, $password) {
    global $db;
    $query = 'SELECT * FROM users
            WHERE
            email = :email
            AND
            password = :password';

    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $user_array = $statement->fetch();
    $statement->closeCursor();
    return $user_array;
}

//END LOGIN

//GET COMMENTS ASSOCIATED WITH USER
function get_comments_by_user_id($user_id) {
    global $db;
    $query = 'SELECT * FROM comments
              WHERE comments.userID = :user_id
              ORDER BY commentID';
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->execute();
    $comments = $statement->fetchAll();
    $statement->closeCursor();
    return $comments;
}

//DISPLAY ALL COMMENTS
function get_comments() {
    global $db;
    $query = 'SELECT * FROM comments
              ORDER BY commentID DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $comments = $statement->fetchAll();
    $statement->closeCursor();
    return $comments;
}

//BEGIN CRUD
//------------------------
//ADD COMMENT
function add_comment($comment) {
    global $db;
    $query = 'INSERT INTO comments
             (userID, firstName, comment)
             VALUES
             (:userID, :firstName, :comment)';
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $_SESSION["user_id"]);
	$statement->bindValue(':firstName', $_SESSION["first_name"]);
    $statement->bindValue(':comment', $comment);
    $statement->execute();
    $statement->closeCursor();
    return $statement;
}

//EDIT COMMENT
function edit_comment($comment_id, $comment) {
    global $db;
    $query = 'UPDATE comments
             SET 
             comment = :comment
             WHERE 
             commentID = :comment_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':comment', $comment);
    $statement->bindValue(':comment_id', $comment_id);
    $result = $statement->execute();
    $statement->closeCursor();
    return $result;
}

//DELETE COMMENT
function delete_comment($comment_id) {
    global $db;
    $query = 'DELETE FROM comments
              WHERE commentID = :comment_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':comment_id', $comment_id);
    $statement->execute();
    $statement->closeCursor();
}
