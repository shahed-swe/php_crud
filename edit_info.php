<!DOCTYPE html>
<html lang="en">

<?php
    //including config file
    require_once 'connection.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM information WHERE id='$id'";
    $result = mysqli_query($link, $sql);
    $std = mysqli_fetch_assoc($result);

    //gathering the values from database


    //define variables and initializing empty values for each and every variables
    $first_name = $last_name = $father_name = $mother_name = $age = $gender = $email = $password_first = $password_last = "";
    $first_name_err = $last_name_err = $father_name_err = $mother_name_err = $age_err = $gender_err = $email_err = $password_first_err = $password_last_err = ""; //variables to handle error

    //processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //form validating by checking the field is empty or not

        // Validate password
        if(empty(trim($_POST["password_first"]))){
            $password_first_err = "Please enter a password.";     
        } elseif(strlen(trim($_POST["password_first"])) < 6){
            $password_first_err = "Password must have atleast 6 characters.";
        } else{
            $password_first = trim($_POST["password_first"]);
        }
        
        // Validate confirm password
        if(empty(trim($_POST["password_last"]))){
            $password_last_err = "Please confirm password.";     
        } else{
            $password_last = trim($_POST["password_last"]);
            if(empty($password_first_err) && ($password_first != $password_last)){
                $password_last_err = "Password did not match.";
            }
        }
        // $id = trim($_GET['id']);
        //checking input errors before inserting into the database
        if(empty($first_name_err)){// && empty($last_name_err) && empty($father_name_err) && empty($mother_name_err) && empty($age_err) && empty($email_err) && empty($password_first_err) && empty($password_last_err)){
            $query = "UPDATE information SET first_name=?, last_name=?, father_name=?, mother_name=?, age=?, gender=?, email=?, password_first=? WHERE id = ?";
            if($stmt = mysqli_prepare($link, $query)){
                //bind variables to prepared statemnet as paramenters
                mysqli_stmt_bind_param($stmt,"sssssssss",$param_first_name,$param_last_name,$param_father_name,$param_mother_name,$param_age,$param_gender,$param_email,$param_password_first,$param_key);
                //set parameters
                $param_first_name = $first_name;
                $param_last_name = $last_name;
                $param_father_name = $father_name;
                $param_mother_name = $mother_name;
                $param_age = $age;
                $param_gender = $gender;
                $param_email = $email;
                $param_password_first = $password_first;
                $param_key = $id;
                // $param_id = $id;
                //attempt to execute prepared statement
                if(mysqli_stmt_execute($stmt)){
                    header("location: index.php");
                }
                else{
                    echo "Something went wrong, please try again";
                }
                //close statmenet
                mysqli_stmt_close($stmt);
                
            }
        }
        else{
            echo "Query not Executed Properly";
        }
        mysqli_close($link);
    }



?>


    <head>
        <?php
        include 'head.php'
    ?>
    </head>

    <body class="body">
        <!-- nav section -->
        <?php
        include 'navbar.php'
    ?>
            <!-- forn section -->
            <section class="main_section">
            </section>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 col-md-10 col-sm-10 mx-auto">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="form-row m-auto">
                                <div class="form-group col-6 col-lg-4 col-md-6">
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" value="<?php echo $std['first_name']; ?>">
                                </div>
                                <div class="form-group col-6 col-lg-4 col-md-6">
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last name" value="<?php echo $std['last_name']; ?>">
                                </div>
                            </div>
                            <div class="form-row m-auto">
                                <div class="form-group col-6 col-lg-4 col-md-6">
                                    <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Enter Father Name" value="<?php echo $std['father_name']; ?>">
                                </div>
                                <div class="form-group col-6 col-lg-4 col-md-6">
                                    <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Enter Mother Name" value="<?php echo $std['mother_name']; ?>">
                                </div>
                            </div>
                            <div class="form-row m-auto">
                                <div class="form-group col-6 col-lg-4 col-md 6">
                                    <input type="text" class="form-control" name="age" id="age" placeholder="Enter your age" value="<?php echo $std['age']; ?>">
                                </div>
                                <div class="form-group col-6 col-lg-4 col-md 6">
                                    <select name="gender" id="gender" class="form-control">
                                <option value="">Select Gender..</option>
                                <option value="ml">Male</option>
                                <option value="fm">Female</option>
                            </select>
                                </div>
                            </div>
                            <div class="form-row m-auto">
                                <div class="form-group col-12 col-lg-8">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter E-main Address" value="<?php echo $std['email']; ?>">
                                </div>
                            </div>
                            <div class="form-row m-auto">
                                <div class="form-group col-6 col-lg-4 col-md-6">
                                    <input type="password" class="form-control" name="password_first" id="password_first" placeholder="Enter Password">
                                </div>
                                <div class="form-group col-6 col-lg-4 col-md-6">
                                    <input type="password" class="form-control" name="password_last" id="password_last" placeholder="Enter Password Again">
                                </div>
                            </div>
                            <button class="btn btn-info shadow-none btn-block col-12 col-lg-8" id="sub_button">Edit Info</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- script -->
            <script src="js/bootstrap.min.js"></script>
            <script src="js/jquery.min.js"></script>
            <!-- <script src="js/registration.js"></script> -->
    </body>

</html>