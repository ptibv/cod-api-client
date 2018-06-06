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
     * Send en sms
     *
     * @return mixed
     */
    public function send()
    {
        $requestData = array(
            'sender' => $this->sender,
            'receiver' => $this->receiver,
            'text' => $this->text,
        );

        return $this->callCodApi('/sms/send', $requestData);
    }
}
