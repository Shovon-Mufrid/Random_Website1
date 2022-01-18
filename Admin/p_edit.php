<?php
    session_start();
    require_once '../header.php';
    require_once 'nav.php';
    require_once '../Database.php';
    $login_email= $_SESSION['email']; // login_info>session[email]
    $get_query = "SELECT Name,Email,Phone FROM registration WHERE Email='$login_email' ";
    $db_result = mysqli_query($db, $get_query);

    $after_assoc = mysqli_fetch_assoc($db_result); //fetching from database

    if(!isset($_SESSION['user_status'])){
            header('location: ../login.php');
    }
?>

<section>
    <div class="contaner">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card mt-4">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-capitalized text-light d-flex justify-content-between">Profile Edit
                        </h5>
                    </div>
                    <div class="card-body">
                    <?php
                    if (isset($_SESSION['profile_err'])) { ?>

                        <div class="alert alert-danger" role="alert">
                            <?php
                            echo $_SESSION['profile_err']; // from reg.php > session>failed
                            unset($_SESSION['profile_err']);// NO REPEAT OF ALERTS after refresh
                            ?>
                        </div>

                    <?php
                    }
                    ?>

                        <form action="p_edit_post.php" method="post">
                            <div class="mb-3">
                                <label class="text-primary">Name</label>
                                <input type="text" name='name' class='form-control' value='<?=$after_assoc['Name']?>'>
                            </div>
                            <div class="mb-3">
                                <label class="text-primary">Email</label>
                                <input type="hidden" name='email' class='form-control' value='<?=$after_assoc['Email']?>'>
                            </div>
                            <div class="mb-3">
                                <label class="text-primary">Phone</label>
                                <input type="text" name='phone' class='form-control' value='<?=$after_assoc['Phone']?>'>
                            </div>
                            <div class="mb-3">
                                <input class="bg-primary text-light" type="submit" name='submit' value='Update'>
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