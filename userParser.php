<?php
/**
 * Created by PhpStorm.
 * User: Kabbali
 * Date: 24/09/2018
 * Time: 3:07 PM
 */

$USER_FILE_PATH = "user.txt";
$HASH_TAG_LINE = "################################################ \n";

//THIS VARIABLE STORAGE THE CREDENTIALS IN JSON FORMAT
$users_array_content = array("users" => array());

// CHECK IF USER FILE IS READEBLE
if (is_readable($USER_FILE_PATH)) {
    $user_txt = fopen($USER_FILE_PATH, "r") or die("Unable to open file");
    #echo $HASH_TAG_LINE;
    #echo "\t $USER_FILE_PATH read successfully \n";
    #echo $HASH_TAG_LINE;

    // WE GET EACH LINE TO PARSE CREDENTIALS
    while ($line = fgets($user_txt)) {

        // TO TMP STORE THE PARSED CREDENTIALS
        $user = explode(":", $line)[0];
        $pass = explode(":", $line)[1];
        $credential = array(
            "user" => $user,
            "pass" => $pass);

        // ADD CREDENTIALS TO ARRAY
        array_push($users_array_content["users"], $credential);
    }

    // CREATE THE USER FILE IN JSON FORMAT
    $users_json_file = fopen("user.json", "w");
    fwrite($users_json_file, json_encode($users_array_content));
    #echo $HASH_TAG_LINE;
    #echo $USER_FILE_PATH . "users.json was written successfully \n";
    #echo $HASH_TAG_LINE;
    fclose($users_json_file);
}

