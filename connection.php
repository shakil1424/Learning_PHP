<?php

    $con=mysqli_connect('localhost','root','','notice_board');

    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
?>