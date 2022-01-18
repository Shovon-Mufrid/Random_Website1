<?php
    session_start();
    require_once '../header.php';
    require_once 'nav.php';
    require_once '../Database.php';

    if(!isset($_SESSION['user_status'])){
            header('location: ../login.php');
    }
?>

<section>
    <div class="contaner">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card mt-4">
                    <div class="card-header bg-warning">
                        <h5 class="card-title text-capitalized text-light d-flex justify-content-between">Password Change</h5>
                    </div>
                    <div class="card-body">
                    <?php
                    if (isset($_SESSION['pass_change_error'])) { ?>

                        <div class="alert alert-danger" role="alert">
                            <?php
                            echo $_SESSION['pass_change_error']; // from reg.php > session>failed
                            unset($_SESSION['pass_change_error']);// NO REPEAT OF ALERTS after refresh
                            ?>
                        </div>

                    <?php
                    }
                    ?>
                    <form action="pass_chng_post.php" method="post">
                            <div class="mb-3">
                                <label class="text-primary">Previous Password</label>
                                <input type="text" name='pre_pass' class='form-control'>
                            </div>
                            <div class="mb-3">
                                <label class="text-primary">New Password</label>
                                <input type="text" name='new_pass' class='form-control' >
                            </div>
                            <div class="mb-3">
                                <label class="text-primary">Re-enter Password</label>
                                <input type="text" name='con_pass' class='form-control'>
                            </div>
                            <div class="mb-3">
                                <input class="bg-primary text-light" type="submit" name='submit' value='Change Password'>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<?php 

    require_once '../footer.php';

?>