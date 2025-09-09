<?php
//Telling te browser that everything we reply will be in JSON
header("Content-Type:application/json");
 
//connect to the database
$host="localhost";
$user = "root";
$pass = "";  //default password is empty but key in password if you have one
$db = "Unisavedb";
$conn = new mysqli ($host,$user,$pass,$db);

//this stops if the connection fails
if($conn->connect_error){
    echo json_encode(["ok" => false, "error"=> "Database connection failed"]);
    exit;
}
//this line of code reads the raw data sent by the client eg postman
$input =json_decode(file_get_contents("php://input"),true);

//grab the information that is needed
$username =$input["username"]??"";
$email = $input["email"]??"";
$password = $input["password"]??"";

//validation check(makes sure that all the fields are keyyed in properly)
if(|$username ||$email || |$password){
    echo json_encode(["ok"=> false])
}
//this checks if the email already exists
$check = $conn->prepare("SELECT id FROM users WHERE email = ?");
$check -> bind_param("s",$email);
$check ->execute();
$check->store_result();

if($check->num_rows > 0){
    echo json_encode(["ok" => false,"error" =>"Email already registered"]);
    exit;
}
//*hash* the password before storing
$password_hash = password_hash($password, PASSWORD_DEFAULT);

//now save the new user in the database
$stmt = $conn ->prepare("INSERT INTO users(username, email,password_hash,created_at)VALUES (?,?,?,NOW())");
$stmt ->bind_param("sss",$username, $email ,$password_hash);

if ($stmt->execute()){
    echo json_encode(["ok"=>true, "message" =>"Registered successfully"]);
    }else{
        echo json_encode(["ok" =>false, "error" => "Could not save user"]);
    }
    ?>
