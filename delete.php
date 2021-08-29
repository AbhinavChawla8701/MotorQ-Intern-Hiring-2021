<?php
include('connection.php');
session_start();
$id=$_GET['rn'];
$un=$_SESSION['uname'];
$query=$db->prepare("DELETE FROM student WHERE ClassID='$id' and Username='$un'");

if($query->execute())
{
    header("Location:Timetable.php");
}
else
{
     echo"<script>alert('Error')</script>";
}
?>