<?php

    require_once("../Models/MemberCredentials.php");
    $SignUp = new MemberCredentials();

    if(isset($_POST["SignUp"])){

        $MemberId = $_POST["MemberId"];
        $Email = $_POST["Email"];
        $Name_ = $_POST["Name"];
        $Password_ = $_POST["Password"];

        $response = $SignUp->saveCredentials($MemberId,$Email,$Name_,$Password_);
        echo json_encode($response);

    }



?>