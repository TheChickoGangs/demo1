<?php
    require_once 'Db/Connect.php';
    echo "<br>";

    $selectSQL = "SELECT * FROM customertable";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management Home Page</title>
    <style>
        .header
        {
            width: 60%;
            margin: 0 auto;
            display: flex;
            border-bottom: dotted 1px;
            align-items: center;
            justify-content: space-between;
            padding: 0px 30px;
            box-sizing: border-box;
        }

        .item-a
        {
            padding: 10px 20px;
            background-color: lightgreen;
            border-radius: 30px;
            text-decoration: none;
            color: white;
        }

        .body
        {
            width: 60%;
            margin: 0 auto;
            margin-top: 20px;
        }
        table
        {
            margin: 0 auto;
        }

        td
        {
            padding: 10px 15px;
            text-align: center;
        }

        .editBtn
        {
            padding: 7px 7px;
            background-color: lightskyblue;
            color: white;
            text-decoration: none;
            border-radius: 10px;
        }

        .deleteBtn
        {
            padding: 7px 7px;
            background-color: red;
            color: white;
            text-decoration: none;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="item-title">
            <h2>Customer Management</h2>
        </div>
        <a class="item-a" href="insertCus.php">Add New Customer</a>
    </div>

    <div class="body">
        <table border="1">
            <thead>
                <tr>
                    <td>Customer Id</td>
                    <td>Customer Name</td>
                    <td>Customer Gmail</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = mysqli_query($connect,$selectSQL);
                ?>
                <?php
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($fetchAll = mysqli_fetch_array($result))
                        {
                            echo '<tr>';
                            echo '<td>' . $fetchAll['CustomerId'] . '</td>';
                            echo '<td>' . $fetchAll['CustomerName'] . '</td>';
                            echo '<td>' . $fetchAll['CustomerGmail'] . '</td>';
                            echo '<td>' . '<a class="editBtn" href="editCus.php?ECusId='.$fetchAll['CustomerId'].'">Edit</a>' . '</td>';
                            echo '<td>' . '<a class="deleteBtn" href="deleteCus.php?DCusId='.$fetchAll['CustomerId'].'">Delete</a>' . '</td>';
                            echo '</tr>';
                        }
                    }
                    else
                    {
                        echo '<tr>';
                        echo '<td colspan="5">' . '<h2>No Customer To Show Here</h2>' . '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>