<?php 
$arr = [
    "name" => "soriful islam",
    "fname" => "rafiqul",
    "age" => 34
];
 $arr2 = [
    "name" => "ROFIKUL islam",
    "fname" => "rafi",
    "age" => 3
];
    $keys = join(",",array_keys($arr));
    foreach($arr as $key => $value){
        unset($arr[$key]);
        $arr[":".$key] = $value;

}

echo "<pre>";
print_r($arr);
echo "</pre>";

$update_strings = array();
foreach($arr2 as $key => $value){
    $update_strings[] = $key." = :".$key;
    $arr[":".$key] = $value;
}

echo "<pre>";
print_r($update_strings);
echo "</pre>";












?>
