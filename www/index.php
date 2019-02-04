<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>STREAM TV SERVER</title>
<meta property="og:title" content="Stream TV Server" />
<meta property="og:description" content="Stream TV Server  by UC_Tellem [Cr@sh_C0m£T]" />
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<link rel="stylesheet" href="stream-tv-server.css">
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
<div data-role="page" data-theme="b" id="demo-page" class="my-page" data-url="demo-page">
  <div data-role="header">
    <h1>STREAM TV SERVER</h1>
        </div>

  <div role="main" class="ui-content">
    <ul data-role="listview" data-inset="true">
      <?php

function buildSecureLink($baseUrl, $path, $secret, $ttl, $userIp)
{
    $expires = time() + $ttl;
    $md5 = md5("$expires$path$userIp $secret", true);
    $md5 = base64_encode($md5);
    $md5 = strtr($md5, '+/', '-_');
    $md5 = str_replace('=', '', $md5);
    return $baseUrl . $path . '?md5=' . $md5 . '&expires=' . $expires;
}

$secret = 'Crash21';  //This is the secret configured at nginx.conf
$baseUrl = 'http://strmtvserver.tech'; //this is your website that the content will be played from (replace replaceip with your domain name)
$path = '/test/stream.m3u8'; //this is the stream url (replace replaceip with your domain name)
$ttl = 120;
$userIp = $_SERVER['REMOTE_ADDR'];
$secure_test_stream = buildSecureLink($baseUrl, $path, $secret, $ttl, $userIp);

$url    = "stream.xml";
$result = file_get_contents($url);
$xml = new SimpleXMLElement($result);
foreach($xml->channel->item as $item) {
foreach($item as $item2) {
	$title = $item2->attributes()->title;
	$imgurl = $item2->attributes()->hdposterurl;
	$hlsurl = $item2->attributes()->url;
echo "<li><a href='player/play.html?play=".$hlsurl."' target='_blank'><img src='".$imgurl."' class='ui-li-thumb'><h2>".$title."</h2><p>".$title."</p><p class='ui-li-aside'>Direct</p></a></li>";
}
}
echo "<li><a href='player/play.html?play=".$secure_test_stream."' target='_blank'><img src='testing.png' class='ui-li-thumb'><h2>Secure Test Stream</h2><p>Secure Test Stream</p><p class='ui-li-aside'>Direct</p></a></li>";

?>

    </ul>
        </div>
</div>
</body>
</html>