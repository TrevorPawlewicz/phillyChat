<?php
    include('includes/header.php');
    include('includes/classes/User.php');
    include('includes/classes/Post.php');

    if (isset($_POST['post'])) {
        $post = new  Post($connect, $userLoggedIn);
        $post -> submitPost($_POST['post-text'], 'none');
    }
?>

        <div class="user-details column">

            <a href="<?php echo $userLoggedIn; ?>">
                <img src="<?php echo $user['profile_pic']; ?>"/>
            </a>

            <div class="user-details-left-right">
                <a href="<?php echo $userLoggedIn; ?>">
                    <?php
                        echo $user['first_name'] . " " . $user['last_name'];

                    ?>
                </a>
                <br>
                <?php
                    echo "Posts: " . $user['num_posts']. "<br>";
                    echo "Linkes: " . $user['num_likes'];
                ?>
            </div> <!-- user-details-left-right -->
        </div> <!-- user-details column -->

        <div class="main-column column">
            <form class="post-form" action="index.php" method="POST">
                <textarea name="post-text" id="post-text" placeholder="Post some words..."></textarea>
                <input type="submit" name="post" id="post-text" value="Post">
                <hr>
            </form>

            <?php
                $post = new  Post($connect, $userLoggedIn);
                $post -> loadPostsFriends();
            ?>
        </div>

    </div> <!-- wrapper from header.php -->
</body>
</html>
