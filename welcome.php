<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/welcome.css">
    <title>Welcome</title>
</head>
<body>
    
    <section>
        <!--Navigation bar-->    
    <header>
    <a href="welcome.php" class="logo">MyTime</a>

   
        <ul>
            <!--Welcome link will refresh page. Rest will direct to new page-->
            <li id="Welcome"><a href="welcome.php">Welcome</a></li>
            <li><a href="Course.php">Course-Page</a></li>
            <li><a href="Timetable.php">Timetable</a></li>
            <li><a href="Map.php">Map</a></li>
            <li><a href="index.php">Logout</a></li>

        </ul>
    </header>
    <div class="content">
        <!--One line about website-->
    <div class="box">

        <h2> Welcome, <?php echo $_SESSION["uname"]?></h2><br><br>
        <h1 id="Heading">MyTime</h1>
        
         <p id="para">
            Manage your time wisely<br>With this website<br>
             
         </p>
    </div>
    <div class="img">
        <!--Welcome img in circle-->
        <img src="assets/img/welcome.jpg" alt="" id="welcome">
    </div>
    </div>
    </section>
    <!--Using clip path to make designs-->
    <div class="circle1">
    </div>
    <div class="circle2">
    </div>
   
</body>
</html>
