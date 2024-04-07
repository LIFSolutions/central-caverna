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
    $email = $password = $operacao = '';
    if(isset($data['password'])){
        
        $password = $data['password'];
        
        if(isset($data['email'])){
            $email = $data['email'];
            $operacao = 'Email';
            $queryUsuario = $connect->prepare("SELECT * FROM users WHERE user_email = ? AND password = ?");
            $stmt = $connect->prepare("UPDATE auth SET last_login = ? WHERE user_email = ?");
        }
        if(isset($data['username'])){
            $email = $data['username'];
            $operacao = 'Username';
            $queryUsuario = $connect->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
            $queryUpdateUsuario = $connect->prepare("UPDATE auth SET last_login = ? WHERE username = ?");
        }
        if(isset($data['whatsapp'])){
            $email = $data['whatsapp'];
            $operacao = 'Telefone';
            $queryUsuario = $connect->prepare("SELECT * FROM users WHERE user_whatsapp = ? AND password = ?");
            $stmt = $connect->prepare("UPDATE auth SET last_login = ? WHERE user_whatsapp = ?");
        }
    }
    
    $queryUsuario->bind_param("ss", $email, $password);
    $queryUsuario->execute();
    $resultUsuario = $queryUsuario->get_result();
    
    if ($resultUsuario->num_rows > 0) {
        $row = $resultUsuario->fetch_assoc();
        $expirationDate = $row['date_update'];
        $user_full_name = $row['user_name'];
        $user_name = ucfirst(strtolower(explode(' ', $user_full_name)[0]));
        $last_login = date("Y-m-d H:i:s");
        
        $queryUpdateUsuario->bind_param("ss", $last_login, $email);
        $queryUpdateUsuario->execute();
        
        $response['success'] = true;
        $response['message'] = "Olá, '$user_name'!";
    } else {
        $response['success'] = false;
        $response['message'] = "'$operacao' não encontrado. Tente novamente!";
    }
}

$connect->close();
echo json_encode($response);
?>
