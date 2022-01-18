<?php

session_start();
require_once('../header.php');
require_once('nav.php');
require_once('../Database.php');

if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}

$get_query= "SELECT * FROM guest";

$from_db = mysqli_query($db,$get_query);

?>

<head>
<title> Guest Information</title>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card mt-4">
                    <div class="card-header mt-6 bg-danger text-black">
                        <h5 class="card-title text-capitalize text-center"> Guest Information </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>
                                <th class="bg-warning">Guest Name</th>
                                <th class="bg-primary">Guest Email</th>
                                <th class="bg-success">Guest Message</th>
                                <th class="bg-info">Action</th>
                            </thead>
                           
                            <tbody>
                                <?php
                                    foreach ($from_db as $guest_info){
                                 ?>
                                 
                                 <tr class="<?php 
                                    if($guest_info['Read_Status'] == 1)
                                    {
                                        echo "bg-info"; 
                                    }
                                    else { 
                                        echo "text-dark";
                                    }
                                 ?>">
                                    <td><?= $guest_info['Guest_Name'] ?></td>
                                    <td><?= $guest_info['Guest_Email'] ?></td>
                                    <td><?= $guest_info['Guest_Message'] ?></td>
                                    <td> 
                                        <?php
                                        if($guest_info['Read_Status'] == 1 ) :
                                        ?>


                                        <a href="message_status.php?message_id=<?=$guest_info['ID']?>" class="btn btn-sm btn-warning"> Mark as Read </a>

                                        <?php
                                        else:
                                        ?>
                                         <a href="#" class='btn btn-sm btn-danger'> Delete </a>

                                        <?php
                                        endif 
                                        ?>
                                    </td>
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
                                </head>

<?php
require_once('../footer.php');

?>