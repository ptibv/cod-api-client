<?php

namespace ptibv\codapiclient;

/**
 * Send an text to speech message with the PTI COD API
 *
 * @author Paul van Craenenbroeck <paulc@pti.nl>
 * @version 2019.01.25
 * @package ptibv\codapiclient
 */
class SendTextToSpeech extends SendSms
{
    /**
     * Send a text to speech message
     *
     * @return mixed
     */
    public function send()
    {
        return $this->callCodApi('/texttospeech/send', $this->getData());
    }
}
