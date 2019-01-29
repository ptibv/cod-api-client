<?php

namespace ptibv\codapiclient;

/**
 * Send an sms with the PTI COD API
 *
 * @author Paul van Craenenbroeck <paulc@pti.nl>
 * @version 2018.06.04
 * @package ptibv\codapiclient
 */
class SendSms extends CodApiClient
{
    /**
     * Sender name or number
     *
     * @var string
     */
    public $sender;

    /**
     * Sender number
     *
     * @var string
     */
    public $receiver;

    /**
     * Text message
     *
     * @var string
     */
    public $text;

    /**
     * Send an sms
     *
     * @return mixed
     */
    public function send()
    {
        return $this->callCodApi('/sms/send', $this->getData());
    }

    /**
     * Generate data for request
     *
     * @return array
     */
    protected function getData()
    {
        return array(
            'sender' => $this->sender,
            'receiver' => $this->receiver,
            'text' => $this->text,
        );
    }
}
