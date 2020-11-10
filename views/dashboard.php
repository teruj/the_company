<?php
session_start();

/*  put this at the top of internal pages  */
if(!$_SESSION['id']){ //if the session id is not set
    header("location: loginRedirect.php");
    exit;
}

include_once "../classes/user.php";

$user = new User;
$userList = $user->getUsers();

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
    <title>Dashboard</title>
</head>
<body>
<!-- <?= $_SERVER['REQUEST_URI'] ?> -->
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

    <main class="container" style="padding-top: 80px;">
        <table class="table table-hover w-50 mx-auto">
            <thead class="thead-light">
                <th>#</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>USERNAME</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                while($userDetails = $userList->fetch_assoc()){
                ?>
                    <tr>
                        <td><?= $userDetails['id'] ?></td>
                        <td><?= $userDetails['first_name'] ?></td>
                        <td><?= $userDetails['last_name'] ?></td>
                        <td><?= $userDetails['username'] ?></td>
                        <td>
                            <a href="editUser.php?userID=<?= $userDetails['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="removeUser.php?userID=<?= $userDetails['id'] ?>" class="btn btn-danger btn-sm">Remove</a>
                        </td>

                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>

        <div class="card w-50 my-5 mx-auto">
            <div class="card-body">
                <form action="../actions/register.php" method="post">
                <!-- <form action="dashboard.php" method="post"> -->
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" class="form-control mb-2" required autofocus>

                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" class="form-control mb-2" required>

                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control mb-2" maxlength="15" required>

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control mb-5" required>

                    <button type="submit" class="btn btn-success btn-block" name="btnRegister" value="dashboard">Add User</button>
                </form>
            </div>
        </div>
    </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>