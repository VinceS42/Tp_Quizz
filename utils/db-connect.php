<?php

    // $env = parse_ini_file('../.env');

    $address = 'localhost';

    $dns="mysql:host=" . $address . ";dbname=quizz";
    $user="root";
    $password="";

    try{
        $db=new PDO($dns,$user,$password);
        // echo "<p>Connected</p>";
    }
    catch(Exception $message){
        echo "J'crois y a une dinguerie dans ton code frérot "."<pre>$message</pre>";
    }
?>
