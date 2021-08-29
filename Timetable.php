<?php
// Start the session
include ('connection.php');
session_start();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>TimeTable</title>
    <script type="text/javascript" src="assets/jsPDF/dist/jspdf.min.js"></script>
    <script type="text/javascript" src="assets/js/html2canvas.js"></script>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FONT AWESOME CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- FLEXSLIDER CSS -->
    <link href="assets/css/flexslider.css" rel="stylesheet"/>
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet"/>
    <!-- Google	Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'/>
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top " id="menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="navbar-collapse collapse move-me">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="welcome.php">Home</a></li>
                <li><a href="Course.php">Course-Page</a></li>
                <li><a href="Map.php">Map</a></li>
               

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">LOGOUT</a></li>
            </ul>

        </div>
    </div>
</div>
<!--NAVBAR SECTION END-->
<br>





<div>
    <br>
    <style>
        table {
            margin-top: 20px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 2px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #ffffff;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }
    </style>
    <br>
    <p style="text-align:center;font-size:20px;font-weight:bold;">Timetable</p>
    <div id="TT" style="background-color: #FFFFFF">
        <table border="2" cellspacing="3" align="center" id="timetable">
            
            <tr>
                <td style="text-align:center">WEEKDAYS</td>
                <td style="text-align:center">9:00-10:00</td>
                <td style="text-align:center">10:00-11:00</td>
                <td style="text-align:center">11:00-12:00</td>
                <td style="text-align:center">12:00-13:00</td>
                <td style="text-align:center">13:00-14:00</td>
                <td style="text-align:center">14:30-15:00</td>
                <td style="text-align:center">15:00-16:00</td>
            </tr>
            <tr>
                <?php
                
                
                    
                    $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
                    $time=array('9am-10am','10am-11am','11am-12am','12am-1pm','1pm-2pm','2pm-3pm','3pm-4pm');
                    for($i=0;$i<6;$i++)
                    {
                        $uname=$_SESSION['uname'];
                        $query=$db->prepare("SELECT class.courseCode, class.time from student inner join class on class.id=student.ClassID where class.day='$days[$i]';");
                        $query->execute();
                        $result=$query->fetchAll();
                        $map=array();
                        echo "<tr>";
                        echo "<td>".$days[$i]."</td>";
                        
                        foreach($result as $t)
                        {
                           $map[$t['time']]=$t['courseCode'];
                            
                            
                        }

                        for($j=0;$j<7;$j++)
                        {
                            if($j===3)
                            {
                                echo "<td>Lunch</td>";
                                continue;
                            }
                            if(array_key_exists($time[$j],$map))
                            {
                                echo "<td>".$map[$time[$j]]."</td>";
                            }
                            else
                            {
                                echo "<td>-</td>";
                            }
                        }

                        
                    }
                   echo "</table>"
                   
                
              
                ?>
                
    </div>
</div><br>
<p style="text-align:center;font-size:20px;font-weight:bold;">Registered Subjects</p>

<table id=subjectstable >
        
        <tr>
            <th width="150">Class ID</th>
            <th width=150>Course Code</th>
            <th width=150>Faculty</th>
            <th width="150">Building</th>
            <th width="150">Day</th>
            <th width="100">Time</th>
            <th width="100">Action</th>
        </tr>
        <?php
        
        $query1=$db->prepare("SELECT * FROM class inner join student on class.id=student.ClassID");
        $query1->execute();
        $result1=$query1->fetchAll();
           
        foreach($result1 as $row1) {
            
            echo "<tr><td>{$row1['id']}</td>
                    <td>{$row1['courseCode']}</td>
                    <td>{$row1['faculty']}</td>
                    <td>{$row1['building']}</td>
                     <td>{$row1['day']}</td>
                     <td>{$row1['time']}</td>
                     <td><a href= 'delete.php?rn=$row1[ClassID]'>Delete</a></td>
                    </tr>\n";
                    
            }
        
        ?>
    </table>
<!--HOME SECTION END-->

<!--<div id="footer">
    <!--  &copy 2014 yourdomain.com | All Rights Reserved |  <a href="http://binarytheme.com" style="color: #fff" target="_blank">Design by : binarytheme.com</a>
-->
<!-- FOOTER SECTION END-->

<!--  Jquery Core Script -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!--  Core Bootstrap Script -->
<script src="assets/js/bootstrap.js"></script>
<!--  Flexslider Scripts -->
<script src="assets/js/jquery.flexslider.js"></script>
<!--  Scrolling Reveal Script -->
<script src="assets/js/scrollReveal.js"></script>
<!--  Scroll Scripts -->
<script src="assets/js/jquery.easing.min.js"></script>
<!--  Custom Scripts -->
<script src="assets/js/custom.js"></script>
</body>
</html>
