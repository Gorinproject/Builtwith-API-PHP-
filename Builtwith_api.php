<?php

$url='API KEY';
$json = file_get_contents($url);
echo '<pre>';

$jsonarray=array(json_decode($json, true));
print_r($jsonarray);

echo '-------------------------------------------------------';

// Поиск по многомерному массиву
function search($array, $key, $value)
{
    $results = array();
    if (is_array($array))
    {
        if (isset($array[$key]) && $array[$key] == $value)
            $results[] = $array;
        foreach ($array as $subarray)
            $results = array_merge($results, search($subarray, $key, $value));
    }
    return $results;
}

// Выводим данные массива
print_r(search($jsonarray, 'name', 'wordpress-theme'));

?>