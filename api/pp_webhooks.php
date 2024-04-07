<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
date_default_timezone_set('America/Sao_Paulo');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");
if(isset($_POST)){
    $data = $plataform = $client_email = $clientcpf = $client_phone = $client_full_name = $date_create = $date_update = $utm_source = $utm_medium = $utm_campaign = $utm_content = '';
    
    $data = json_decode(file_get_contents('php://input'), true);
    
    if($data['checkout_type_enum'] != "default"){
        echo 'Order Bump Fora';
        exit;
    }
    $platform = 'PerfectPay';
    
    //Dados do Cliente
    $client_email =  $data['customer']['email'];
    $client_cpf = $data['customer']['identification_number'];
    $client_phone = $data['customer']['phone_formated_ddi'];
    $client_full_name = $data['customer']['full_name'];
    //$client_first_name = ucfirst(strtolower(explode(' ', $client_full_name)[0]));
    $date_create = $data['date_created'];

    if(isset($data['date_approved'])){
        $date_update = $data['date_approved'];
    } else {
        $date_update = $date_create;
    }

    if($data['metadata']['utm_source']) {
        $utm_source = $data['metadata']['utm_source'];
    }
    if($data['metadata']['utm_medium']) {
        $utm_medium = $data['metadata']['utm_medium'];
    }
    if($data['metadata']['utm_campaign']) {
        $utm_campaign = $data['metadata']['utm_campaign'];
    }
    if($data['metadata']['utm_content']) {
        $utm_content = $data['metadata']['utm_content'];
    }
    
    include('connect.php');
    
    $query_check_user_exist = $connect->prepare("SELECT * FROM users WHERE user_email = ?");
    $query_check_user_exist->bind_param("s",$client_email);
    $query_check_user_exist->execute();
    $result_query_check_user_exist = $query_check_user_exist->get_result();
    
    if($result_query_check_user_exist->num_rows == 0) {
        $query_create_user = $connect->prepare("INSERT INTO users (user_name,user_email,user_whatsapp,user_cpf,date_create,date_update,utm_source,utm_campaign,utm_medium,utm_content) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $query_create_user->bind_param("ssssss",$client_full_name,$client_email,$client_phone,$client_cpf,$date_create,$date_update,$utm_source,$utm_campaign,$utm_medium,$utm_content);
        $query_create_user->execute();
        echo 'Cadastro realizado com sucesso!';
    } else {
        echo 'Email já cadastrado!';
        exit;
    }
        
}else{
    echo '[]';
    exit;
}


//echo json_encode($response,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

?>