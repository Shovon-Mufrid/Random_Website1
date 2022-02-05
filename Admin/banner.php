<?php
session_start();
require_once('../header.php');
require_once('../Database.php');
require_once('nav.php');



if (!isset($_SESSION['user_status'])) {
    header("location: ../Login.php");
}
$get_query = "SELECT * FROM banners";
$from_db = mysqli_query($db, $get_query);
$after_assoc = mysqli_fetch_assoc($from_db);
?>

<section>
    <div class="container">
        <div class='row'>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class='card-title text-capitalize'> Banner Form</h5>
                    </div>
                    <div class="card-body">
                        <!--enctype= multipart/form-data: for image file method. -->
                        <form action="banner_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label text-primary"> Banner Sub Title</label>
                                <input type="text" name="banner_sub_title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary"> Banner Title</label>
                                <input type="text" name="banner_title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary"> Banner Details</label>
                                <input type="text" name="banner_details" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary"> Banner Image</label>
                                <input type="file" name="banner_image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="form-control btn btn-success"> Add Banner </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class='card-title text-capitalize'> Banner List</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-border">
                            <thead>
                                <th>ID</th>
                                <th>Banner Sub Title</th>
                                <th>Banner Title</th>
                                <th>Banner Details</th>
                                <th>Location</th>
                                <th>Active Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($from_db as $key => $banner) :

                                ?>
                                    <!-- from database -->
                                    <!-- key is used to add id serial to table from 1 -->
                                    <tr>
                                        <td><?= $key + 1 ?> </td>
                                        <td><?= $banner['ban_sub_title'] ?></td>
                                        <td><?= $banner['ban_title'] ?></td>
                                        <td><?= $banner['details'] ?></td>
                                        <td>
                                            <!-- uploads folder is given in db -->
                                            <img src="../<?= $banner['image_location'] ?>" alt="" style="width:100px;">
                                        </td>
                                        <td>
                                            <?php
                                            if ($banner['read_status'] == 1) :
                                            ?>
                                                <span class="badge bagde-sm bg-success"> Active</span>
                                            <?php
                                            else :
                                            ?>
                                                <span class="badge bagde-sm bg-warning"> warning</span>
                                            <?php
                                            endif
                                            ?>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <?php
                                                if ($banner['read_status'] == 1) :
                                                ?>
                                                    <a href="ban_deact.php?id=<?= $banner['id'] ?>" class="btn btn-success">Make Deactive</a>
                                                <?php
                                                else :
                                                ?>
                                                    <a href="ban_act.php?id=<?= $banner['id'] ?>" class="btn btn-primary">Make Active</a>
                                                <?php
                                                endif
                                                ?>
                                                <a href="banner_edit.php?id=<?= $banner['id'] ?>" class="btn btn-warning">Edit</a>
                                                <a href="banner_delete.php?id=<?= $banner['id'] ?>" class="btn btn-danger">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                endforeach
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php
require_once('../footer.php');
?>

<!-- Sweet alert for banner add -->
<?php if(isset($_SESSION['banner_success'])): ?>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: '<?= $_SESSION['banner_success'] ?>'
    })
</script>

<?php endif  ?>

<?php unset($_SESSION['banner_success']) ?>