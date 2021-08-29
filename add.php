<?php
include('connection.php');
session_start();
$id=$_GET['rn'];
$un=$_SESSION['uname'];
$q=$db->prepare("INSERT INTO student (Username,ClassID)
                                VALUES(:uname,:rn)");
             $q->bindValue('uname',$un);
            $q->bindValue('rn',$id);
           
           
            if($q->execute())
            {
                
                header("Location:Course.php");
            }
            else
            {
                echo"<script>alert('Error')</script>";
            }
?>