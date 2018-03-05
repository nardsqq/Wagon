<?php
namespace App\Classes;

class Counter {
    
    private static function encode($prefix = '', $counter = 1, $suffix = '', $padding = 4){
        $pad = '';
        for($i=strlen($counter); $i < $padding; $i++){
            $pad .= '0';
        }
        $output = $prefix.'-'.$pad.$counter.'-'.$suffix;

        return $output;
    }

    private static function decode($current, $prefix = '', $suffix = ''){
        return substr($current, strlen($prefix)+1, (strrpos($current, $suffix)-1) - (strlen($prefix)+1));
    }

    public static function generate($current = null, $prefix = '', $suffix = '', $padding = 4){
        $output = '';
        
        if($current != null){
            $counter = 1 + static::decode($current, $prefix, $suffix);
            $output = static::encode($prefix, $counter, $suffix, $padding);
        }
        else {
            $output = static::encode($prefix, 1, $suffix, $padding);
        }
        return $output;
    }
}