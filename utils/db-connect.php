<?php
    $dns="mysql:host=localhost;dbname=quizz";
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