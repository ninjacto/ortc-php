<?php

namespace ninjacto\OrtcPhp\Handlers;

use GuzzleHttp\BatchResults;
use ninjacto\OrtcPhp\Models\Responses\SendMessageResponse;

class SendMessageResponseHandler extends OrtcResponseHandler
{
    /**
     * handle response from guzzle.
     *
     * @param BatchResults $results
     *
     * @return SendMessageResponse
     */
    public function handle($results)
    {
        $sendMessageResponse = new SendMessageResponse();
        $sendMessageResponse->setResults($results);

        return $sendMessageResponse;
    }
}
