<?php

include './classes/user.php';
include 'dbProcessor.php';
$target_dir = 'data/';
if (isset($_POST["import"])) {
    
        $fileName = $target_dir .  basename($_FILES["fileToUpload"]["name"]);

    $row = 1;

    $users = [];

    $i=0;

    if (($handle = fopen($fileName, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;
            $user = new User();
            $user->setFirst_name(strval($data[0]));
            $user->setLast_name(strval($data[1]));
            $user->setEmail(strval($data[2]));
            $user->setGender(strval($data[3]));
            $user->setPhone_number(strval($data[8]));
            $user->setBirthdate(strval($data[4]));
            $user->setAddress_home(strval($data[5]));
            $user->setAddress_work(strval($data[6]));
            $user->setAddress_other(strval($data[7]));
            $users[$i++]=$user;
        }
        
        fclose($handle);
        $result = validateData($users);
        if($result == 1){
            header("Location: successpage.html");
            die();
        }
    }

    
}
?>
