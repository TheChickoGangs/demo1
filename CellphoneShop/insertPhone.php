<?php
    require_once 'Db/Connect.php';
    $phoneName = "";
    $phonePrice = "";
    $phoneSupplier = "";

    $name_err = "";
    $price_err = "";
    $supplier_err = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $input_name = trim($_POST['insertName']);
        if(empty($input_name))
        {
            $name_err = "*Phone Name must be fill!!!";
        }
        else
        {
            $phoneName = $input_name;
        }

        $input_price = trim($_POST['insertPrice']);
        if(empty($input_price))
        {
            $price_err = "*Phone Price must be fill!!!";
        }
        else if(!ctype_digit($input_price))
        {
            $price_err = "*Phone Price must be a number!!!";
        }
        else
        {
            $phonePrice = $input_price;
        }

        $input_supplier = trim($_POST['insertSupplier']);
        if(empty($input_supplier))
        {
            $supplier_err = "*Supplier must be fill!!!";
        }
        else
        {
            $phoneSupplier = $input_supplier;
        }

        if(empty($name_err) && empty($price_err) && empty($supplier_err))
        {
            $insertSQL = "INSERT INTO cellphonetable (PhoneName,Price,Supplier) VALUES (:name,:price,:supplier)";
            if($stmt = $connect->prepare($insertSQL))
            {
                //
                $stmt->bindParam(':name',$para_name);
                $stmt->bindParam(':price',$para_price);
                $stmt->bindParam(':supplier',$para_supplier);
                //
                $para_name = $phoneName;
                $para_price = $phonePrice;
                $para_supplier = $phoneSupplier;
                //
                if($stmt->execute())
                {
                    header('Location:IndexHome.php');
                    exit();
                }
                else
                {
                    echo "Something wrong!!!Please check again!!!";
                }
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
    <title>Insert Phone Page</title>
    <style>
        h1
        {
            text-align: center;
        }
        table
        {
            margin: 0 auto;
        }
        .err
        {
            color: red;
        }

        td
        {
            height: 50px;
        }
        .td-head
        {
            text-align: center;
            width: 150px;
        }
        .td-input
        {
            width: 220px;
            text-align: center;
        }
        .td-input input
        {
            width: 90%;
        }
        .td-submit
        {
            text-align: center;
        }
        .td-submit input
        {
            padding: 10px 20px;
            border-radius: 25px;
            border: solid 1px;
        }
    </style>
</head>
<body>
    <div class="insert-container">
        <h1>Insert Phone Page</h1>
        <form action="" method="POST">
            <table border="1">
                <tr>
                    <td class="td-head">Insert Phone Name</td>
                    <td class="td-input">
                        <input type="text" name="insertName"> <br>
                        <span class="err"><?php echo (!empty($name_err)?$name_err:''); ?></span>
                    </td>
                </tr>
                <tr>
                    <td class="td-head">Insert Price</td>
                    <td class="td-input">
                        <input type="text" name="insertPrice"> <br>
                        <span class="err"><?php echo (!empty($price_err)?$price_err:''); ?></span>
                    </td>
                </tr>
                <tr>
                    <td class="td-head">Insert Supplier</td>
                    <td class="td-input">
                        <input type="text" name="insertSupplier"> <br>
                        <span class="err"><?php echo (!empty($supplier_err)?$supplier_err:''); ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="td-submit">
                        <input type="submit" name="insert" value="Insert">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>