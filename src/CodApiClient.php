<?php

namespace ptibv\codapiclient;

use Exception;

/**
 * Class for handling the PtiCodApi
 *
 * @author Robin Steeneken <robin@pti.nl>
 * @author Paul van Craenenbroeck <paulc@pti.nl>
 * @version 2018.06.04
 * @package ptibv\codapiclient
 */
class CodApiClient
{
    /**
     * Base URL for the COD API on this environment
     *
     * @var string
     */
    private $baseUrl;

    /**
     * API key which you received from PTI
     *
     * @var string
     */
    private $apiKey;

    /**
     * PtiCodApi constructor.
     *
     * @param array $config the COD API Configuration
     *
     * @throws Exception
     */
    public function __construct(array $config)
    {
        $this->baseUrl = $config['baseUrl'];
        $this->apiKey = $config['apiKey'];
    }

    /**
     * Do a call to the PTI COD API
     *
     * @param string $apiCall the part after the base url, starting with a /
     * @param array $apiData
     *
     * @return mixed json_decoded result
     */
    public function callCodApi($apiCall, $apiData)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_USERPWD, $this->apiKey . ':');
        curl_setopt($ch, CURLOPT_URL, $this->baseUrl . $apiCall);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($apiData));

        $sResult = curl_exec($ch);
        if ($sResult !== false) {
            $sDecodedResult = json_decode($sResult);
            if ($sDecodedResult !== null) {
                //Jay, success
                return $sDecodedResult;
            }
        }

        return false;
    }
}
