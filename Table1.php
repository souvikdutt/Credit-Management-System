<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User details</title>
    <link rel="stylesheet" href="css/showTable.css">
</head>
<body>
    <div class="nav">
        <span>User Details</span>
        <div class="links">
            <a href="CreditTransfer.php">Do a Transaction</a>
            <a href="index.php">Home</a>
        </div>
    </div>
    <div class="main">
        
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email Id</th>
                <th>Credit</th>
            </tr>
            <?php
                require_once('user.php');
                $obj = new User;
                $users = $obj->showUser();
                foreach($users as $user) {
                    echo "<tr>
                        <td>$user[id]</td>
                        <td>$user[name]</td>
                        <td>$user[gmail]</td>
                        <td>$user[credit]</td>
                    </tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>