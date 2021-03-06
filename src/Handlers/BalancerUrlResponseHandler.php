<?php

namespace ninjacto\OrtcPhp\Handlers;

use GuzzleHttp\Message\FutureResponse;
use ninjacto\OrtcPhp\Exceptions\InvalidBalancerUrlException;
use ninjacto\OrtcPhp\Models\Responses\BalancerUrlResponse;

class BalancerUrlResponseHandler extends OrtcResponseHandler
{
    /**
     * handle response from guzzle.
     *
     * @param FutureResponse $response
     *
     * @return BalancerUrlResponse
     */
    public function handle($response)
    {
        $body = trim((string) $response);

        $url = $this->parseUrl($body);
        $this->validate($url);

        $balancedUrlResponse = new BalancerUrlResponse();
        $balancedUrlResponse->setUrl($url);

        return $balancedUrlResponse;
    }

    /**
     * validating response.
     *
     * @param string $url
     *
     * @throws InvalidBalancerUrlException
     */
    public function validate($url)
    {
        if (preg_match('/https?:\/\/undefined(:undefined)?/', $url)) {
            $invalidBalancerUrlException = new InvalidBalancerUrlException();
            $invalidBalancerUrlException->setUrl($url);

            throw $invalidBalancerUrlException;
        }

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $invalidBalancerUrlException = new InvalidBalancerUrlException();
            $invalidBalancerUrlException->setUrl($url);

            throw $invalidBalancerUrlException;
        }
    }

    /**
     * parse body to find url.
     *
     * @param string $body
     *
     * @throws InvalidBalancerUrlException
     *
     * @return string
     */
    public function parseUrl($body)
    {
        if (!preg_match('/https?:\/\/[^\"]+/', $body, $matches)) {
            $invalidBalancerUrlException = new InvalidBalancerUrlException();
            $invalidBalancerUrlException->setUrl($body);

            throw $invalidBalancerUrlException;
        }

        return trim($matches[0]);
    }
}
