<?php

use Codeception\Configuration;
use ptibv\codapiclient\SendSms;

/**
 * Test for sending a SMS with CODAPI
 *
 * @author Paul van Craenenbroeck <paulc@pti.nl>
 * @version 2018.06.04
 */
class SendSmsCest
{
    public function SendEmail(UnitTester $I)
    {
        // get config parameters
        $config = Configuration::config()['parameters'];

        $sms = new SendSms($config);
        $sms->text = 'This is a test sms';
        $sms->receiver = $config['smsNumber'];
        $sms->sender = 'CODAPITEST';
        $result = $sms->send();

        // test result
        if (property_exists($result, 'success')) {
            $I->assertEquals(true, $result->success);
        } else if (property_exists($result, 'status')) {
            $I->assertEquals(401, $result->status);
            $I->fail('Please configure apiKey in parameters or make sure your IP is configured in the API.');
        }
    }
}
