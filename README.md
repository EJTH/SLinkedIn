SLinkedIn
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


Reusing user tokens
=========
Store tokens from getTokenData().
Use SimpleLinkedIn::setTokenData('USER_TOKEN') to reuse a stored token BEFORE calling authorize()!