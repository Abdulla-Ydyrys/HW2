<!--Name and Surname: Abdulla Ydyrys;
   Date end: 22.09.2019;
   Email: 170103125@stu.sdu.edu.kz;
   Description: Session.php
-->

<?php
   include("connect.php");
   session_start();
   
   $select_user = $_SESSION['user'];
   $sql = "Select Username from Users where Username = '$select_user' ";
   $result = mysqli_query($conn,$sql);
   
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
   $session_user = $row['Username'];
   
   if(!isset($_SESSION['user'])){
      header("location:index.php");
      die();
   }
?>