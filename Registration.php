<?php

session_start();
require_once('header.php');
//error_reporting(0);

// if log in u can access in dashboard and not in reg page
if(isset($_SESSION['user_status'])){
    header("location: Admin/dashboard.php" );
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg6-m-auto">
            <div class="card mt-3">
                <div class="card-header bg-success text-white">
                    <h4 class="card-title mb-0 text-white text-capitalize d-flex justify-content-between">
                    Registration Form <a href="Login.php" class= "text-white"> Log In </a>
                    </h4>
                </div>

                <div class="card-body">
                    <?php
                    if (isset($_SESSION['err_msg'])) { ?>

                        <div class="alert alert-danger" role="alert">
                            <?php
                            echo $_SESSION['err_msg']; // from reg.php > session>failed
                            unset($_SESSION['err_msg']);// NO REPEAT OF ALERTS
                            ?>
                        </div>

                    <?php
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['success_msg'])) { ?>
                       
                            <div class="alert alert-success" role="alert">
                                <?php
                                echo $_SESSION['success_msg']; // from reg.php > session >success
                                unset($_SESSION['success_msg']);
                                ?>
                            </div>                       
                    <?php
                    }
                    ?>

                    <form action="reg.php" method="post">
                        <div class="form-row mb-2">
                            <label class="form-label text-capitalized">Name</label>
                            <input type="text" class="form-control" placeholder="Your Name" name="name">
                        </div>
                        <div class="form-row mb-2">
                            <label class="form-label text-capitalized">User Name</label>
                            <input type="text" class="form-control" placeholder="Your User Name" name="uname">
                        </div>
                        <div class="form-row mb-2">
                            <label class="form-label text-capitalized">E-mail Id</label>
                            <input type="text" class="form-control" placeholder="Emial Id" name="email">
                        </div>
                        <div class="form-row mb-2">
                            <label class="form-label text-capitalized">Phone Number</label>
                            <input type="number" class="form-control" placeholder="Your Phone Number" name="phone">
                        </div>
                        <div class="form-row mb-2">
                            <label class="form-label text-capitalized">Password</label>
                            <input type="password" class="form-control" name="pass" placeholder="Password should be min 6 digits & put at least 1 char,1 capital and 1 small letters">
                        </div>

                        <div class="form-row mb-2">
                            <button type="submit" class="btn btn-success" name="submit"> Submit</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
require_once('footer.php');
?>