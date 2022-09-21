<?php

define("CSV_STANDARD", 0);
define("CSV_UNIQUE", 1);
define("CSV_GROUP1", 2);


/* Loads CSV with first line as headings. Taken from WorldLangDict */
/* Modified to group by city rathre than expect each city to be unique */
function loadCsv_old($file) 
{
    $Csv = fopen($file, 'r');
    if ($Csv === false) {
        die("Failed to open dictionary CSV");
    }
    //What does this do on failure? Empty file? No file found?
    $columnNames = fgetcsv($Csv);

    while (($row = fgetcsv($Csv)) !== false) {
        $newWord = null;
        foreach ($row as $key=>$datum) {
            $newWord[empty($columnNames[$key])?'Word':$columnNames[$key]] = $datum;
        }
        $index = strtolower(trim($row[0]));
        $dictionary[$index][] = $newWord;
    }
    return $dictionary;
}


/* Loads CSV with first line as headings. Taken from WorldLangDict */
/* Modified to group by city rathre than expect each city to be unique */
function loadCsv($file, $resultType = CSV_STANDARD) 
{
    $csv = fopen($file, 'r');
    if ($csv === false) {
        die("Failed to open dictionary CSV");
    }
    //What does this do on failure? Empty file? No file found?
    $columnNames = fgetcsv($csv);
    // var_dump($columnNames);
    $result = [];
    while (($row = fgetcsv($csv)) !== false) {
        $new = null;
        foreach ($row as $key=>$datum) {
            $new[$columnNames[$key]] = $datum;
        }
        $index = strtolower(trim($row[0]));

        switch ($resultType) {
            case CSV_GROUP1:
                $result[$index][] = $new;
                break;
            case CSV_UNIQUE:
                $result[$index] = $new;
                break;
            case CSV_STANDARD:
            default:
                $result[] = $new;
                break;
        }
    }
    return $result;
}
