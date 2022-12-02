<?php
    require_once 'Db/Connect.php';
    echo "<br><br>";

    $selectSQL = "SELECT * FROM cellphonetable";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cellphone Shop Home Page</title>
    <style>
        .header-container
        {
            width: 55%;
            margin: 0 auto;
            margin-top: 20px;
            border-bottom: solid 1px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 20px;
            box-sizing: border-box;
        }

        .header-a a
        {
            text-decoration: none;
            padding: 10px 20px;
            border: solid 1px;
            background-color: lightgreen;
            border-radius: 25px;
            color: whitesmoke;
        }

        .list-container
        {
            margin: 0 auto;
            width: 55%;
            margin-top: 20px;
            box-sizing: border-box;
        }
        table
        {
            margin: 0 auto;
        }
        tbody tr:nth-child(odd)
        {
            background-color: lightgrey;
        }
        td
        {
            padding: 15px 25px;
            text-align: center;
        }

        .V
        {
            border: solid 1px;
            padding: 5px 5px;
            border-radius: 40%;
            text-align: center;
            color: greenyellow;
            background-color: white;
            text-decoration: none;
            margin-right: 10px;
        }
        .D
        {
            border: solid 1px;
            padding: 5px 5px;
            border-radius: 40%;
            text-align: center;
            color: red;
            background-color: white;
            text-decoration: none;
            margin-right: 10px;
        }
        .U
        {
            border: solid 1px;
            padding: 5px 5px;
            border-radius: 40%;
            text-align: center;
            color: blue;
            background-color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="header-container">
        <div class="header-title">
            <h2>Cellphone Shop</h2>
        </div>
        <div class="header-a">
            <a href="insertPhone.php">Insert New</a>
        </div>
    </div>

    <div class="list-container">
        <table border="1">
            <thead>
                <tr>
                    <td>Phone Id #</td>
                    <td>Phone Name</td>
                    <td>Price</td>
                    <td>Supplier</td>
                    <td>Action</td>
                </tr>
            </thead>
            <!--  -->
            <tbody>
                <?php
                    if($result = $connect->query($selectSQL))
                    {
                        if($result->rowCount() > 0)
                        {
                            while($row = $result->fetch())
                            {
                                echo "<tr>";
                                echo '<td>' . $row['PhoneId'] . '</td>';
                                echo '<td>' . $row['PhoneName'] . '</td>';
                                echo '<td>' . $row['Price'] . '</td>';
                                echo '<td>' . $row['Supplier'] . '</td>';
                                echo '<td>'. 
                                        '<a class="V" href="viewPhone.php?VId='.$row['PhoneId'].'">V</a>'.
                                        '<a class="D" href="deletePhone.php?DId='.$row['PhoneId'].'">D</a>'.
                                        '<a class="U" href="updatePhone.php?UId='.$row['PhoneId'].'">U</a>'.
                                     '</td>';
                                echo "</tr>";
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>