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
 * 公司文化
 */
    public function Corporate(Request $request,$title='公司文化'){
        $res = $request->header('language');
        $detail=Article::where('title',$title)->first();
        if($res == 'ch'){
          $container=$detail['container_zh'];
            return response()->json([
                'code' => 0,
                'msg'  => '中文',
                'container' => $container,
            ]);
        }else if($res == 'en'){
            $container=$detail['container_en'];
            return response()->json([
                'code' => 0,
                'msg'  => '英文',
                'container' => $container,
            ]);
        }else{
            return response()->json([
                'code' => 400,
                'msg'  => '语言调取失败',
            ]);
        }

    }
    /*
 * 党建和社会责任
 */
    public function Responsibility(Request $request,$title='党建和社会责任'){
        $res = $request->header('language');
        $detail=Article::where('title',$title)->first();
        if($res == 'ch'){
          $container=$detail['container_zh'];
            return response()->json([
                'code' => 0,
                'msg'  => '中文',
                'container' => $container,
            ]);
        }else if($res == 'en'){
            $container=$detail['container_en'];
            return response()->json([
                'code' => 0,
                'msg'  => '英文',
                'container' => $container,
            ]);
        }else{
            return response()->json([
                'code' => 400,
                'msg'  => '语言调取失败',
            ]);
        }

    }
    /*
 * 原版图书进口
 */
    public function Original(Request $request,$title='原版图书进口'){
        $res = $request->header('language');
        $detail=Article::where('title',$title)->first();
        if($res == 'ch'){
          $container=$detail['container_zh'];
            return response()->json([
                'code' => 0,
                'msg'  => '中文',
                'container' => $container,
            ]);
        }else if($res == 'en'){
            $container=$detail['container_en'];
            return response()->json([
                'code' => 0,
                'msg'  => '英文',
                'container' => $container,
            ]);
        }else{
            return response()->json([
                'code' => 400,
                'msg'  => '语言调取失败',
            ]);
        }

    }
    /*
 * 电子资源进口
 */
    public function Electronics(Request $request,$title='电子资源进口'){
        $res = $request->header('language');
        $detail=Article::where('title',$title)->first();
        if($res == 'ch'){
          $container=$detail['container_zh'];
            return response()->json([
                'code' => 0,
                'msg'  => '中文',
                'container' => $container,
            ]);
        }else if($res == 'en'){
            $container=$detail['container_en'];
            return response()->json([
                'code' => 0,
                'msg'  => '英文',
                'container' => $container,
            ]);
        }else{
            return response()->json([
                'code' => 400,
                'msg'  => '语言调取失败',
            ]);
        }

    }
    /*
 * 报刊进口
 */
    public function Journal(Request $request,$title='报刊进口'){
        $res = $request->header('language');
        $detail=Article::where('title',$title)->first();
        if($res == 'ch'){
          $container=$detail['container_zh'];
            return response()->json([
                'code' => 0,
                'msg'  => '中文',
                'container' => $container,
            ]);
        }else if($res == 'en'){
            $container=$detail['container_en'];
            return response()->json([
                'code' => 0,
                'msg'  => '英文',
                'container' => $container,
            ]);
        }else{
            return response()->json([
                'code' => 400,
                'msg'  => '语言调取失败',
            ]);
        }

    }
    /*
 * 出口业务
 */
    public function Export(Request $request,$title='出口业务'){
        $res = $request->header('language');
        $detail=Article::where('title',$title)->first();
        if($res == 'ch'){
          $container=$detail['container_zh'];
            return response()->json([
                'code' => 0,
                'msg'  => '中文',
                'container' => $container,
            ]);
        }else if($res == 'en'){
            $container=$detail['container_en'];
            return response()->json([
                'code' => 0,
                'msg'  => '英文',
                'container' => $container,
            ]);
        }else{
            return response()->json([
                'code' => 400,
                'msg'  => '语言调取失败',
            ]);
        }

    }
    /*
 * 书展服务
 */
    public function BookFair(Request $request,$title='书展服务'){
        $res = $request->header('language');
        $detail=Article::where('title',$title)->first();
        if($res == 'ch'){
          $container=$detail['container_zh'];
            return response()->json([
                'code' => 0,
                'msg'  => '中文',
                'container' => $container,
            ]);
        }else if($res == 'en'){
            $container=$detail['container_en'];
            return response()->json([
                'code' => 0,
                'msg'  => '英文',
                'container' => $container,
            ]);
        }else{
            return response()->json([
                'code' => 400,
                'msg'  => '语言调取失败',
            ]);
        }

    }
    /*
 * 数据加工
 */
    public function Data(Request $request,$title='数据加工'){
        $res = $request->header('language');
        $detail=Article::where('title',$title)->first();
        if($res == 'ch'){
          $container=$detail['container_zh'];
            return response()->json([
                'code' => 0,
                'msg'  => '中文',
                'container' => $container,
            ]);
        }else if($res == 'en'){
            $container=$detail['container_en'];
            return response()->json([
                'code' => 0,
                'msg'  => '英文',
                'container' => $container,
            ]);
        }else{
            return response()->json([
                'code' => 400,
                'msg'  => '语言调取失败',
            ]);
        }

    }
    /*
 * 专业研究
 */
    public function Professional(Request $request,$title='专业研究'){
        $res = $request->header('language');
        $detail=Article::where('title',$title)->first();
        if($res == 'ch'){
            $container=$detail['container_zh'];
            return response()->json([
                'code' => 0,
                'msg'  => '中文',
                'container' => $container,
            ]);
        }else if($res == 'en'){
            $container=$detail['container_en'];
            return response()->json([
                'code' => 0,
                'msg'  => '英文',
                'container' => $container,
            ]);
        }else{
            return response()->json([
                'code' => 400,
                'msg'  => '语言调取失败',
            ]);
        }

    }

}
