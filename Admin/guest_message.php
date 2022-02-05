<?php

session_start();
require_once('../header.php');
require_once('nav.php');
require_once('../Database.php');

if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}

$get_query = "SELECT * FROM guest";

$from_db = mysqli_query($db, $get_query);

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
                            <form action="delete_marked_msg.php" method="post">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <th> Guest Serial </th>
                                        <th class="bg-warning">Guest Name</th>
                                        <th class="bg-primary">Guest Email</th>
                                        <th class="bg-success">Guest Message</th>
                                        <th class="bg-info">Action</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                        foreach ($from_db as $key => $guest_info) {
                                        ?>

                                            <tr class="<?php
                                                        if ($guest_info['Read_Status'] == 1) {
                                                            echo "bg-info";
                                                        } else {
                                                            echo "text-dark";
                                                        }
                                                        ?>">
                                                <td><?= $key + 1  ?> <input type="checkbox" name="check[<?=$guest_info['ID']?>]" class="ms-2"></td>
                                                <td><?= $guest_info['Guest_Name'] ?></td>
                                                <td><?= $guest_info['Guest_Email'] ?></td>
                                                <td><?= $guest_info['Guest_Message'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($guest_info['Read_Status'] == 1) :
                                                    ?>


                                                        <a href="message_status.php?message_id=<?= $guest_info['ID'] ?>" class="btn btn-sm btn-warning"> Mark as Read </a>

                                                    <?php
                                                    else :
                                                    ?>
                                                        <button value="guest_message_delete.php?message_id=<?= $guest_info['ID'] ?>" type="button" class='del-btn btn btn-sm btn-danger'> Delete </button>

                                                    <?php
                                                    endif
                                                    ?>
                                                </td>
                                            </tr>

                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <button type="submit" class="btn btn-sm btn-danger"> Delete Marked All </button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </form>
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

<!-- for warning before deleting message -->
<script>
    $('.del-btn').click(function() {
        var link = $(this).val();

        //sweet alert
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                window.location.href = link
            }
        })
    });
</script>