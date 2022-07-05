<?php


namespace App\Http\Controllers;

use App\Model\ChoiceNumber;
use App\Models\Star;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostStarController extends Controller
{
    function addPostStar(Request $request){
        $message = [
            'starreason.required'=>'申请原因不能为空！',
            'usermail.required'=>'邮箱不能为空！',
            'usermail.email'=>'邮箱不正确！',
            'starname.required'=>'星球名称不能为空！',
            'staricon.required'=>'星球图标还没有选择！',
            'starcategory.required'=>'请输入星球分类！',
            'starreason.min'=>'字数最小不能小于20'
        ];
        $request->validate([
            'usermail' => 'required|email',
            'starname' => 'required',
            'staricon' => 'required',
            'starcategory' => 'required',
            'starreason' => 'required|min:20',
        ],$message);

        try{
           $data= $request->post();
            $data['created_at']=date('Y-m-d H:i:s',time());
                Star::insert($data);

            return response()->json([
                'success' => 'postyes',
            ]);
        }catch(\Exception $exception) {

            return response()->json([
                'error' => $exception->getMessage(),
            ],200);
        }
    }
    public function image(Request $request){
        $avatar = $request->file('image')->store(date('Y-m-d'));
            $avatar1 = 'upload/'.$avatar;
        return response()->json([
            'code' => 0,
            'msg'  => '上传成功',
            'data' => array(
                'src'   => $avatar1,
                'url'   => $avatar
            ),
        ]);
    }

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
