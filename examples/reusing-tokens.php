<?php

/**
 * This is just for illustrative purposes. Ideally should be a user object and based on a real database
 */
class TokenDB {
    static $file = 'token.storage';
    public static function getToken(){
        return @file_get_contents(TokenDB::$file);
    }
    public static function setToken($t){
        file_put_contents(TokenDB::$file,$t);
    }
    public static function resetToken(){
        file_put_contents(TokenDB::$file,'');
    }
}

include '../simplelinkedin.class.php';

//Set up the API
$ln = new SimpleLinkedIn('YOUR_API_KEY', 'YOUR_API_SECRET');
$ln->setTokenData(TokenDB::getToken());


if($ln->authorize()){    
    try {
        //Fetch user info
        $user = $ln->fetch('GET', '/v1/people/~:(firstName,lastName)');
    } catch(SimpleLinkedInException $e){
        //If token was expired or invalid, we reset and reauthorize.
        if($e->getLastResponse()->status == 401){
            //reset the stored token, so we can go through the authorization process 
            //again at page refresh
            TokenDB::resetToken();
            
            //Reauthorize..
            $ln->authorize();
            exit;
        }
    }
    
    print "Hello $user->firstName $user->lastName.";
    
    
    //Update stored token.
    $tokenData = $ln->getTokenData();
    TokenDB::setToken($tokenData['access_token']);
}
?>