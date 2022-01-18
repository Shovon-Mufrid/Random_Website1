<?php
session_start();
require_once('../header.php');
require_once('../Database.php');
require_once('nav.php');

if (!isset($_SESSION['user_status'])) {
    header("location: ../Login.php");
}
// $get_query = "SELECT * FROM banners";
// $from_db = mysqli_query($db, $get_query);
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
                        <div class="card-header"></div>
                        <div class="card-body">
                            
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