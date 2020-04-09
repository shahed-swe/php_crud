<!DOCTYPE html>
<html lang="en">

<?php
    require_once 'connection.php';
    $sql = "SELECT * FROM information";
    $result = mysqli_query($link, $sql);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Home</title>
    <style>
        .main_tag {
            color: red;
        }
        .main_section {
            width: 100%;
            height: 850px;
            opacity: 50%;
            background-image: url(img/hero.png);
            background-repeat: no-repeat;
            background-attachment: fixed;
            overflow: hidden;
        }
        .container{
            margin-top: -750px;
        }
        .nav-take:hover {
            border-bottom: 2px solid red;
        }
        .web{
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <!-- nav section -->
        <?php
            include 'navbar.php'
        ?>
    <!-- forn section -->
    <section class="main_section">
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="card-deck">
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                        <div class="col-lg-4 col-sm-6 web">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['first_name']?> <?php echo $row['last_name']?></h5>
                                    <p class="card-text"><small class="text-muted">Father Name:<?php echo $row['father_name']?> Mother Name: <?php echo $row['mother_name']?></small></p>
                                    <p class="card-text"><small>Age: <?php echo $row['age']?></small></p>
                                    <p class="card-text"><small>Email: <?php echo $row['email']?></small></p>
                                    <a class="btn btn-primary" href="info_details.php?id=<?php echo $row['id']; ?>">View</a>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
    <!-- script -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/registration.js"></script>
</body>

</html>