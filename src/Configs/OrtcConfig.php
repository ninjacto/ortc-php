<?php

namespace ninjacto\OrtcPhp\Configs;

class OrtcConfig
{
    /**
     * Realtime.co india cluster url.
     *
     * @var string
     */
    protected $indiaClusterUrl = 'https://ortc-india.realtime.co/server/2.1';

    /**
     * Realtime.co default url.
     *
     * @var string
     */
    protected $clusterUrl = 'https://ortc-developers.realtime.co/server/2.1';

    /**
     * Realtime.co cluster server.
     *
     * @var string
     */
    protected $cluster = 'india';

    /**
     * Realtime.co balancer url.
     *
     * @var string
     */
    protected $balancerUrl = '?appkey={APP_KEY}';

    /**
     * Your realtime.co application key.
     *
     * @var string
     */
    protected $applicationKey;

    /**
     * Your realtime.co private key.
     *
     * @var string
     */
    protected $privateKey;

    /**
     * authentication path.
     *
     * @var string
     */
    protected $authenticationPath = '/authenticate';

    /**
     * send push message to channel(s) path.
     *
     * @var string
     */
    protected $sendPath = '/send';

    /**
     * maximum size of message chunk in bytes.
     *
     * @var int
     */
    protected $maxChunkSize = 700;

    /**
     * maximum size of message chunk in bytes.
     *
     * @var int
     */
    protected $batchPoolSize = 5;

    /**
     * pre concatenating string for every message chunks.
     *
     * @var string
     */
    protected $preMessageString = '{RANDOM}_{PART}-{TOTAL_PARTS}_';

    /**
     * verify ssl/tls certificate.
     *
     * @var bool
     */
    protected $verifySsl = true;

    /**
     * @return string
     */
    public function getApplicationKey()
    {
        return $this->applicationKey;
    }

    /**
     * @param string $applicationKey
     * @return $this
     */
    public function setApplicationKey($applicationKey)
    {
        $this->applicationKey = $applicationKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getBalancerUrl()
    {
        return $this->clusterUrl . $this->balancerUrl;
    }

    /**
     * @param string $balancerUrl
     * @return $this
     */
    public function setBalancerUrl($balancerUrl)
    {
        $this->balancerUrl = $balancerUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getClusterUrl()
    {
        return ($this->cluster == 'india') ? $this->indiaClusterUrl : $this->clusterUrl;
    }

    /**
     * @param string $clusterUrl
     * @return $this
     */
    public function setClusterUrl($clusterUrl)
    {
        $this->clusterUrl = $clusterUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getCluster()
    {
        return $this->cluster;
    }

    /**
     * @param string $cluster
     * @return $this
     */
    public function setCluster($cluster)
    {
        $this->cluster = $cluster;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * @param string $privateKey
     * @return $this
     */
    public function setPrivateKey($privateKey)
    {
        $this->privateKey = $privateKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthenticationPath()
    {
        return $this->authenticationPath;
    }

    /**
     * @param string $authenticationPath
     * @return $this
     */
    public function setAuthenticationPath($authenticationPath)
    {
        $this->authenticationPath = $authenticationPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getSendPath()
    {
        return $this->sendPath;
    }

    /**
     * @param string $sendPath
     * @return $this
     */
    public function setSendPath($sendPath)
    {
        $this->sendPath = $sendPath;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxChunkSize()
    {
        return $this->maxChunkSize;
    }

    /**
     * @param int $maxChunkSize
     * @return $this
     */
    public function setMaxChunkSize($maxChunkSize)
    {
        $this->maxChunkSize = $maxChunkSize;
        return $this;
    }

    /**
     * @return string
     */
    public function getPreMessageString()
    {
        return $this->preMessageString;
    }

    /**
     * @param string $preMessageString
     * @return $this
     */
    public function setPreMessageString($preMessageString)
    {
        $this->preMessageString = $preMessageString;
        return $this;
    }

    /**
     * @return bool
     */
    public function isVerifySsl()
    {
        return $this->verifySsl;
    }

    /**
     * @param bool $verifySsl
     * @return $this
     */
    public function setVerifySsl($verifySsl)
    {
        $this->verifySsl = (bool)$verifySsl;
        return $this;
    }

    /**
     * @return int
     */
    public function getBatchPoolSize()
    {
        return $this->batchPoolSize;
    }

    /**
     * @param int $batchPoolSize
     * @return $this
     */
    public function setBatchPoolSize($batchPoolSize)
    {
        $this->batchPoolSize = $batchPoolSize;

        return $this;
    }
}
