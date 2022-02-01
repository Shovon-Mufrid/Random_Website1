<?php
session_start();
require_once('../header.php');
require_once('../Database.php');
require_once('nav.php');

if (!isset($_SESSION['user_status'])) {
    header("location: ../Login.php");
}
$get_query = "SELECT * FROM funfacts_items";
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
                            <form action="funfact_items_post.php" method="post">
                                <div class="mb-3">
                                    <label class="form-label"> Digit</label>
                                    <input type="text" class="form-control" name="digit"
                                     value="<?= (isset($_SESSION['digit_done']) ? $_SESSION['digit_done'] : '' )?>">

                                    <?php if(isset($_SESSION['title_err'])): ?>
                                      <small class="text-danger"><?= $_SESSION['title_err'] ?>  </small> 
                                      <?php unset($_SESSION['title_err']) ?>
                                     <?php endif ?>   
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"> Title</label>
                                    <input type="text" class="form-control" name="title"
                                    value="<?= (isset($_SESSION['title_done']) ? $_SESSION['title_done'] : '' )?>">
                                    
                                    <?php if(isset($_SESSION['digit_err'])): ?>
                                      <small class="text-danger"><?= $_SESSION['digit_err'] ?>  </small> 
                                      <?php unset($_SESSION['digit_err']) ?>
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
                            <h4 class="card-title text-info text-center">Fun Fact Item Table</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th>Digit</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php foreach($from_db as $funfact_items): ?>
                                        
                                        <tr>
                                            <td><?= $funfact_items['digit']?></td>
                                            <td><?= $funfact_items['title']?></td>
                                            
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