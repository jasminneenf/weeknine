<?php

function csvToJson($csvUrl) {
    $csvData = []:

    if (($handle = fopen($csvUrl, 'r'))!== false ){
        while(($row = fgetcsv($handle)) !== false){
            $csvData[] = $row;
        }
        fclose($handle);
    }

    $headers = array_shift($csvData);

    $jsonArray =[];
    foreach ($csvData as $row) {
        $jsonArrayItem = array();
        for ($i = 0; $i < count($row); $i++){
            $jsonArrayItem[$headers[$i]] = $row[$i];
        }
        $jsonArray[] = $jsonArrayItem;
    }
    return json_encode($jsonArray);
}

$csvUrl = 'https://raw.githubusercontent.com/jasminneenf/weeknine/main/datapribadi.csv';
$jsonData = csvToJson($csvUrl);

header('Content-Type: application/json');

echo $jsonData
?>
