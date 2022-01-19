<?php
session_start();
require_once('../header.php');
require_once('../Database.php');
require_once('nav.php');

if (!isset($_SESSION['user_status'])) {
    header("location: ../Login.php");
}
$get_query = "SELECT * FROM service_heads";
$from_db = mysqli_query($db, $get_query);
// $after_assoc = mysqli_fetch_assoc($from_db);
?>

<section>
    <div class="container">
        <div class="row p-3">
            <div class="col-lg-4">
                <div class="mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title text-success">Service Heading Form</h5>
                        </div>
                        <div class="card-body">
                            <form action="service_head_post.php" method="post">
                                <div class="mb-3">
                                    <label class="form-label"> Black Heading</label>
                                    <input type="text" class="form-control" name="black_head">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> Color Heading</label>
                                    <input type="text" class="form-control" name="color_head">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> Sub Heading</label>
                                    <input type="text" class="form-control" name="sub_head">
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
                            <h4 class="card-title text-info text-center">Service Heading Table</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th>Black Heading</th>
                                    <th>Color Heading</th>
                                    <th>Sub Heading</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach($from_db as $service_head): ?>
                                        <td><?= $service_head['black_head']?></td>
                                        <td><?= $service_head['color_head']?></td>
                                        <td><?= $service_head['sub_head']?></td>
                                        <td>
                                            <?php if($service_head['active_status'] == 2): ?>
                                             <a href="service_head_active.php?id=<?= $service_head['id'] ?>" class="btn btn-sm btn-success"> Make Active   </a> 
                                            <?php else: ?>  
                                                <a href="#" class="btn btn-sm btn-danger"> Make Dective   </a>           
                                            <?php endif?>


                                            </td>
                                        <!-- change from localhost if active status is not given -->
                                    </tr>
                                    <?php endforeach ?>
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