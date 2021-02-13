<?php

include 'partials/db_connect.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Coding shiksha</title>


</head>

<body>
    <?php include 'partials/_nav.php'; ?>

    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id = $id";
    $result = mysqli_query($conn, $sql);
    $noresult = true;

       while($row = mysqli_fetch_assoc($result)){
           $noresult = false;
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
       }

       if($noresult){
            echo '<h4>Be the first to ask question!!</h4>';
        }
            
    ?>

    <?php
    $alert_form = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        //INSERT INTO DB

        $comment = $_POST['comment'];

        $sql = "INSERT INTO `comment` (`comment_content`, `thread_id`, `comment_by`, `time`) VALUES ('$comment', '$id', '0', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        $alert_form = true;
        if($alert_form){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your comment has been added.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
        }

    }

    ?>


    <div class="jumbotron my-3 mx-3">
        <h2 class=" display-4"> <?php echo $title; ?> </h2>
        <p class="lead"> <?php echo $desc; ?> </p>
        <hr class="my-4">
        <p style="font-weight:bold;">
            Posted by: Hetarthi
        </p>

    </div>

    <!-- Form -->
    <div class="container">
        <h2>Post a comment</h2>
        <form action="<?php $_SERVER['REQUEST_URI']?>" method="post">

            <div class="form-group">
                <label for="comment">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Post comment</button>
        </form>
    </div>



    <div class="container my-4">
        <h3 style="font-weight:bold;">Discussions:</h3>
        <?php

        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comment` WHERE thread_id = $id";
        $result = mysqli_query($conn, $sql);
        $noresult = true;
    
        while($row = mysqli_fetch_assoc($result)){
            $noresult = false;
            $content = $row['comment_content'];
            $id = $row['comment_id'];
            $time = $row['time'];
        
        echo '<div class="media">
            <img class="mr-4 my-3" src="partials/image.png" width="100" alt="Generic placeholder image">
            <div class="media-body my-4">
            <p class="font-weight-bold my-0">Anonymous user at ' .date($time).'</p>
                '.$content.'
            </div>
        </div>';
        
        }

        if($noresult){
            echo '<h4>Be the first to ask question!!</h4>';
        }


    ?>

    </div>


    <?php include 'partials/Footer.php'; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->

</body>

</html>