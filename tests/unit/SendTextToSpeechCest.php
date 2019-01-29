<?php

use Codeception\Configuration;
use ptibv\codapiclient\SendTextToSpeech;

/**
 * Test for sending a SMS with CODAPI
 *
 * @author Paul van Craenenbroeck <paulc@pti.nl>
 * @version 2018.06.04
 */
class SendTextToSpeechCest
{
    public function testSendTextToSpeech(UnitTester $I)
    {
        // get config parameters
        $config = Configuration::config()['parameters'];

        $model = new SendTextToSpeech($config);
        $model->text = 'Dit is een test <break time="250ms"/>1<break time="250ms"/>2<break time="250ms"/>3 om text ';
        $model->text .= 'to speech berichten te versturen';
        $model->receiver = $config['textToSpeechNumber'];
        $model->sender = 'CODAPITEST';
        $result = $model->send();

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
