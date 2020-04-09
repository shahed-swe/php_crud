<!DOCTYPE html>
<html lang="en">

<?php
    //including config file
    require_once 'connection.php';

    //define variables and initializing empty values for each and every variables
    $first_name = $last_name = $father_name = $mother_name = $age = $gender = $email = $password_first = $password_last = "";
    $first_name_err = $last_name_err = $father_name_err = $mother_name_err = $age_err = $gender_err = $email_err = $password_first_err = $password_last_err = ""; //variables to handle error

    //processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //form validating by checking the field is empty or not
        if(empty(trim($_POST["first_name"]))){
            $first_name_err = "Please Enter your First name.";
        }else{
            $first_name = trim($_POST["first_name"]);
        }

        if(empty(trim($_POST['last_name']))){
            $last_name_err = "Please Enter your last name";
        }
        else{
            $last_name = trim($_POST['last_name']);
        }

        if(empty(trim($_POST['father_name']))){
            $father_name_err = "Please Enter your father name";
        }
        else{
            $father_name = trim($_POST['father_name']);
        }


        if(empty(trim($_POST['mother_name']))){
            $mother_name_err = "Please Enter your mother name";
        }
        else{
            $mother_name = trim($_POST['mother_name']);
        }

        if(empty(trim($_POST['age']))){
            $age_err = "Please Enter your age";
        }
        else{
            $age = trim($_POST['age']);
        }

        if(empty(trim($_POST['gender']))){
            $gender_err = "Please Enter your age";
        }
        else{
            $gender = trim($_POST['gender']);
        }

        if(empty(trim($_POST['email']))){
            $email_err = "Please Enter your age";
        }
        else{
            $email = trim($_POST['email']);
        }

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

        //checking input errors before inserting into the database
        if(empty($first_name_err)){// && empty($last_name_err) && empty($father_name_err) && empty($mother_name_err) && empty($age_err) && empty($email_err) && empty($password_first_err) && empty($password_last_err)){
            $sql = "INSERT INTO information(first_name,last_name,father_name,mother_name,age,gender,email,password_first) Values(?,?,?,?,?,?,?,?)";
            if($stmt = mysqli_prepare($link, $sql)){
                //bind variables to prepared statemnet as paramenters
                mysqli_stmt_bind_param($stmt,"ssssssss",$param_first_name,$param_last_name,$param_father_name,$param_mother_name,$param_age,$param_gender,$param_email,$param_password_first);
                //set parameters
                $param_first_name = $first_name;
                $param_last_name = $last_name;
                $param_father_name = $father_name;
                $param_mother_name = $mother_name;
                $param_age = $age;
                $param_gender = $gender;
                $param_email = $email;
                $param_password_first = $password_first;
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
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name">
                                </div>
                                <div class="form-group col-6 col-lg-4 col-md-6">
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last name">
                                </div>
                            </div>
                            <div class="form-row m-auto">
                                <div class="form-group col-6 col-lg-4 col-md-6">
                                    <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Enter Father Name">
                                </div>
                                <div class="form-group col-6 col-lg-4 col-md-6">
                                    <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Enter Mother Name">
                                </div>
                            </div>
                            <div class="form-row m-auto">
                                <div class="form-group col-6 col-lg-4 col-md 6">
                                    <input type="text" class="form-control" name="age" id="age" placeholder="Enter your age">
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
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter E-main Address">
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
                            <button class="btn btn-info shadow-none btn-block col-12 col-lg-8" id="sub_button">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- script -->
            <script src="js/bootstrap.min.js"></script>
            <script src="js/jquery.min.js"></script>
            <script src="js/registration.js"></script>
    </body>

</html>