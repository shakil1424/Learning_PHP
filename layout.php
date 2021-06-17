<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAYOUT</title>

    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/notice.css"/>
    
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'header.php'; ?>

    <div class="container notice-board">
        <div class="row">
            <?php
                session_start();
                //$current = $_SESSION['User']; 
                require_once('connection.php');


                $con=mysqli_connect('localhost','root','','notice_board');
                $query="select * from notice_table";

                $result = $con->query($query);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){

                    // echo "id: " . $row["noticeID"]. " - TYPE: " . $row["NoticeType"]. " -Notice Body: " . $row["NoticeBody"]. "<br>";
                    $var = $row["NoticeType"];
                    $var2 = $row["NoticeBody"];
                    $var3 = $row["UserName"];
                    $var4 = $row["DateTime"];
                    $noticeId = $row["noticeID"];
                    

                    $html='';
                    $html='
                    <div class="col-sm-12 col-lg-4">
                        <div class="notice">
                            <div class="notice-header">
                                <h3 class="notice-type">'.$var.'</h3>
                                <br>
                            </div>
                            <div class="notice-body">
                                <p class="notice-message">'.$var2.'</p>
                                <br>
                            </div>

                            <div class="notice-footer">
                                <div class="created-by ">Created By <span id="created-by">'.$var3.'</span></div>
                                <div class="dateTime "> <span id="dateTime">'.$var4.'</span></div>
                                <br>
                            </div>
                            
                            <div class="notice-button">
                                <div class="delete ">
                                    
                                    <form method="post" action="dbProcess.php">
                                        <input type="hidden" value="'. $noticeId . '" name="noticeID" />
                                        <button type="submit" name="deleteNotice" class="btn btn-danger col-lg-12">DELETE</button>
                                    </form>
                                </div>
                                
                                <div class="edit ">
                                    <form method="post" action="inputForm.php">
                                    <input type="hidden" value="'. $noticeId . '" name="noticeID" />
                                    <button type="submit" name = "updateNotice" class = "btn col-lg-12 btn-info" id="edit">UPDATE</button>
                                    
                                    </form>
                                    
                                </div>
                                
                            </div>

                        </div>
                    
                    </div>

                    
                    
                    ';
                    echo $html;
                    
                    

                    }

                    
                }
                $addButton='
                    <div class="add col-lg-1">
                    <br><br><br><br>
                    <a href="inputForm.php" clas><img  class="img-responsive" src="images/plusSign_vector.png " alt="Chania"></a>

                    </div>
                    ';
                    echo $addButton;


            
            
            ?>
        
        </div>
        
    </div>
    <?php include 'footer.php'; ?>
        


    
</body>
</html>