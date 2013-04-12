<?php

include '../simplelinkedin.class.php';

//Set up the API
$ln = new SimpleLinkedIn('YOUR_API_KEY', 'YOUR_API_SECRET');

//Authorize.
if($ln->authorize()){
    //Fetch user info
    $user = $ln->fetch('GET', '/v1/people/~:(firstName,lastName)');
    
    print "Hello $user->firstName $user->lastName.";
}
?>