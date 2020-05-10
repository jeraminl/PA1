<?php

if(empty($_POST['email'])){
    echo 'An email needs to be provided. <br/>';
} else {
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'A valid email needs to be provided. <br/>';
    }
}

?>