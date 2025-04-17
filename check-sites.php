
<?php
header('Content-Type: application/json');

$url = "https://docs.google.com/spreadsheets/d/e/2PACX-1vQyy_aq1cPPNQjyylytqavGeqPpYFRaMCLcM0bc1XgXMZsQw6LbueuRQt97E1EDM7apS0FttCgzYzHgt/pub?output=csv";

$csv = @file_get_contents($url);
if ($csv === false) {
    echo json_encode(["error" => "Impossibile scaricare il file CSV."]);
    exit;
}

$rows = array_map("str_getcsv", explode("
", $csv));
$headers = array_map("trim", $rows[0]);
$data = [];
foreach (array_slice($rows, 1) as $row) {
    $rowData = array_combine($headers, $row);
    if (!empty($rowData['Nome dominio'])) {
        $domain = trim($rowData['Nome dominio']);
        $testUrl = "https://{$domain}/nf-check.html";
        $headers = @get_headers($testUrl);
        $status = ($headers && strpos($headers[0], '200') !== false) ? "ONLINE" : "OFFLINE";
        $data[] = ["domain" => $domain, "status" => $status];
    }
}

echo json_encode($data);
?>
