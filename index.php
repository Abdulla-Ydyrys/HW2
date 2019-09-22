<!--Name and Surname: Abdulla Ydyrys;
    Date end: 22.09.2019;
    Email: 170103125@stu.sdu.edu.kz;
    Description: index.php
-->

<?php
//connect.php
include("connect.php");
session_start();
 
// Define variables
$username = $password = "";
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_username = trim($_POST["username"]);
    $input_password = trim($_POST["password"]);

    $sql = "SELECT ID FROM Users WHERE Username = '$input_username' and Password = '$input_password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    if(mysqli_num_rows($result) == 1) {      
         $_SESSION['user'] = $input_username;        
         header("location: welcome.php");
      }else {
         $error = "The Username or Password is incorrect";
    }   
    //Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header text-info">
                        <h2 class="text-center">Login</h2>
                    </div>                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="help-block">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control " value="<?php echo $username; ?>">
                        </div>
                        <div class="help-block">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">                     
                        </div>
                        <span class="text-danger">
                            <?php echo $error;?></span> 
                        <input type="submit" class="btn btn-info btn-lg btn-block" value="Login">
                        <p class="text-center">Don't have an account? <a href="create.php" class="text-info">Sign up</a> </p>  
                                        
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>