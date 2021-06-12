<?php

require_once('./config/connection.php');


function connection(){

}

function validateData($users){
    $users_good = [];
    $users_error = [];
    $j = 0;
    $g = 0;
    $email_flag = 1;
    $phone_flag = 1;
    for($i=1;$i<sizeof($users);$i++){

        $from = new DateTime($users[$i]->getBirthdate());
        $to = new DateTime('today');

        $flag = 1;
        if($users[$i]->getFirst_name()==""){
            $flag = 0;
            $users[$i]->setError_messages("Error in First Name");
        }
        if($users[$i]->getLast_name()==""){
            $flag = 0;
            $users[$i]->setError_messages("Error in Last Name");
        }
        if($users[$i]->getEmail()=="" || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $users[$i]->getEmail())){
            $flag = 0;
            $email_flag = 0;
            $users[$i]->setError_messages("Error in Email");
        } 
        if($users[$i]->getGender()==""){
            $flag = 0;
            $users[$i]->setError_messages("Gender is missing");
        }
        if($users[$i]->getPhone_number()==""){
            $flag = 0;
            $phone_flag = 0;
            $users[$i]->setError_messages("Error in Phone Number");
        }
        if(checkifDuplicatePhonenumber($users[$i]->getPhone_number()) && $phone_flag!=0){
            $users[$i]->setError_messages("Duplicate Phone Number");
        }
        if($users[$i]->getBirthdate()=="" ){
            $flag = 0;
            $users[$i]->setError_messages("Error in Birth Date");
        }
        if($from->diff($to)->y < 18){
            $flag = 0;
            $users[$i]->setError_messages("Age shpuld be more than 18");
        }
        if(($users[$i]->getAddress_home()=="" && $users[$i]->getAddress_work()=="" && $users[$i]->getAddress_other()=="")){
            $flag = 0;
            $users[$i]->setError_messages("Atleast one address should be present");
        }
        if($flag==0){
            $users_error[$j++] = $users[$i];
        }
        else{
            $users_good[$g++] = $users[$i];
        }
        
    }
    // insert good users in main user table 
    insertToUser($users_good);
    // insert error having data to user error table
    insertToUserError($users_error);
    return 1;
}

function checkifDuplicateEmail($email){
    global $conn;
    $query = "select count(user_id) from user where user_email='".$email."'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==0)
        return false;
    else 
        return true;
}
function checkifDuplicatePhonenumber($Phone_number){
    global $conn;
    $query = "select count(user_id) from user where user_mobile='".$Phone_number."'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==0)
        return false;
    else 
        return true;
}

function insertToUser($users){
    global $conn;
    $sql = "";
    foreach($users as $user){
        $name = $user->getFirst_name()." ".$user->getLast_name();
        $email = $user->getEmail();
        $gender = $user->getGender();
        $dob = $user->getBirthdate();
        $mobile = $user->getPhone_number();
        $add_home = $user->getAddress_home();
        $add_work = $user->getAddress_work();
        $add_other = $user->getAddress_other();
        $sql = $sql."INSERT INTO user (`user_name`,`user_email`,`user_gender`,`user_dob`,`address_home`,`address_work`,`address_other`,`user_mobile`) VALUES ('".$name."','".$email."','".$gender."','".$dob."','".$add_home."','".$add_work."','".$add_other."','".$mobile."');";        

    }
//     echo $sql;
mysqli_multi_query($conn, $sql);
//      $result = $conn->multi_query($sql);
//     if(!$result){
//         echo "Error executing query: (" . $conn->errno . ") " . $conn->error;
//     }

    
}

function insertToUserError($users){
    global $conn;
    $stmt = $conn->prepare("INSERT INTO user_error (`user_name`,`user_email`,`user_gender`,`user_dob`,`address_home`,`address_work`,`address_other`,`user_mobile`,`error_message`) VALUES (?,?,?,?,?,?,?,?,?);");
    $stmt->bind_param("sssssssss", $name,$email,$gender,$dob,$add_home,$add_work,$add_other,$mobile,$error_message);
    foreach($users as $user){ 
        $name = $user->getFirst_name()." ".$user->getLast_name();
        $email = $user->getEmail();
        $gender = $user->getGender();
        $dob = $user->getBirthdate();
        $mobile = $user->getPhone_number();
        $add_home = $user->getAddress_home();
        $add_work = $user->getAddress_work();
        $add_other = $user->getAddress_other();
        $error_message = $user->getError_messages();
        $stmt->execute();       
    }   
}

function showGoodusers(){
    global $conn;
    $query = "SELECT * FROM user LIMIT 10";
    $result = mysqli_query($conn,$query);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    return $rows;
}
function shownexttenGooduser($next){
    global $conn;
    $query = "SELECT * FROM user LIMIT 10 OFFSET $next";
    $result = mysqli_query($conn,$query);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    return $rows;
}
function showErrorusers(){
    global $conn;
    $query = "SELECT * FROM user_error LIMIT 10";
    $result = mysqli_query($conn,$query);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    return $rows;
}
function shownexttenErroruser($next){
    global $conn;
    $query = "SELECT * FROM user_error LIMIT 10 OFFSET $next";
    $result = mysqli_query($conn,$query);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    return $rows;
}
?>
