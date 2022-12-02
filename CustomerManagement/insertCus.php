<?php
    require_once 'Db/Connect.php';
    echo "<br>";

    if(isset($_POST['insert']))
    {
        $postCusName = $_POST['cusname'];
        $postCusGmail = $_POST['cusgmail'];
        $err_name = "";
        $err_gmail = "";

        if(empty($postCusName))
        {
            $err_name = "*Customer Name must be fill!!!";
        }
        
        if(empty($postCusGmail))
        {
            $err_gmail = "*Customer Gmail must be fill!!!";
        }

        if(empty($err_name) && empty($err_gmail))
        {
            $insertSQL = "INSERT INTO customertable (CustomerName,CustomerGmail) VALUES ('$postCusName' , '$postCusGmail')";
            if($connect->query($insertSQL) === TRUE)
            {
                header('Location:HomePage.php');
            }
            else
            {
                echo '<script> alert("Something wrong!!!Please check again!!!"); </script>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Customer Page</title>
    <style>
        h2
        {
            text-align: center;
            margin-top: 50px;
        }
        form
        {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-container
        {
            border-bottom: solid 1px;
            margin-bottom: 20px;
        }
        .input
        {
            margin: 10px 0px;
            width: 250px;
            font-size: 15px;
        }
        .label
        {
            color: blue;
            font-size: 20px;
        }
        .err
        {
            color: red;
        }

        #submit
        {
            padding: 10px 20px;
            background-color: lightblue;
            color: whitesmoke;
            border: solid 1px black;
            border-radius: 20px;
        }

    </style>
</head>
<body>
    <h2>Insert New Customer</h2>
    <form action="" method="POST">
        <div class="input-container">
            <label class="label">---Customer Name---</label> <br>
            <input class="input" type="text" name="cusname" placeholder="Enter Name"> <br>
            <span class="err"><?php echo (!empty($err_name)?$err_name:''); ?></span>
        </div>
        <div class="input-container">
            <label class="label">---Customer Gmail---</label> <br>
            <input class="input" type="text" name="cusgmail" placeholder="Enter Gmail"> <br>
            <span class="err"><?php echo (!empty($err_gmail)?$err_gmail:''); ?></span>
        </div>
        <div>
            <input id="submit" type="submit" name="insert" value="Insert">
            <a href="HomePage.php">Return Home</a>
        </div>
    </form>
</body>
</html>