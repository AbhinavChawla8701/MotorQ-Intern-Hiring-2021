<?php
include('connection.php');
session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Course Page</title>
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
                <li><a href="Timetable.php">Timetable</a></li>
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

<br><br>
<div align="center" style="margin-top: 20px">

    <button id="subjectmanual" class="btn btn-success btn-lg">ADD CLASS</button>
</div>

<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead">Add Class</h2>
        </div>
        <div class="modal-body" id="EnterSubject">
            <!--Admin Login Form-->
            <div style="display:none" id="addSubjectForm">
                <form method="POST">
                    <div class="form-group">
                        <label for="subjectname">Class ID</label>
                        <input type="text" class="form-control" id="subjectname" name="SN"
                               placeholder="VLRXXXX">
                    </div>
                    <div class="form-group">
                        <label for="subjectcode">Course Code</label>
                        <input type="text" class="form-control" id="subjectcode" name="SC" placeholder="CSEXXXX">
                    </div>
                    <div class="form-group">
                        <label for="subjecttype">Faculty</label>
                        <input type="text" class="form-control" id="subjectcode" name="ST" placeholder="Enter Name">

                    </div>
                    <div class="form-group">
                        <label for="subjectsemester">Building</label>
                        <input type="text" class="form-control" id="subjectcode" name="SS" placeholder="Building...">
                    </div>
                    <div class="form-group">
                        <label for="subjectdepartment">Day</label>
                        <input type="text" class="form-control" id="subjectcode" name="SD" placeholder="Weekday..">
                    </div>
                    <div class="form-group">
                        <label for="subjectdepartment">Time</label>
                        <input type="text" class="form-control" id="subjectcode" name="SDE" placeholder="Time...">
                    </div>
                    <div align="right" class="form-group">
                        <input type="submit" class="btn btn-default" name="ADD" value="ADD">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var addsubjectBtn = document.getElementById("subjectmanual");
    var heading = document.getElementById("popupHead");
    var subjectForm = document.getElementById("addSubjectForm");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal

    addsubjectBtn.onclick = function () {
        modal.style.display = "block";
        //heading.innerHTML = "Faculty Login";
        subjectForm.style.display = "block";
        //adminForm.style.display = "none";


    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        //adminForm.style.display = "none";
        subjectForm.style.display = "none";

    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }


</script>
<?php
if(isset($_POST['ADD']))
{
    $CID=$_POST['SN'];
    $CoID=$_POST['SC'];
    $Fac=$_POST['ST'];
    $Bui=$_POST['SS'];
    $Dat=$_POST['SD'];
    $Tim=$_POST['SDE'];

    $q=$db->prepare("INSERT INTO class (id,courseCode,faculty,building,day,time)
                        VALUES(:SN,:SC,:ST,:SS,:SD,:SDE)");
    $q->bindValue('SN',$CID);
    $q->bindValue('SC',$CoID);
    $q->bindValue('ST',$Fac);
    $q->bindValue('SS',$Bui);
    $q->bindValue('SD',$Dat);
    $q->bindValue('SDE',$Tim);
    if($q->execute())
    {
        echo"<script>alert('Class Added Successfully')</script>";
    }
    else
    {
        echo"<script>alert('Error')</script>";
    }
}
?>

<div>
    <br>
    <style>
        table {
            margin-top: 10px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            margin-left: 50px;
            width: 90%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    
    <table id=subjectstable style="margin-left: 90px">
        <caption><strong> Subject's Information</strong></caption>
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
        
        $query=$db->prepare("SELECT * FROM class");
        $query->execute();
        $result=$query->fetchAll();
           
        foreach($result as $row) {
            
            echo "<tr><td>{$row['id']}</td>
                    <td>{$row['courseCode']}</td>
                    <td>{$row['faculty']}</td>
                    <td>{$row['building']}</td>
                     <td>{$row['day']}</td>
                     <td>{$row['time']}</td>
                    <td><a href= 'add.php?rn=$row[id]'>Add</a></td>
                    </tr>\n";
                    
            }
        
        ?>
    </table>
   
</div>
<!--HOME SECTION END-->

<!--<div id="footer">
    <!--  &copy 2014 yourdomain.com | All Rights Reserved |  <a href="http://binarytheme.com" style="color: #fff" target="_blank">Design by : binarytheme.com</a>
--></div>
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
