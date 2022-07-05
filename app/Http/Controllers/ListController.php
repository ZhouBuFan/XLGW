<?php

namespace App\Http\Controllers;

use App\Model\ChoiceNumber;
use App\Models\Enterprise;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ListController extends Controller
{
    /*
 * 下列是官网
 */
    public function enterPrise(Request $request){
        $res = $request->header('language');
        if($res == 'ch'){
            return response()->json([
                'code' => 0,
                'msg'  => '中文',
            ]);
        }else if($res == 'en'){
            return response()->json([
                'code' => 0,
                'msg'  => '英文',
            ]);
        }else{
            return response()->json([
                'code' => 400,
                'msg'  => '语言调取失败',
            ]);
        }

    }
}
