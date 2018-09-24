<?php
/**
 * Created by PhpStorm.
 * User: Kabbali
 * Date: 24/09/2018
 * Time: 3:03 PM
 */

include "userParser.php";

// Validations
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "-FAIL\n";
    echo ' Request with wrong method.';
    http_response_code(405);
    exit;
}

if (!isset($_POST['user'])) {
    echo "-FAIL\n";
    echo ' The username is missing.';
    http_response_code(400);
    exit;
}

if (!isset($_POST['pass'])) {
    echo "-FAIL\n";
    echo ' The password is missing.';
    http_response_code(400);
    exit;
}

// Variable assigments
$user = $_POST['user'];
$pass = $_POST['pass'];
$is_valid_user = "-FAIL\n";

// Validate credentials
foreach ($users_array_content["users"] as $credential){
    if($credential['user'] == $user && $credential['user'] == $pass) {
        if (isset($_POST['valid'])) {
            $is_valid_user = $_POST['valid'];
        }
    }
}

echo $is_valid_user;

?>
