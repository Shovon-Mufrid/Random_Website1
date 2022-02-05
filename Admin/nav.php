
<script src="resources/js/bootstrap.js"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class='container'>
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php" target='blank'>Visit Website</a>
                </li>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        Frontend </a>
                    <div class="dropdown-menu m-0">
                        <li><a href="guest_message.php" class="dropdown-item text-success">
                            <?php
                            //guest notification
                            require_once('../Database.php');
                            $get_msg_notify_query = "SELECT COUNT(*) AS msg_notify FROM guest WHERE Read_Status=1 ";
                            $from_db = mysqli_query($db,$get_msg_notify_query);
                            $after_assoc = mysqli_fetch_assoc($from_db);
                            ?>
                        Guest Message 
                            <span class="badge bg-secondary ms-2">
                                <?= $after_assoc['msg_notify'] ?>
                            </span></a></li>
                        
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="banner.php" class="dropdown-item text-danger">Banner</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>                       
                        <li><a href="service_head.php" class="dropdown-item text-warning">Service Heading</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="service_item.php" class="dropdown-item text-secondary">Service Item</a></li>  
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="funfact_head.php" class="dropdown-item text-primary">FunFact Heading</a></li>  
                        <li><a href="funfact_items.php" class="dropdown-item text-primary">FunFact Items</a></li>  

                    </div>
                </div>
                
            </ul>
            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['email'] ?>
                </button>
                <div class="dropdown-menu">
                   <li><a class="dropdown-item text-success" href="profile.php">Profile</a></li> 
                   <li> <a class="dropdown-item text-warning" href="pass_change.php">Change Password</a></li> 
                   <li><a class="dropdown-item" href="#"></a></li> 
                   <li> <div class="dropdown-divider"></div></li> 
                   <li> <a class="dropdown-item text-danger" href="../Logout.php">Logout</a></li> 
                </div>
            </div>
        </div>
    </div>
</nav>