<?php
function value($array)
{
    $data = [];
    foreach ($array as $key => $value) {
        $data[] = array_values($value);
    }
    return $data;
}

function reverse($array)
{
    $data = [];
    for ($i = count($array)-1; $i > 0; $i--) {
        $data[] = $array[$i];
    }
    return $data;
}

function rotate($array)
{
    $data = array();
    foreach($array as $values){
        foreach($values as $key => $value) {
            $data[$key][] = $value;
        }
    }
    return $data;
}
