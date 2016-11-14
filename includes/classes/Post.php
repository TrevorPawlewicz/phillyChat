<?php
    class Post {
        private $user;
        private $connect;

        public function __construct($connect, $user) {
            $this -> connect = $connect;
            $user_details_query = mysqli_query($connect, "SELECT * FROM users WHERE username='$user'");
            $this -> user_object = new User($connect, $user);
        }

        public function submitPost($body, $user_to) {
            $body = strip_tags($body);
            $body = mysqli_real_escape_string($this -> connect, $body);
            $check_empty = preg_replace('/\s+/', '', $body); // delete all spaces.

            if ($check_empty != "") {

                // current date and time:
                $date_added = date("Y-m-d:i:s");

                // get username
                $added_by = $this -> user_object -> getUsername();

                // if user is not on own profile, user_to is 'none'
                if ($user_to == $added_by) {
                    $user_to = "none";
                }

                // insert post:
                $query = mysqli_query($this -> connect, "INSERT INTO posts VALUES('', '$body', '$added_by', '$user_to', '$date_added', 'no', 'no', '0')");
                $returned_id = mysqli_insert_id($this -> connect);

                //insert notification


                // update post count for user:
                $num_posts = $this -> user_object -> getNumPosts();
                $num_posts++;
                $update_query = mysqli_query($this -> connect, "UPDATE users SET num_posts='$num_posts' WHERE username='$added_by'");
            }
        }
    }
?>