<?php

namespace ptibv\codapiclient;

/**
 * Get Feedback from the PTI COD API for a specific communication type (email/sms/voice)
 *
 * @author Paul van Craenenbroeck <paulc@pti.nl>
 * @version 2018.06.04
 * @package ptibv\codapiclient
 */
class GetFeedback extends CodApiClient
{
    /**
     * Type of communication (email/sms/voice)
     *
     * @var string
     */
    public $communicationType = 'email';

    /**
     * Name of the call to make to the api
     *
     * @var string
     */
    public $date;

    /**
     * Name of the call to make to the api
     * default = 0
     *
     * @var int
     */
    public $start = 0;

    /**
     * Number of results to receive in 1 call
     * default = 0
     * max = 1000
     *
     * @var int
     */
    public $limit = 1000;

    /**
     * Returns all feedback for the given type and date. Note that this function is iteratable (e.g. with foreach)
     *
     * @return mixed
     */
    public function getFeedback()
    {
        $requestData = array(
            'date' => $this->date,
            'start' => $this->start,
            'limit' => $this->limit,
        );

        return $this->callCodApi('/' . $this->communicationType . '/get-feedback', $requestData);
    }
}
