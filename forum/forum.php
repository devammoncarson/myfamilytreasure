<?php include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php'); ?>
<main>
    <h1 class="blueheader">Carson Family Forum</h1>
    <p class="error"><?php if (isset($error)) {
    echo $error;
} ?></p>
    <section>
        <table>
            <tr>
                <th>NAME</th>
                <th>COMMENT</th>
                <th>DELETE</th>
                <th>EDIT</th>
            </tr>
<?php foreach ($comments as $comment) : ?>
                <tr>
                    <td><?php echo $comment['firstName']; ?></td>
                    <td><?php echo $comment['comment']; ?></td>
                    <td><form action="../index.php" method="post">
                            <input type="hidden" name="action"
                                   value="delete_comment">
                            <input type="hidden" name="comment_id"
                                   value="<?php echo $comment['commentID']; ?>">
                            <input type="hidden" name="user_id"
                                   value="<?php echo $comment['userID']; ?>">
                            <input class=tablebutton type="submit" value="Delete">
                        </form></td>
                    <td>
                        <form action="../index.php" method="post">
                            <input type="hidden" name="action" value="edit">
                            <!--these are hidden from view but they are needed before action can be taken. make sure that your name is the same as what you binded the query placeholder to. The value should have the same as the names in your database-->
                            <input type="hidden" name="comment_id" value="<?php echo $comment['commentID']; ?>">  
                            <input type="hidden" name="user_id" value="<?php echo $comment['userID']; ?>">
                            <input type="hidden" name="comment" value="<?php echo $comment['comment']; ?>">
                            <input class=tablebutton type="submit" value="Edit">
                        </form>
                    </td>
                </tr>
<?php endforeach; ?>
        </table>     
    </section>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'); ?>