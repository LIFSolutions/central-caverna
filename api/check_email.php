<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
date_default_timezone_set('America/Sao_Paulo');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");
include('connect.php');

$data = json_decode(file_get_contents('php://input'), true);

$response = array();
$response['success'] = false;
$response['message'] = "Error, nenhum dado encontrado.";

if($data !== '') {
    $email = '';
        
        if(isset($data['email'])){
            $email = $data['email'];
            $queryUsuario = $connect->prepare("SELECT * FROM users WHERE user_email = ?");
        }
    
    $queryUsuario->bind_param("s", $email);
    $queryUsuario->execute();
    $resultUsuario = $queryUsuario->get_result();
    
    if ($resultUsuario->num_rows > 0) {
        $row = $resultUsuario->fetch_assoc();
        $user_full_name = $row['user_name'];
        $user_name = ucfirst(strtolower(explode(' ', $user_full_name)[0]));
        
        $response['success'] = true;
        $response['message'] = "Olá, '$user_name'!";
        
        $password = $row['password'];
        if($password == '' || $password == null) {
            $response['onboarding'] = true;
        } else {
            $response['onboarding'] = false;
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Email não encontrado. Tente novamente!";
    }
}

$connect->close();
echo json_encode($response);
?>
