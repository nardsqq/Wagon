<?php
namespace App\Classes;

class ViewHelper {
    public static function center_underline($string, $length){
        // var_dump($string, $length); dd();
        
        $string = str_limit($string, $length);
        $space_diff = $length - strlen($string);
        $space_start_count = 0;
        $space_end_count = 0;
        
        if($space_diff > 0){
            if($space_diff%2 == 0){
                $space_start_count = $space_diff/2;
                $space_end_count = $space_diff/2;
            } else {
                $space_start_count = $space_diff/2;
                $space_end_count = ($space_diff/2) + 1;
            }
            
            // var_dump($space_diff, $space_start_count, $space_end_count); dd();
        }
        
        $space_start = str_repeat('_', $space_start_count);
        $space_end = str_repeat('_', $space_end_count);
        // var_dump($space_diff, $space_start, $space_end); dd();
        
        return 
            '<span style=\'text-decoration: underline; font-weight: bold;\'>'.$space_start.$string.$space_end.'</span>';
    }
}