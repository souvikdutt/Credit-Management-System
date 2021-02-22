<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Transfer</title>
    <link rel="stylesheet" href="css/CreditTransfer.css">
</head>
<body>
    <?php
        require_once('user.php');
        $obj = new User;
        $users = $obj->showUser();
    ?>
    <form class="box" action="action.php" method="POST">
        <?php
            if(isset($_GET['Transfer']) && $_GET['Transfer']==1) {
                echo '<span style="color:green;text-align:center;">**Amount Transferred Successfully**<br><br></span>';
            }else if(isset($_GET['Transfer']) && $_GET['Transfer']==0) {
                echo '<span style="color:red;text-align:center;">**Something went wrong**<br><br></span>';
            }
        ?>
        <label for="uname">Transfer Credit from</label>
        <select id="uid" name="uid1">

            <?php 
                foreach($users as $user) {?>
                <option class="option" value="<?= $user['id']; ?>"><?= $user['name']; ?></option>
            <?php 
            }?>

        </select>
        <?php
            if(isset($_GET['lowBalance']) && $_GET['lowBalance']==0) {
                echo '<span style="color:red;text-align:center;">**Sender does not have enough credit to transfer.**<br><br></span>';
            }
        ?>
        <label>to</label>
        <select id="uid" name="uid">

            <?php 
                foreach($users as $user) {?>
                <option class="option" value="<?= $user['id']; ?>"><?= $user['name']; ?></option>
            <?php 
            }?>

        </select>
        <?php
            if(isset($_GET['SameId']) && $_GET['SameId']==0) {
                echo '<span style="color:red;text-align:center;">**Amount can not be transferred for the same person.**</span>';
            }
        ?>
        <input type="int" placeholder="Enter amount" name="amount" autocomplete="off" required>
        <?php
            if(isset($_GET['Amount']) && $_GET['Amount']==0) {
                echo '<span style="color:red;text-align:center;">**Amount should be greater than zero.**</span>';
            }
        ?>
        <input class="btn" type="submit" value="Transfer" name="submit">
        <a href="Table1.php">Go Back</a>
    </form>
</body>
</html>