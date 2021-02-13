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
    $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE category_id = $id";
        $result = mysqli_query($conn, $sql);
    
        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['category_name'];
            $catdesc = $row['category_description'];
        }

    ?>

    <?php
    $alert_form = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        //INSERT INTO DB

        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];

        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_user_id`, `thread_cat_id`, `time`) VALUES ('$th_title', '$th_desc', '0', '$id', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $alert_form = true;
        if($alert_form){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your query has been submitted. You can now get your answers from other peers.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
        }

    }

    ?>


    <div class="jumbotron my-3 mx-3">
        <h2 class=" display-4">Welcome to <?php echo $catname;?> forums</h2>
        <p class="lead"><?php echo $catdesc;?></p>
        <hr class="my-4">
        <p>This is peer to peer forum for sharing knowledge and growing together.
        <p style="color: red">Rules you must remember:<br>
            1. Spam / Advertising / Self-promote in the forums not allowed.<br>
            2. Do not post copyright-infringing material.<br>
            3. Do not post “offensive” posts, links or images.<br>
            4. Do not cross post questions.<br>
            5. Do not PM users asking for help.<br>
            6. Remain respectful of other members at all times.</p>
        </p>
        <p class="lead">
            <a class="btn btn-success btn-lg" href="https://opentuition.com/forums/forum-rules/" target="_blank"
                role="button">Learn
                more</a>
        </p>
    </div>

    <div class="container">
        <h2>Start your discussion</h2>
        <form action="<?php $_SERVER['REQUEST_URI']?>" method="post">
            <div class="form-group">
                <label for="title">Ask your question</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Your question will be visible to everyone</small>
            </div>

            <div class="form-group">
                <label for="desc">Elaborate your concern</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <div class="container my-4">
        <h1 class="py-4" style="padding:4px;">Browse questions</h1>
        <?php

        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id";
        $result = mysqli_query($conn, $sql);
        $noresult = true;
    
        while($row = mysqli_fetch_assoc($result)){
            $noresult = false;
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $id = $row['thread_id'];
        
        echo '<div class="media">
            <img class="mr-4 my-3" src="partials/image.png" width="100" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-3 my-3"><a class="text-dark" href="http://localhost/My/Forum_website/threadInfo.php?threadid='.$id.'">'.$title.'</a></h5>
               '.$desc.'
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