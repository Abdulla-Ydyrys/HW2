<!--Name and Surname: Abdulla Ydyrys;
	Date end: 22.09.2019;
	Email: 170103125@stu.sdu.edu.kz;
	Description: Logout.php
-->

<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: index.php");
   }
?>