<?php

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="http://localhost/My/Forum_website/index.php">Learn and grow</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="http://localhost/My/Forum_website/index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/My/Forum_website/about.php">About</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="http://localhost/My/Forum_website/contact.php">Contact</a>
        </li>

    </ul>

    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class="mx-3">
    <button class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-outline-success" data-toggle="modal" data-target="#SignupModal">Sign up</button>
    </div>
</div>
</nav>';

include 'partials/Login_modal.php';
include 'partials/SignUp_modal.php';

?>