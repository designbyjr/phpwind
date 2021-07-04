<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WindyAPIController extends Controller
{
    public function fetch()
    {
        $logs = [];
        for ($i = 1; $i <= 100; $i++)
        {
            if ($i % 15 === 0) {
                $logs[$i] = $i." ⚒️ Coating Damage ⚒️ and ⚡ Lightning Strike ⚡";
            }
            else if($i % 3 == 0){
                $logs[$i] =  $i." ⚒️ Coating Damage ⚒️";
            }
            else if($i % 5 == 0){
                $logs[$i] =  $i." ⚡ Lightning Strike ⚡";
            }
            else {
                $logs[$i] =  $i." Windy McFace Logger says No Logs for this ID";
            }
        }
        return Response()->json(compact('logs'));
    }
}
