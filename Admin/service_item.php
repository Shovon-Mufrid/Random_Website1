<?php
session_start();
require_once('../header.php');
require_once('../Database.php');
require_once('nav.php');

if (!isset($_SESSION['user_status'])) {
    header("location: ../Login.php");
}
$get_query = "SELECT * FROM service_items";
$from_db = mysqli_query($db, $get_query);

?>

<section>
    <div class="container">
        <div class="row p-3">
            <div class="col-lg-4">
                <div class="mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title text-success">Service Item Form</h5>
                        </div>
                        <div class="card-body">
                            <form action="service_item_post.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label"> Heading </label>
                                    <input type="text" class="form-control" name="item_heading">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> Details</label>
                                    <input type="text" class="form-control" name="item_details">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> Image</label>
                                    <input type="file" class="form-control" name="item_image">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="form-control btn btn-success"> Add Heading </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-info text-center">Service Item Table</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th> Heading</th>
                                    <th>Details</th>
                                    <th>Image</th>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($from_db as $service_item):
                                    ?>
                                    <tr>
                                        <td><?= $service_item['item_heading']?></td>
                                        <td><?= $service_item['item_details']?></td>
                                        <td><img src="../<?=$service_item['image']?>" alt="" style="width:100px" > </td>
                                        <!-- change from localhost if active status is not given -->
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
    </div>
</section>


<?php
require_once('../footer.php');
?>