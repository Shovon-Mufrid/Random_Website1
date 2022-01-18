<?php

session_start();
require_once("header.php");
// if click on login from url>> 'dashboard' opposite
if(isset($_SESSION['user_status'])){
    header("location: Admin/dashboard.php" );
}
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-4">
                    <div class="card-header bg-warning">
                        <h5 class="card-title mb-0 text-white text-capitalize d-flex justify-content-between">Login Form 
                            <a href="Registration.php" class= "text-black"> Registration </a></h5>
                    </div>
                    <div class="card-body">
                        <form action="login_info.php" method="post">
                            
                        <?php
                        if(isset($_SESSION['login_err'])){ ?>
                            
                            <div class="alert alert-danger" role="alert">
                            <?php
                            echo $_SESSION['login_err']; // from reg.php > session>failed
                            unset($_SESSION['login_err']);// NO REPEAT OF ALERTS
                            ?>
                        </div>

                    <?php
                    }
                    ?>
                    
                        <div class="form-row mb-2">
                            <label class="form-label text-capitalized">User Name</label>
                            <input type="text" class="form-control" placeholder="Your User Name" name="uname">
                        </div>

                        <div class="form-row mb-2">
                            <label class="form-label text-capitalized">E-mail Id</label>
                            <input type="text" class="form-control" placeholder="Email Id" name="email">
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
</section>

<?php
require_once("footer.php");
?>