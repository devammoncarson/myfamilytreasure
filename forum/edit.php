<?php include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php');
session_start();
?>
<main>
    <h1 class="blueheader">Edit Comment</h1>
    <form class="form" action="index.php" method="post">
        <input type="hidden" name="action" value="edit_save">
        <input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <p class="error"><?php if (isset($error)) {
    echo $error;
} ?></p>
        <label>Name: <?php echo $_SESSION["first_name"]. " ". $_SESSION["last_name"]; ?></label><br><br>

        <label>Comment:</label><br><br>
        <textarea class="inputbox" type="text" name="comment"><?php echo $comment; ?></textarea><br>

        <br><label></label>
        <input class="posteditbutton" type="submit" value="Save Changes"><br>
    </form>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'); ?>
