<?php

use Codeception\Configuration;
use ptibv\codapiclient\GetFeedback;

/**
 * Test for getting feedback for E-mail with CODAPI
 *
 * @author Paul van Craenenbroeck <paulc@pti.nl>
 * @version 2018.06.04
 */
class GetFeedbackEmailCest
{
    public function testGetFeedback(UnitTester $I)
    {
        // get config parameters
        $config = Configuration::config()['parameters'];

        // build call and set data
        $feedback = new GetFeedback($config);
        $feedback->type = 'email';
        $feedback->date = date('Y-m-d');
        $feedback->start = 0;
        $feedback->limit = 1000;
        $result = $feedback->getFeedback();

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
