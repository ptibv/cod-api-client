COD API REST Library
=

This library enables the usage of the COD Rest Api.

There are functional tests available in the package which can also be used as examples.

Example:
```
$config = array(
    'baseUrl' => 'url_to_api',
    'apiKey' => 'fill_in_api_key'
);

$email = new \ptibv\codapiclient\SendEmail($config);
$email->emailTo = 'receiver@domain.tld';
$email->emailFrom = 'sender@domain.tld';
$email->subject = 'api-client test';
$email->htmlContent = '<p>htmlcontent</p>';
$email->txtContent = 'textcontent';
$result = $email->send();
 ```

To run the tests, follow the following steps:
- execute `composer install` (which installs the codeception framework)
- edit the parameters in codeception.yml
- execute `php vendor/bin/codecept run`
