<?php
session_start();
require_once('../header.php');
require_once('../Database.php');
require_once('nav.php');

if (!isset($_SESSION['user_status'])) {
    header("location: ../Login.php");
}
$get_query = "SELECT * FROM funfacts";
$from_db = mysqli_query($db, $get_query);

?>

<section>
    <div class="container">
        <div class="row p-3">
            <div class="col-lg-4">
                <div class="mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title text-success">Fun-Fact Add Form</h5>
                        </div>
                        <div class="card-body">
                            <form action="funfact_head_post.php" method="post">
                                <div class="mb-3">
                                    <label class="form-label"> Sub Heading</label>
                                    <input type="text" class="form-control" name="sub_head"
                                     value="<?= (isset($_SESSION['sub_head_done']) ? $_SESSION['sub_head_done'] : '' )?>">

                                    <?php if(isset($_SESSION['sub_err'])): ?>
                                      <small class="text-danger"><?= $_SESSION['sub_err'] ?>  </small> 
                                      <?php unset($_SESSION['sub_err']) ?>
                                     <?php endif ?>   
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"> White Heading</label>
                                    <input type="text" class="form-control" name="white_head"
                                    value="<?= (isset($_SESSION['white_head_done']) ? $_SESSION['white_head_done'] : '' )?>">
                                    
                                    <?php if(isset($_SESSION['white_err'])): ?>
                                      <small class="text-danger"><?= $_SESSION['white_err'] ?>  </small> 
                                      <?php unset($_SESSION['white_err']) ?>
                                     <?php endif ?> 
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"> Color Heading</label>
                                    <input type="text" class="form-control" name="color_head">
                                    <?php if(isset($_SESSION['color_err'])): ?>
                                      <small class="text-danger"><?= $_SESSION['color_err'] ?>  </small> 
                                      <?php unset($_SESSION['color_err']) ?>
                                     <?php endif ?> 
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> Paragraph 1</label>
                                    <input type="text" class="form-control" name="para1">
                                    <?php if(isset($_SESSION['para1_err'])): ?>
                                      <small class="text-danger"><?= $_SESSION['para1_err'] ?>  </small> 
                                      <?php unset($_SESSION['para1_err']) ?>
                                     <?php endif ?> 
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> Paragraph 2</label>
                                    <input type="text" class="form-control" name="para2">
                                    <?php if(isset($_SESSION['para2_err'])): ?>
                                      <small class="text-danger"><?= $_SESSION['para2_err'] ?>  </small> 
                                      <?php unset($_SESSION['para2_err']) ?>
                                     <?php endif ?> 
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
                            <h4 class="card-title text-info text-center">Fun Fact Table</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th>Sub Head</th>
                                    <th>White Head</th>
                                    <th>Color Head</th>
                                    <th>Paragraph1</th>
                                    <th>Paragraph2</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php foreach($from_db as $funfact): ?>
                                        
                                        <tr>
                                            <td><?= $funfact['Sub_head']?></td>
                                            <td><?= $funfact['White_head']?></td>
                                            <td><?= $funfact['Color_head']?></td>
                                            <td><?= $funfact['Paragraph1']?></td>
                                            <td><?= $funfact['Paragraph2']?></td>
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