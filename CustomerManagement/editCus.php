<?php
    require_once 'Db/Connect.php';
    echo "<br>";

    if(isset($_GET['ECusId']) && !empty($_GET['ECusId']))
    {
        $EditId = $_GET['ECusId'];
        $selectSQL = "SELECT * FROM customertable WHERE CustomerId='$EditId'";
        $result = mysqli_query($connect,$selectSQL);
        while($info = mysqli_fetch_array($result))
        {
            $valueId = $info['CustomerId'];
            $valueName = $info['CustomerName'];
            $valueGmail = $info['CustomerGmail'];
        }
    }
?>

<?php
    if(isset($_POST['edit']))
    {
        $postEditId = $_POST['editcusid'];
        $postEditName = $_POST['editcusname'];
        $postEditGmail = $_POST['editcusgmail'];
        $E_err_id = "";
        $E_err_name = "";
        $E_err_gmail = "";

        if(empty($postEditId))
        {
            $E_err_id = "Edit Id must be fill!!!";
        }
        else
        {
            $selectAllSQL = "SELECT * FROM customertable";
            $selectResult = mysqli_query($connect,$selectAllSQL);
            $loop = mysqli_fetch_all($selectResult);
            $checkMatch = 0;
            foreach($loop as $each)
            {
                if($each[0] == $postEditId)
                {
                    $checkMatch++;
                }
            }
            if($checkMatch == 0)
            {
                $E_err_id = "Edit Id must match the data!!!";
            }
        }

        if(empty($postEditName))
        {
            $E_err_name = "Edit Name must be fill!!!";
        }

        if(empty($postEditGmail))
        {
            $E_err_gmail = "Edit Gmail must be fill!!!";
        }

        if(empty($E_err_id) && empty($E_err_name) && empty($E_err_gmail))
        {
            $updateSQL = "UPDATE customertable SET CustomerName='$postEditName' , CustomerGmail='$postEditGmail' WHERE CustomerId='$postEditId'";
            if($connect->query($updateSQL) === TRUE)
            {
                echo '<script> alert("UPDATE Success"); </script>';
            }
            else
            {
                '<script> alert("UPDATE False!!!Something go wrong!!!"); </script>';
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
    <title>Edit Customer Page</title>
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
            color: burlywood;
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

        .home
        {
            padding: 10px 20px;
            text-decoration: none;
            background-color: violet;
            color: whitesmoke;
            border: solid 1px black;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <h2>Edit Customer</h2>
    <form action="" method="POST">
        <div class="input-container">
            <label class="label">---Edit Customer Id---</label> <br>
            <input class="input" type="text" name="editcusid" placeholder="Enter Id" value="<?php echo $valueId; ?>"> <br>
            <span class="err"><?php echo (!empty($E_err_id)?$E_err_id:''); ?></span>
        </div>
        <div class="input-container">
            <label class="label">---Edit Customer Name---</label> <br>
            <input class="input" type="text" name="editcusname" placeholder="Enter Name" value="<?php echo $valueName; ?>"> <br>
            <span class="err"><?php echo (!empty($E_err_name)?$E_err_name:''); ?></span>
        </div>
        <div class="input-container">
            <label class="label">---Edit Customer Gmail---</label> <br>
            <input class="input" type="text" name="editcusgmail" placeholder="Enter Gmail" value="<?php echo $valueGmail; ?>"> <br>
            <span class="err"><?php echo (!empty($E_err_gmail)?$E_err_gmail:''); ?></span>
        </div>
        <div>
            <input id="submit" type="submit" name="edit" value="Save Change">
            <a class="home" href="HomePage.php">Return Home</a>
        </div>
    </form>
</body>
</html>