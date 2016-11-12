<?php

use ninjacto\OrtcPhp\Configs\OrtcConfig;
use ninjacto\OrtcPhp\Models\Channel;
use ninjacto\OrtcPhp\Models\Requests\AuthRequest;
use ninjacto\OrtcPhp\Ortc;

require_once '../vendor/autoload.php';

$ortcConfig = new OrtcConfig();

$ortcConfig->setApplicationKey('YOUR_APPLICATION_KEY')->setPrivateKey('YOUR_PRIVATE_KEY');

$url = 'http://ortc-developers.realtime.co/server/2.1'; // ORTC server URL

$authToken = 'YOUR_AUTHENTICATION_TOKEN';

$channels    = [];
$testChannel = new Channel();
$testChannel->setName('CHANNEL_NAME')->setPermission(Channel::PERMISSION_READ);

$channels[] = $testChannel;

$ortc = new Ortc($ortcConfig);

$authRequest = new AuthRequest();
$authRequest->setAuthToken($authToken)->setExpireTime(61)->setPrivate(true)->setChannels($channels);

$authResponse = $ortc->authenticate($authRequest);

?>
<!doctype html>
<html>
<head>
    <title></title>
</head>
<body>
<input type="text" id="message"/>
<input type="button" onclick="sendMessage('<?php echo $testChannel->getName(); ?>');" value="Send to myChannel"/>

<div id="log"></div>

<script src="http://code.xrtml.org/xrtml-3.0.0.js"></script>
<script>
    var appkey  = '<?php echo $ortcConfig->getApplicationKey(); ?>',
        url     = '<?php echo $url; ?>',
        token   = '<?php echo $authToken; ?>';

    xRTML.ready(function () {

        xRTML.Config.debug = true;

        xRTML.ConnectionManager.create(
            {
                id: 'myConn',
                appkey: appkey,
                authToken: token,
                url: url,
                channels: [
                    {name: '<?php echo $testChannel->getName(); ?>'}
                ]
            }).bind(
            {
                message: function (e) {
                    var log = document.getElementById('log');
                    log.innerHTML = log.innerHTML + 'Message received: ' + e.message + '<br />';
                }
            });
    });

    function sendMessage(channel) {
        var msg = document.getElementById('message').value;

        xRTML.ConnectionManager.sendMessage({
            connections: ['myConn'],
            channel: channel,
            content: msg
        });
    }
</script>

</body>
</html>