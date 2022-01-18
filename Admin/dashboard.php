<?php
session_start();
require_once('../header.php');
require_once('nav.php');
require_once('../Database.php');

if (!isset($_SESSION['user_status'])) {
    header("location: ../Login.php");
}

$get_query = "SELECT Name,User_Name,Email,Phone FROM registration";

$from_db = mysqli_query($db, $get_query);
$after_assoc = mysqli_fetch_assoc($from_db);
// foreach($from_db as $user){
//     print_r($user);
// }
?>

<body  class='bg-black'>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card mt-4 bg-secondary">
                    <div class="card-header mt-6 bg-danger text-black">
                        <h5 class="card-title text-capitalize text-center"> user information </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>
                                <th class="bg-warning">Name</th>
                                <th class="bg-primary">User Name</th>
                                <th class="bg-success">Email</th>
                                <th class="bg-info">Phone</th>
                            </thead>
                           
                            <tbody>
                                <?php
                                    foreach ($from_db as $user){
                                 ?>
                                 
                                 <tr>
                                    <td class="bg-warning"><?= $user['Name'] ?></td>
                                    <td class="bg-primary"><?= $user['User_Name'] ?></td>
                                    <td class="bg-success"><?= $user['Email'] ?></td>
                                    <td class="bg-info"><?= $user['Phone'] ?></td>
                                </tr>

                                 <?php
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</section>
</body>





<?php
require_once('../footer.php');
?>