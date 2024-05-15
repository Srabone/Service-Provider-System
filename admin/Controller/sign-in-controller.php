<?php

session_start();

    require_once('../Model/user-info-model.php');

    

    if(isset($_POST['submit']))
    {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $remember=true;

        

        if(strlen(trim($email)) == 0 || strlen(trim($password)) == 0){

            header('location:../View/sign-in.php?err=empty');
            return;

        }

        $status = login($email, $password);

        if($status!=false){
            if($status['Role'] == "Admin" and $status['Status'] == "Active" ){

                if($remember=="true") setcookie("flag", "true", time()+999999999,"/");
                if($remember=="false") setcookie("flag","false",time()+3600,"/");
                $_SESSION['flag'] = "true";
                setcookie("id", $status['UserID'], time()+86400, "/");
                header('location:../View/admin-home.php');

            }
            else header('location:../View/sign-in.php?err=bannedUser');

        }else header('location:../View/sign-in.php?err=mismatch');
        
    }

?>