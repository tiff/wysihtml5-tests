<?
require('xml2ary.inc.php');
require('postRequest.inc.php');

list($header, $xml) = postRequest('http://validator.tifftiff.de/w3c-validator/check', array(
  'output' => 'soap12',
  'fragment' => stripslashes($_REQUEST['fragment']),
));

// Fix
$start_pos = strpos($xml, '<?xml');
$length = strrpos($xml, '>') + 1 - $end_pos;
$xml = substr($xml, $start_pos, $length);

if ($_REQUEST['output'] == 'json') {
  header('Content-Type: application/json');
  echo json_encode(xml2ary($xml));
  exit;
}

header('Content-Type: text/xml');
print $xml;
?>