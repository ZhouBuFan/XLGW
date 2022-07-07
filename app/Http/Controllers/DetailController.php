<?php

namespace App\Http\Controllers;

use App\Model\ChoiceNumber;
use App\Models\Enterprise;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DetailController extends Controller
{
    /*
 * 所有文章详情
 */
    public function Details(Request $request){
        $res = $request->header('language');
        $detail=Enterprise::where('id',$request->get('id'))->get()->toArray();
        if($res == 'ch'){
            $data=array();
            foreach ($detail as  $key=>$value) {
                    $data[$key]=array(
                     'id'=>$value['id'],
                     'title'=>$value['title_zh'],
                     'content'  =>$value['content_zh'],
                     'time'=>strtotime($value['updated_at']),
                    );
            }
            return response()->json([
                'code' => 0,
                'msg'  => '中文',
                'data' => $data,
            ]);
        }else if($res == 'en'){
            $data=array();
            foreach ($detail as  $key=>$value) {
                $data[$key]=array(
                    'id'=>$value['id'],
                    'title'=>$value['title_en'],
                    'content'  =>$value['content_en'],
                    'time'=>strtotime($value['updated_at']),
                );
            }
            return response()->json([
                'code' => 0,
                'msg'  => '英文',
                'data' =>$data
            ]);
        }else{
            return response()->json([
                'code' => 400,
                'msg'  => '语言调取失败',
            ]);
        }

    }

}
