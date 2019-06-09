<?php
include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php');
session_start();
?>
<main>
    <h1 class="blueheader">Create a new post</h1>
    <form class="form" action="../index.php" method="post">
        <input type="hidden" name="action" value="add_comment">
        <p class="error"><?php
            if (isset($error)) {
                echo $error;
            }
            ?></p>
        <label>Name: <?php echo $_SESSION["first_name"]. " ". $_SESSION["last_name"]; ?></label>
        <br><br>

        <label>Comment:</label><br><br>
        <textarea class="inputbox" type="text" name="comment"></textarea>
        <br>

        <label>&nbsp;</label><br>
        <input class="posteditbutton" type="submit" value="Add Comment"/>
        <br>
    </form>

</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'); ?>
