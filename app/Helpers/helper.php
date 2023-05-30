<?php
namespace App\Helpers;
use Carbon\Carbon;

class Helper
{

    public static function IDGenerator($model, $trow, $length, $prefix, $campus){
        $data = $model::where('campus', $campus)->whereYear('created_at', date('Y'))->orderBy('id','desc')->first();
        if(!$data){
            $og_length = $length - 1;
            $last_number = 1;
        }else{
            $code = substr($data->$trow, strlen($prefix)+1);
            $actial_last_number = ($code/1)*1;
            $increment_last_number = ((int)$actial_last_number)+1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = "";
        for($i=0;$i<$og_length;$i++){
            $zeros.="0";
        }
        return $prefix.$zeros.$last_number;
    }
  
}
?>