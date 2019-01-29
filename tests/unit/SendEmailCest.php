<?php

use Codeception\Configuration;
use ptibv\codapiclient\SendEmail;

/**
 * Test for sending an E-mail with CODAPI
 *
 * @author Paul van Craenenbroeck <paulc@pti.nl>
 * @version 2018.06.04
 */
class SendEmailCest
{
    public function testSendEmail(UnitTester $I)
    {
        // get config parameters
        $config = Configuration::config()['parameters'];

        // build call and set data
        $email = new SendEmail($config);
        $email->emailTo = $config['emailReceiver'];
        $email->emailFrom = 'noreply@pti.nl';
        $email->subject = 'api-client test';
        $email->htmlContent = '<p>htmlcontent</p>';
        $email->txtContent = 'textcontent';
        $result = $email->send();

        if (!$result) {
            $I->fail('Something went wrong with the request');
        }

        // test result
        if (property_exists($result, 'success')) {
            $I->assertEquals(true, $result->success);
        } else if (property_exists($result, 'status')) {
            $I->assertEquals(401, $result->status);
            $I->fail('Please configure apiKey in parameters or make sure your IP is configured in the API.');
        }
    }
}
