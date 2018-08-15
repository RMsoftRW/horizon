<?php
    
    $errors = [];
    $username = "";
    $pass = "";
    $msg1 = "";

    if (isset($_POST['submt']) && !empty($_POST['usname']) && !empty($_POST['psswd'])) {
        if (login($_POST['usname'], $_POST['psswd'])) {
            
            redirect_to(ROOT."/scan.php");
        }else{
            
        }
    }