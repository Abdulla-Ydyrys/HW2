<!--Name and Surname: Abdulla Ydyrys;
	Date end: 22.09.2019;
	Email: 170103125@stu.sdu.edu.kz;
	Description: Welcome.php
-->
<?php
   include('session.php');
?>
<!DOCTYPE html>  
<html>
   <head>
      <title>Welcome</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <style>
            html, body {  
            background-image: url("back-image.jpg");
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            }
            h1.text-center{
            	padding-top: 20%;
            	padding-bottom: 30px;
            	color: white;
                font-family: 'Nunito', sans-serif;
                font-size: 100px;
            }
            a{
            	color:white;
            	font-size: 50px;
            }
      </style>
   </head>  
   <body>

   	<div class="container">
  <div class="row">
  	 <div class="col-md-12">     
      <h1 class="text-center">Welcome <?php echo $session_user; ?>!</h1> 
      <h2 class="text-center"><a class="btn btn-info btn-lg" href="logout.php" role="button">Sign Out</a></h2>
     </div>
</div>   
</div>
   </body>

</html>
