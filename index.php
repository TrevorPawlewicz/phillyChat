<?php
    include('includes/header.php');
?>

        <div class="user-details column">

            <a href="#">
                <img src="<?php echo $user['profile_pic']; ?>"/>
            </a>

            <div class="user-details-left-right">
                <a href="#">
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
        </div>

    </div> <!-- wrapper -->
</body>
</html>
