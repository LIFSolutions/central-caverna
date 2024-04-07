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
    $email = $password = $username = $operacao = '';
    if(isset($data['password']) && isset($data['username']) && isset($data['email'])){
        $email = $data['email'];
        $password = $data['password'];
        $username = $data['username'];
    }
    $queryUpdateUsuario = $connect->prepare("UPDATE users SET password = ?, username = ? WHERE username = ?");
    $queryUpdateUsuario->bind_param("sss", $password, $username, $email);
    $queryUpdateUsuario->execute();
    
    if($queryUpdateUsuario->affected_rows > 0) {
        $response['success'] = true;
        $response['message'] = "Dados salvos com sucesso!";
    } else {
        $response['success'] = false;
        $response['message'] = "Erro ao salvar no banco: " . $connect->error;
    }
}

$connect->close();
echo json_encode($response);
?>
