<?php

namespace App\Http\Controllers;

use App\Model\ChoiceNumber;
use App\Models\Enterprise;
use App\Models\Link;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ListController extends Controller
{
    /*
 * 企业动态
 */
    public function enterPrise(Request $request){
        $res = $request->header('language');
        $page=$request->get('page');
        $limit = $request->get('limit');
        if($res == 'ch'){
            $detail=Enterprise::where('type',0)->get()->forPage($page,$limit)->toArray();
            $data=array();
            foreach ($detail as  $key=>$value) {
                    $data[$key]=array(
                     'id'=>$value['id'],
                     'title'=>$value['title_zh'],
                     'introduction'  =>$value['introduction_zh'],
                     'time'=>strtotime($value['updated_at']),
                    );
            }
            return response()->json([
                'code' => 0,
                'msg'  => '中文',
                'data' => $data,
            ]);
        }else if($res == 'en'){
            $detail=Enterprise::where('type',0)->get()->forPage($page,$limit)->toArray();
            $data=array();
            foreach ($detail as  $key=>$value) {
                $data[$key]=array(
                    'id'=>$value['id'],
                    'title'=>$value['title_en'],
                    'introduction'  =>$value['introduction_en'],
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
    /*
     * 行业资讯
     */
    public function Industry(Request $request){
        $res = $request->header('language');
        $page=$request->get('page');
        $limit = $request->get('limit');
        if($res == 'ch'){
            $detail=Enterprise::where('type',1)->get()->forPage($page,$limit)->toArray();
            $data=array();
            foreach ($detail as  $key=>$value) {
                    $data[$key]=array(
                     'id'=>$value['id'],
                     'title'=>$value['title_zh'],
                     'introduction'  =>$value['introduction_zh'],
                     'time'=>strtotime($value['updated_at']),
                    );
            }
            return response()->json([
                'code' => 0,
                'msg'  => '中文',
                'data' => $data,
            ]);
        }else if($res == 'en'){
            $detail=Enterprise::where('type',1)->get()->forPage($page,$limit)->toArray();
            $data=array();
            foreach ($detail as  $key=>$value) {
                $data[$key]=array(
                    'id'=>$value['id'],
                    'title'=>$value['title_en'],
                    'introduction'  =>$value['introduction_en'],
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
    /*
     * 媒体咨询
     */
    public function Media(Request $request){
        $res = $request->header('language');
        $page=$request->get('page');
        $limit = $request->get('limit');
        if($res == 'ch'){
            $detail=Enterprise::where('type',2)->get()->forPage($page,$limit)->toArray();
            $data=array();
            foreach ($detail as  $key=>$value) {
                $data[$key]=array(
                    'id'=>$value['id'],
                    'title'=>$value['title_zh'],
                    'introduction'  =>$value['introduction_zh'],
                    'time'=>strtotime($value['updated_at']),
                );
            }
            return response()->json([
                'code' => 0,
                'msg'  => '中文',
                'data' => $data,
            ]);
        }else if($res == 'en'){
            $detail=Enterprise::where('type',2)->get()->forPage($page,$limit)->toArray();
            $data=array();
            foreach ($detail as  $key=>$value) {
                $data[$key]=array(
                    'id'=>$value['id'],
                    'title'=>$value['title_en'],
                    'introduction'  =>$value['introduction_en'],
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
    public function Link(Request $request){
        $page=$request->get('page');
        $limit = $request->get('limit');
        $detail=Link::get()->forPage($page,$limit)->toArray();
        return response()->json([
            'code' => 0,
            'data'  => $detail,
        ]);

    }
}
