<?php
session_start();
require_once '../header.php';
require_once 'nav.php';
require_once '../Database.php';
$login_email = $_SESSION['email']; // login_info>session[email]
$get_query = "SELECT Name,Email,Phone FROM registration WHERE Email='$login_email' ";
$db_result = mysqli_query($db, $get_query);
$after_assoc = mysqli_fetch_assoc($db_result); //fetching from database

if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}
?>

        <!-- After password change in pass_change_post    -->
<nav>
    <div class= "row text-center">
        <?php
            if (isset($_SESSION['pass_change_success'])) { ?>

                <div class="alert alert-success" role="alert">
                    <?php
                    echo $_SESSION['pass_change_success']; // from reg.php > session>failed
                    unset($_SESSION['pass_change_success']); // NO REPEAT OF ALERTS after refresh
                    ?>
                </div>

            <?php
            }
            ?>
    </div>
</nav>  

<section>
    <div class="contaner">
        <div class="row">
                        <div class="col-lg-8 m-auto">
                <div class="card mt-4">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-capitalized text-light d-flex justify-content-between">Profile Information
                            <a href="p_edit.php" class="btn btn-sm btn-warning text-dark">Edit</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <p><span class="text-primary text-capitalized">Name:</span><?= $after_assoc['Name'] ?> </p>
                        <p><span class="text-primary text-capitalized">Email:</span><?= $after_assoc['Email'] ?> </p>
                        <p><span class="text-primary text-capitalized">Phone:</span><?= $after_assoc['Phone'] ?> </p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>




<?php

require_once '../footer.php';

?>