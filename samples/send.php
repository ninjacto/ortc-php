<?php

use ninjacto\OrtcPhp\Configs\OrtcConfig;
use ninjacto\OrtcPhp\Models\Channel;
use ninjacto\OrtcPhp\Models\Requests\AuthRequest;
use ninjacto\OrtcPhp\Models\Requests\SendMessageRequest;
use ninjacto\OrtcPhp\Ortc;

require_once '../vendor/autoload.php';

$ortcConfig = new OrtcConfig();

$ortcConfig->setApplicationKey('YOUR_APPLICATION_KEY')->setPrivateKey('YOUR_PRIVATE_KEY')->setVerifySsl(false);

$authToken = 'YOUR_AUTHENTICATION_TOKEN';

$channels = [];
$testChannel = new Channel();
$testChannel->setName('CHANNEL_NAME')->setPermission(Channel::PERMISSION_WRITE);

$channels[] = $testChannel;

$ortc = new Ortc($ortcConfig);

if (isset($_POST['message'])) {
    $sendMessageRequest = new SendMessageRequest();
    $sendMessageRequest->setAuthToken($authToken)->setChannelName($testChannel->getName())->setMessage($_POST['message']);

    $ortc->sendMessage($sendMessageRequest);
} else {
    $authRequest = new AuthRequest();
    $authRequest->setAuthToken($authToken)->setExpireTime(5 * 60)->setPrivate(true)->setChannels($channels);

    $authResponse = $ortc->authenticate($authRequest);
}

?>
<!doctype html>
<html>
<head>
    <title>Send Message</title>
</head>
<body>
<form action="send.php" method="post">
    <label for="message">Message: </label><br/>
    <textarea id="message" name="message"></textarea>
    <br/>
    <input type="submit" value="Send to channel"/>
</form>

</body>
</html>