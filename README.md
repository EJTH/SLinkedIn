A simple linkedin class for PHP 5+
=========
 2013   Elias Toft Hansen    @    HR-Skyen ApS
 
 Having problems with older 3rd party linkedin API's we decided
 that it was about time we migrated to OAuth2 and rewrote a proper sturdy 
 integration we could use in our HR Management software.
 
 This code is a cURL enabled OOP version of the OAuth2 PHP examples found on
 http://developer.linkedin.com/documents/code-samples
 
 Requirements:
  * PHP 5
  * cURL extension
  * OAuth2 API key and secret for LinkedIn
 
 
Examples
=========
Examples can be found in the repository, examples include:

* Get simple info (name, last name)
* Share a post
* Reusing a consumer token stored in a database

Reusing user tokens
=========
Store tokens from getTokenData().
Use SimpleLinkedIn::setTokenData('USER_TOKEN') to reuse a stored token BEFORE calling authorize()!
When reusing tokens its important to try {} catch calls to fetch() and 
check if the response status code is 401 and then reauthorize a token if that happens.
For more info on the subject check see [the reusing tokens example](examples/reusing-tokens.php).

JSON vs XML
=========
I recommend using json / standard behavior of this class. You can make request and retrieve data as XML with SlinkedIn, but the default
behavior is auto-encoding to and from json and php objects. What that means is that you should just use arrays or objects for supplying data to a request.
but if you json_encode it, or generate XML, it will still work:

* $ln->fetch('POST','/v1/foo',array( /*... data ...*/));
* $ln->fetch('POST','/v1/foo',json_encode(array( /*... data ...*/));
* $ln->fetch('POST','/v1/foo',$xmldom->saveXML(),'xml'); //Data returned will be XML String!

