<?php

namespace ptibv\codapiclient;

/**
 * Send a letter with the PTI COD API
 *
 * @author Paul van Craenenbroeck <paulc@pti.nl>
 * @version 2019.01.28
 * @package ptibv\codapiclient
 */
class PrintLetter extends CodApiClient
{
    /**
     * Array of base64 encoded files
     *
     * @var array
     */
    public $files = [];

    /**
     * Address fields
     * "address" : {
     *      "company" : "Pincode Telenet BV",
     *      "name" : "Paul van Craenenbroeck",
     *      "street" : "Korenmolenlaan",
     *      "number" : "1c",
     *      "zipCode" : "3447 GG",
     *      "city" : "Woerden",
     *      "country" : "Netherlands"
     * }
     *
     * @var mixed
     */
    public $address;

    /**
     * ID of the logo used
     *
     * @var string
     */
    public $logoId;

    /**
     * Identifier for groups of letters
     * '/(^[A-Za-z0-9-]+$)/'
     * Minimum 4 characters, Maximum 60 characters
     *
     * @var string
     */
    public $batchId;

    /**
     * Send a letter
     *
     * @return mixed
     */
    public function send()
    {
        return $this->callCodApi('/letter/send', $this->getData());
    }

    /**
     * Generate data for request
     *
     * @return array
     */
    protected function getData()
    {
        return array(
            'files' => $this->files,
            'address' => $this->address,
            'logoId' => $this->logoId,
            'batchId' => $this->batchId,
        );
    }
}
