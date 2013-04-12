<?php

include '../simplelinkedin.class.php';

//Set up the API
$ln = new SimpleLinkedIn('YOUR_API_KEY', 'YOUR_API_SECRET');
$ln->addScope('rw_nus');
//Authorize.
if($ln->authorize()){
    //Make an example post, and print the result with print_r
    print_r ($this->ln->fetch('POST','/v1/people/~/shares',
        array(
            'comment' => 'Hello Linkedin',
            'content' => array(
                'title' => 'SimpleLinkedIn (SLinkedin)',
                'description' => 'Open source OAuth2 Implementation for PHP and linkedin.',
                'submittedUrl' => 'https://github.com/EJTH/SLinkedIn/'
            ),
            'visibility' => array('code' => 'anyone' )
        )
    ));
}
?>