<?php

namespace App\Http\Controllers;

use App\Model\ChoiceNumber;
use App\Models\Article;
use App\Models\Enterprise;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /*
 * 所有文章详情
 */
    public function Corporate(Request $request,$title='公司文化'){
        $res = $request->header('language');
        $detail=Article::where('title',$title)->first();
        if($res == 'ch'){
            $data['container']=$detail['container_zh'];
            return response()->json([
                'code' => 0,
                'msg'  => '中文',
                'data' => $data,
            ]);
        }else if($res == 'en'){
            $data['container']=$detail['container_en'];
            return response()->json([
                'code' => 0,
                'msg'  => '中文',
                'data' => $data,
            ]);
        }else{
            return response()->json([
                'code' => 400,
                'msg'  => '语言调取失败',
            ]);
        }

    }

}
