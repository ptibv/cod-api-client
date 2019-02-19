<?php

use Codeception\Configuration;
use ptibv\codapiclient\PrintLetter;

/**
 * Test for sending a SMS with CODAPI
 *
 * @author Paul van Craenenbroeck <paulc@pti.nl>
 * @version 2018.06.04
 */
class PrintLetterCest
{
    public function testPrintLetter(UnitTester $I)
    {
        // get config parameters
        $config = Configuration::config()['parameters'];

        $model = new PrintLetter($config);
        $model->files = [
            base64_encode(file_get_contents(codecept_data_dir() . 'File1.pdf')),
            base64_encode(file_get_contents(codecept_data_dir() . 'File2.pdf')),
        ];
        $model->address = json_decode(file_get_contents(codecept_data_dir() . 'PrintLetter.json'));
        $model->envelopeType = 'BE01';
        $model->logoId = '12345';
        $model->batchId = 'CODAPITEST';
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
