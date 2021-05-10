<?php


namespace App\Helpers;


class ArrayUtil
{
    public static function returnKeyFromArray($array, $keyName)
    {
        $newArray = [];
        if ($array != null) {
            foreach ($array as $value) {
                $newArray[] = $value->$keyName;
            }
        }
        return $newArray;
    }

    public static function formatDDL($value,$name,$data, $isArray = false){
        $array = [];
        if($isArray){
            foreach ($data as $element) {
                $array[$element[$value]] = $element[$name];
            }
        }else{
            foreach ($data as $element) {
                $array[$element->$value] = $element->$name;
            }
        }

        return $array;
    }

    public static function dataInKey($keyName,$data){
        $returnArr = array();
        foreach ($data as $element){
            $elementKeyName = $element->$keyName;
            unset($element->$keyName);
            $returnArr[$elementKeyName] = $element;
        }
        return $returnArr;
    }
}
