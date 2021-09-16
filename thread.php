<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <style>
        #ques {
            min-height: 400px;
        }

        </style>
        <title>Welcome to Doubt Discussion forum</title>
    </head>

    <body>
        <?php include 'partials/_dbconnect.php'; ?>
        <?php include 'partials/_header.php'; ?>
        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `thread` WHERE thread_id=$id";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['thread_title']; 
            $desc = $row['thread_desc']; 
            $thread_user_id = $row['thread_user_id']; 
            $sql2 = "SELECT `user_name` FROM `user` WHERE Sno = '$thread_user_id'";
            $result2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $posted_by = $row2['user_name'];
        }
        ?>
        <?php
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            $comment = $_POST['comment'];
            $comment = str_replace("<", "&lt;", $comment);
            $comment = str_replace("<", "&gt;", $comment);
            $Sno = $_POST['Sno'];
            echo $Sno;
            // $sql ="INSERT INTO `comment` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$Sno', current_timestamp())";
            // $result=mysqli_query($conn,$sql);
            // $showAlert = true;
            // if($showAlert)
            // {
            //     echo '
            //     <div class="alert alert-success alert-dismissible fade show" role="alert">
            //     <strong>Success!</strong> Your comment has been added! 
            //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //     <span aria-hidden="true">&times;</span>
            //     </button>
            //     </div>';
            // }
        }
        ?>
        <div class="container">
            <div class="jumbotron">
                <h1 class="display-4"><?php echo $title; ?></h1>
                <p class="lead"><?php echo $desc; ?></p>
                <hr class="my-4">
                <p>This forum is peer to peer forum. Do not post “offensive” posts, links or images. Do not cross post
                    questions. Do not PM users asking for help. Remain respectful of other members at all times.
                </p>
                <p>Posted by:<em> <?php echo $posted_by; ?></em></p>
            </div>

            <?php
            if(isset($_SESSION['loggedin']) &&$_SESSION['loggedin']==true){
                echo '<div class="container">
                    <h1 class="py-2">Post a comment</h1>
                    <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
                        <div class="form-group">
                            <label for="comment">Type your comment</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                            <input type="hidden" name="Sno" value="'.$_SESSION["Sno"].'">
                        </div>
                    <button type="submit" class="btn btn-success">Post</button>
                    </form>
                </div>';
            }
            else{
                echo '<div class="alert alert-dark" role="alert">Please Login to post your comment.</div>';
            }
            ?>
            <div class="container" id="ques">
                <h1 class="py-2">Discussions</h1>
                <?php
                $noresult=true;
                $id = $_GET['threadid'];
                $sql = "SELECT * FROM `comment` WHERE thread_id=$id";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    $noresult=false;
                    $id = $row['comment_id']; 
                    $content = $row['comment_content'];  
                    $time = $row['comment_time'];
                    $thread_user_id = $row['comment_by'];
                    $sql2 = "SELECT `user_name` FROM `user` WHERE Sno = '$thread_user_id'";
                    $result2 = mysqli_query($conn,$sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    echo '<div class="media">
                        <img src="img/user default.jpg" class="mr-3" width="54px" alt="...">
                        <div class="media-body">
                            <p class="font-weight-bold my-0">'.$row2['user_name'].' at '.$time.'</p>'.$content.'
                        </div>
                    </div>';
                }
                if($noresult){
                    echo '<div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <p class="display-4">No Comments found</p>
                            <p class="lead">Be the first person to comment</p>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
        <?php include 'partials/_footer.php'; ?>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
                crossorigin="anonymous">
            </script>
    </body>

</html>
