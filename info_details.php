<!DOCTYPE html>
<html lang="en">
<?php
    $id = $_GET['id'];
    require_once "connection.php";
    $sql = "SELECT * FROM information WHERE id=$id";
    $result = mysqli_query($link, $sql);
    $std = mysqli_fetch_assoc($result);
    // var_dump($std);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Information</title>
    <style>
        .container{
            margin-top: 70px;
        }
        .web{
            margin-bottom:20px !important; 
        }
    </style>
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
<!-- checking the information -->
    <section class="container">
        <div class="col-12 col-lg-12 m-auto">
            <div class="card container-body">
                <div class="card-body col-10 col-lg-10 m-auto">
                    <h3 class="card-title"><?php echo $std['first_name']; ?><?php echo $std['last_name']; ?></h3>
                </div>
                <div class="card-body col-10 col-lg-10 m-auto">
                    <p class="card-title float-right">
                        <label for="">Father Name:</label>Fu:</label> <?php echo $std['father_name']; ?>
                    </p>
                    <p class="card-title">
                        <label for="">Mother Name:</label> <?php echo $std['mother_name']; ?>
                    </p>
                    <p class="card-title float-right">
                        <label for="">Age:</label> <?php echo $std['age']; ?>
                    </p>

                    <?php 
                        $gender = $std['gender'];
                        if ($gender == 'ml'){
                           $gen = "Male";
                        }
                        else{
                            $gen = "Female";
                        }
                    ?>
                    <p class="card-title">
                        <label for="">Gender:</label> <?php echo $gen?>
                    </p>


                    <p class="card-title">
                        <label for="">Email</label> <?php echo $std['email']; ?>
                    </p>
                </div>
                <div class="col-8 col-lg-10 m-auto web">
                    <a class="btn btn-success shadow-none" href="all_patients_information.php">BACK</a>
                    <a class="btn btn-primary shadow-none" href="edit_info.php?id=<?php echo $std['id']; ?>">EDIT</a>
                    <a class="btn btn-danger shadow-none" onclick="return confirm('Are you sure?')" href="delete.php?id=<?php echo $std['id']; ?>"><span class="fa fa-eraser new"> Delete</span></a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>