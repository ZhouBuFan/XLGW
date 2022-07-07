<?php

namespace App\Http\Controllers;

use App\Model\ChoiceNumber;
use App\Models\Recruit;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RecruitController extends Controller
{
    /*
 * 招聘信息列表
 */
    public function RecruitList(Request $request){
        $detail=Recruit::all();
        foreach ($detail as $key => $value) {
            $detail[$key]=$value;
            $detail[$key]['tag']=explode(',',$value['tag']);
        }
            return response()->json([
                'code' => 0,
                'data' => $detail,
            ]);
    }
    /*
 * 招聘信息详情
 */
    public function Recruit(Request $request){
        $id=$request->get('id');
        $detail=Recruit::where('id',$id)->first();
        $detail['tag']=explode(',',$detail['tag']);
            return response()->json([
                'code' => 0,
                'data' => $detail,
            ]);
    }

}
