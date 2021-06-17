<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
     <link rel="stylesheet" href="css/inputForm.css"/>
    
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'header.php'; ?>
<?php
$action_name = "insertNew";
$button_name = "SAVE";
$noticeId ='';

if(isset($_POST['updateNotice'])){
    $noticeId = $_POST['noticeID'];
    //echo "love";
    $action_name = "updateRecord";
    $button_name = "EDIT";

}


?>

<div class="container">
    <div class="row">

        <div class="insert-form col-lg-6 justify-content-center ">
            <form action="dbProcess.php" method="post">
                <div class="form-group">
                    <label>Enter Notice Type</label><br>
                    <input type="text" name="NType" placeholder=" Notice Type" class="form-control mb-3">
        
                </div>
                
                
                <div class="form-group">
                    <label>Enter the notice description</label><br>
                    <textArea class = " form-control" rows="10" name="NBody"></textArea>
        
                </div>
                <div class="text-center">
                <?php
 
 
                $html='';
                $html = '
                <input type="hidden" value="'. $noticeId . '" name="noticeID" />
                <button class="btn btn-submit" name="'."$action_name".'">'."$button_name".'</button>
                ';

                echo $html;
                ?>

                

                </div>
                
                
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
    
</body>
</html>