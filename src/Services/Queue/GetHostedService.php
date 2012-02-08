<?php
require_once 'HTTP/Request2.php';
require_once 'XML/Unserializer.php';

//Sample parameters for the GetHostedService function. These are pointing to one of my own hosted services.
$subscriptionId = '9607e2d4-8d65-468c-9b79-2aff807d4b4b';
$serviceName = 'RuntimeTest1';
$apiVersion = '2011-10-01';


$reqUrl = "https://management.core.windows.net/$subscriptionId/services/hostedservices";

$request = new HTTP_Request2($reqUrl, HTTP_Request2::METHOD_GET,
							 array('use_brackets' => true,
								   'ssl_verify_peer' => false,
								   'ssl_verify_host' => false,
								   'ssl_local_cert' => 'C:/PHPCert1.pem'
								   ));
#$request->SetAdapter('curl');
$request->SetHeader(array(
						'x-ms-version' => $apiVersion,
						'Content-Type' => 'application/xml'
						));

echo "Via $reqUrl<br/><br/>";
$req = $request->send();
$xml = $req->getBody();

$unserializer = new XML_Unserializer();

$unserializer->unserialize($xml);

$hostedServices = $unserializer->getUnserializedData();

?>

The hosted services in your account are:

<ul>
<?php foreach ($hostedServices['HostedService'] as $hs) {
	echo "<li>$hs[ServiceName]</li>";
} ?>
</ul>