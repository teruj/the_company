<?php
session_start();

/*  put this at the top of internal pages  */
if(!$_SESSION['id']){ //if the session id is not set
    header("location: loginRedirect.php");
    exit;
}

include_once "../classes/user.php";

$user = new User;

$userID = $_GET['userID'];
// $userList = $user->getUsers();

$userDetail = $user->getUser($userID);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Edit User</title>
</head>
<body>

    <!-- nav -->
    <nav class="navbar navbar-expand md navbar-dark bg-dark">
        <a href="dashboard.php" class="navbar-brand">
            <h1 class="h3">The Company</h1>
        </a>

        <div class="ml-auto">
            <ul class="navbar-nav">
                <!-- add  session start   at the top of this document-->
                <li class="nav-item">
                    <a href="#" class="nav-link"><?= $_SESSION['username'] ?></a>
                </li>

                <li class="nav-item">
                    <a href="logout.php" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- main dashborad-like  Create a form-->
    <div class="card w-50 my-5 mx-auto border-0">
            <div class="card-header bg-white border-0">
                <h1 class="text-center">EDIT USER</h1>
            </div>

            <div class="card-body">
                <form action="../actions/editUser.php" method="post">

                    <input type="hidden" name="userID" value="<?= $userDetail['id']?>">
                    <!-- technique: send id to next page-->

                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" class="form-control mb-2" required autofocus value="<?= $userDetail['first_name'] ?>">

                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" class="form-control mb-2" required value="<?= $userDetail['last_name']?>">

                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control mb-5" maxlength="15" required value="<?= $userDetail['username'] ?>">

                    <div class="text-right">
                        <button type="submit" class="btn btn-warning btn-sm px-5">Save</button>
                        <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>

                    </div>

                </form>
            </div>
        </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>