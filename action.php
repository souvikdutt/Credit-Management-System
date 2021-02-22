<?php
    require_once('user.php');
    $newAmt = $_POST["amount"];

    if($newAmt>0) {
        if($_POST['uid'] != $_POST['uid1']) {
            $obj = new User;
            $obj1 = new User;
        
            $obj->setId($_POST['uid']);
            $obj1->setId($_POST['uid1']);
        
            $us = $obj->getUserCreditById();
            $us1 = $obj1->getUserCreditById();
            
            if( $us1['credit'] >= $newAmt ) {
                $deductAmt = $us1['credit'] - $newAmt;
                $newAmt = $newAmt + $us['credit'];
                
                $obj->setCredit($newAmt);
                $obj1->setCredit($deductAmt);
            
                if($obj->updateCredit() && $obj1->updateCredit()) {
                    header('location: CreditTransfer.php?Transfer=1');
                }else {
                    header('location: CreditTransfer.php?Transfer=0');
                }
            } else {
                header('location: CreditTransfer.php?lowBalance=0');
            }
        } else {
            header('location: CreditTransfer.php?SameId=0');
        }
    }else {
        header('location: CreditTransfer.php?Amount=0');
    }
    
?>