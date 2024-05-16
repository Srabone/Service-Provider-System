<?php

    require_once('database.php');

    $row;

    function login($email, $password){

        global $row;

        $con = dbConnection();
        $sql = $con -> prepare ("select * from UserInfo where email = ? and password = ?");
        $sql -> bind_param("ss", $email, $password);
        $sql -> execute();
        $result = $sql -> get_result();
        $count = mysqli_num_rows($result);

        if($count == 1) 
        {
        $row = mysqli_fetch_assoc($result);
        return $row;
        }
        else return false;

    }


    function addUser($fullname, $phone, $email, $address, $dob, $religion, $username, $password, $role){

        $con = dbConnection();

        $sql = "insert into UserInfo values('', '{$fullname}' ,'{$phone}' ,'{$email}', '{$address}', '{$dob}', '{$religion}', '{$username}', '{$password}','{$role}', 'Active')";

        if(mysqli_query($con, $sql)) return true;
        else return false;
        
    }
    
    


    function getUserByMail($email){

        $con = dbConnection();
        $sql = $con -> prepare ("Select * from UserInfo where Email = ?");
        $sql -> bind_param("s", $email);
        $sql -> execute();
        $result = $sql -> get_result();
        


        $con = dbConnection();
        $sql = "Select * from UserInfo where Email = '$email'";
             
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
        
    }

    function uniqueEmail($email){

        
        $con = dbConnection();
        $sql = $con -> prepare ("select email from userinfo where email like ? ");
        $sql -> bind_param("s", $email);
        $sql -> execute();
        $result = $sql -> get_result();
        $count = mysqli_num_rows($result);

        if($count == 1) return false;
        else return true;
    }

    function changePassword($id, $newpass){

        $con=dbConnection();
        $sql = $con -> prepare ("update UserInfo set Password = ? where UserID = ?");
        $sql -> bind_param("ss", $newpass, $id);

        if($sql -> execute()===true) return true;
        else return false; 

    }

    function userInfo($id){

        $con=dbConnection();
        $sql="select* from UserInfo where UserID='$id'";

        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row;
        
    }


    function updateUserInfo($id, $fullname, $email, $phone, $address, $religion, $username){

        $con = dbConnection();
        $sql = "update UserInfo set Fullname = '$fullname', Username = '$username', Phone = '$phone', Email = '$email', Religion = '$religion', Address = '$address'  where UserID = '$id'";
             
        if(mysqli_query($con,$sql)===true) return true;
        else return false; 
        
    }

    function getAllManager(){

        $con = dbConnection();
        $sql = "select * from UserInfo where Role='Manager' and status='Active'";

        $result = mysqli_query($con,$sql);
        return $result;

    }

    

?>