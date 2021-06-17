

<?php
//include 'process.php';
session_start();
$current = $_SESSION['User']; 
require_once('connection.php');


$con=mysqli_connect('localhost','root','','notice_board');

if(isset($_POST['updateRecord'])){
    $noticeId = $_POST['noticeID'];
    $nt = $_POST[NType];
    $nb = $_POST[NBody];
    $sql = "UPDATE notice_table SET NoticeType = '$nt',NoticeBody = '$nb',UserName = '$current' where noticeID = '$noticeId' "; 

    if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();



    header("location:layout.php");

}


if(isset($_POST['insertNew'])){
    $nt = $_POST[NType];
    $nb = $_POST[NBody];
   



    $sql = "INSERT INTO notice_table (NoticeType,NoticeBody,UserName) VALUES('$nt','$nb','$current')"; 

    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
    header("location:layout.php");

}

if(isset($_POST['deleteNotice'])){
    $noticeId = $_POST['noticeID'];
   
    $sql = "Delete from notice_table where noticeID = '$noticeId'"; 

    if ($con->query($sql) === TRUE) {
        echo "record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
    header("location:layout.php");
}



?>