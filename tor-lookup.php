<?
$ip = $_SERVER['REMOTE_ADDR'];
$date = date('d');
$set_value = $date - 2;
$date = date('Y-m');
$date = "$date-$set_value";
//echo "$date";
$searchfor = "Result is positive";

$url = "https://metrics.torproject.org/exonerator.html?ip=$ip&timestamp=$date&lang=en";
$contents = file_get_contents($url);
$pattern = preg_quote($searchfor, '/');
$pattern = "/^.*$pattern.*\$/m";
if (preg_match_all($pattern, $contents, $matches)){
    echo "$ip - This IP is Listed in Tor Network Nodes";
}else{
    echo "$ip - This IP Not Seems to be in Tor Node Database";
}
// always remember that it is not always accurate
?>
