<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    
    <!-- include your password generator here or remove html and use it anywhere -->
    
</body>
</html>

<?php

// Randomly generate 12 letter password - includes special characters
// change length of password by changing number in for loop

function pass_generator() {

    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+-=/.';
    $password = array(); 
    
    $chars_length = strlen($chars) - 1; 
    for ($i = 0; $i < 12; $i++) {
        $key = rand(0, $chars_length);
        $password[] = $chars[$key];
    }
    return implode($password); 
}
echo pass_generator();
