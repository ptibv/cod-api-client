<?php

namespace ptibv\codapiclient;

/**
 * Send an e-mail with the PTI COD API
 *
 * @author Paul van Craenenbroeck <paulc@pti.nl>
 * @version 2018.06.04
 * @package ptibv\codapiclient
 */
class SendEmail extends CodApiClient
{
    /**
     * E-mailaddress from sender
     *
     * @var string
     */
    public $emailFrom;

    /**
     * E-mailaddress receiver
     *
     * @var string
     */
    public $emailTo;

    /**
     * E-mail Subject
     *
     * @var string
     */
    public $subject;

    /**
     * Html formatted e-mail data
     *
     * @var string
     */
    public $htmlContent;

    /**
     * Text formatted e-mail data
     *
     * @var string
     */
    public $txtContent;

    /**
     * Extra headers you might want to add
     *
     * @var string
     */
    public $extraHeaders;

    /**
     * Add the unsubscribe header
     *
     * @var string
     */
    public $unsubscribe = true;

    /**
     * Specify a batch ID if you want to group a number of emails
     * Preferred: UUID
     *
     * @var string
     */
    public $batchId;

    /**
     * Track urls the receiver(s) click on
     * Set to true to enable this
     *
     * @var boolean
     */
    public $trackableUrls = false;

    /**
     * Track if your receiver has opened the e-mail
     * Set to true to enable this
     *
     * @var boolean
     */
    public $trackableOpens = false;

    /**
     * Send an email
     *
     * @return mixed
     */
    public function send()
    {
        return $this->callCodApi('/email/send', $this->getData());
    }

    /**
     * Generate data for request
     *
     * @return array
     */
    protected function getData()
    {
        return array(
            'emailFrom' => $this->emailFrom,
            'emailTo' => $this->emailTo,
            'subject' => $this->subject,
            'htmlContent' => $this->htmlContent,
            'txtContent' => $this->txtContent,
            'extraHeaders' => $this->extraHeaders,
            'unsubscribe' => $this->unsubscribe,
            'batchId' => $this->batchId,
            'trackableUrls' => $this->trackableUrls,
            'trackableOpens' => $this->trackableOpens,
        );
    }
}
