<!--Name and Surname: Abdulla Ydyrys;
	Date end: 22.09.2019;
	Email: 170103125@stu.sdu.edu.kz;
	Description: Create.php to create a new User account
-->
<?php
//connect.php
include("connect.php");
 
// Define variables
$username = $password = $email = "";
$username_err = $password_err = $email_err = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter a username";
    } elseif(!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $username_err = "Please enter a valid username";
    } else{
        $username = $input_username;
    }
	
    // Validate password
    $input_password = trim($_POST["password"]);
    $uppercase = preg_match('@[A-Z]@', $input_password);
	$lowercase = preg_match('@[a-z]@', $input_password);
	$number    = preg_match('@[0-9]@', $input_password);
    if(empty($input_password)){
        $password_err = "Please enter a password";     
    } elseif(!$uppercase || !$lowercase || !$number || strlen($input_password) < 8){
        $password_err = "Password should be at least 8 characters long and should include at least one upper case letter, and one number.";
    } else{
        $password = $input_password;
    }
    
    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email";     
    }  else{
        $email = $input_email;
    }
    
    if(empty($username_err) && empty($password_err) && empty($email_err)){
        // insert statement
        $sql = "INSERT INTO Users (Username, Password, Email) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "sss",  $param_username, $param_password, $param_email); 
            // Set parameters
            $param_username = $username;
            $param_password = $password;
            $param_email = $email;
            
            if(mysqli_stmt_execute($stmt)){
                //Created successfully
                header("location: index.php");
                exit();
            } else{
                echo "An error occurred. Please try again later!";
            }
        }   
        //Close statement
        mysqli_stmt_close($stmt);
    }
    //Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header text-info">
                        <h2 class="text-center">Sign Up</h2>
                    </div>
                    <p class="text-info text-center">Please fill out the following form completely.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="help-block">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control " value="<?php echo $username; ?>">
                            <span class="text-danger"><?php echo $username_err;?></span>
                        </div>
                        <div class="help-block">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                            <span class="text-danger"><?php echo $password_err;?></span>
                        </div>
                        <div class="help-block">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="text-danger"><?php echo $email_err;?></span>
                        </div>
                        
                        <input type="submit" class="possleft btn btn-info" value="Sign Up">
                        <a href="index.php" class="possleft btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>