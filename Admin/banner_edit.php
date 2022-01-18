<?php
session_start();
require_once('../header.php');
require_once('../Database.php');
require_once('nav.php');



if (!isset($_SESSION['user_status'])) {
    header("location: ../Login.php");
}

$id = $_GET['id']; // if we send data by link, we use GET method


$get_q = "SELECT * FROM banners WHERE id = $id";
$banner_from_db = mysqli_query($db, $get_q);

$after_assoc = mysqli_fetch_assoc($banner_from_db);

?>

<section>
    <div class="container">
        <div class='row p-5'>
            <div class="col-lg-12 m-auto">
                <div class="card p-3">
                    <div class="card-header bg-warning">
                        <h5 class='card-title text-capitalize text-center'> Banner Edit</h5>
                    </div>
                    <div class="card-body">
                        <!--enctype= multipart/form-data: for image file method. -->
                        <form action="banner_edit_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                               <!-- catching value to edit we take id and hide it -->
                                <input type="hidden" name="id" class="form-control" value="<?= $after_assoc['id'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary"> Banner Sub Title</label>
                                <input type="text" name="banner_sub_title" class="form-control" value="<?= $after_assoc['ban_sub_title'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary"> Banner Title</label>
                                <input type="text" name="banner_title" class="form-control" value="<?= $after_assoc['ban_title'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary"> Banner Details</label>
                                <input type="text" name="banner_details" class="form-control" value="<?= $after_assoc['details'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary"> Banner Image</label>
                                <input type="file" name="banner_image" class="form-control">
                            </div>
                            <div class="mb-3">
                            <img src="../<?= $after_assoc['image_location'] ?>" alt="" style="width:150px;">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="form-control btn btn-success"> Add Banner </button>
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