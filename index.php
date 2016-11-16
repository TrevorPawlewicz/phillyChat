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

            <div class="posts-area"></div>
    		<img id="loading" src="assets/images/icons/loading.gif">
        </div>

        <script>
            var userLoggedIn = '<?php echo $userLoggedIn; ?>';
            // jQuery
            $(document).ready(function() {
                $('#loading').show();

                //Original ajax request for loading first posts
                $.ajax({
                    url: "includes/handlers/ajax_load_posts.php",
                    type: "POST",
                    data: "page=1&userLoggedIn=" + userLoggedIn,
                    cache:false,

                    success: function(data) {
                        $('#loading').hide();
                        $('.posts-area').html(data);
                    }
                });

                $(window).scroll(function() {
                    var height = $('.posts-area').height(); //Div containing posts
                    var scroll_top = $(this).scrollTop();
                    var page = $('.posts-area').find('.nextPage').val();
                    var noMorePosts = $('.posts-area').find('.noMorePosts').val();


                    console.log("scrollHeight = " + document.body.scrollHeight); // 1343
                    console.log("scrollTop = " + document.documentElement.scrollTop); // 0
                    console.log("innerHeight = " + window.innerHeight); // 746

                    if ((document.body.scrollHeight == document.documentElement.scrollTop + window.innerHeight) && noMorePosts == 'false') {
                        $('#loading').show();

                        var ajaxReq = $.ajax({
                            url: "includes/handlers/ajax_load_posts.php",
                            type: "POST",
                            data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
                            cache:false,

                            success: function(response) {
                                $('.posts-area').find('.nextPage').remove(); //Removes current .nextpage
                                $('.posts-area').find('.noMorePosts').remove(); //Removes current .nextpage

                                $('#loading').hide();
                                $('.posts-area').append(response);
                            }
                        });

                    } //End if

                    return false;

                }); //End (window).scroll(function())
            });
        </script>


    </div> <!-- wrapper from header.php -->
</body>
</html>
