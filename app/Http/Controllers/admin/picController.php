<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use DB;

class picController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //列表页
        $data = DB::table('pic')->orderby('id','asc')->paginate(3);
        // dd($data);
        return view('admin.pic.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加页
        return view('admin.pic.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行添加
        // dd($_FILES);
        //确定上传的文件是否存在
        if($request->hasFile("pic")){
            //更改上传文件名
            $name = rand(1,10000)+time();
            //获取扩展名
            $ext = $request->file("pic")->getClientOriginalExtension();
            // dd($ext);
            //移动到指定目录
            $request->file('pic')->move(Config::get('app.app_upload'),$name.'.'.$ext);
            //存储到数据库
            $pic['pname'] = $name.'.'.$ext;
            $pic['url'] = Config::get('app.app_upload').'/'.$name.'.'.$ext;
            $pic['time'] = time();
            // dd($pic);
            if(DB::table('pic')->insert($pic)){
                return redirect('/pic')->with('success','上传成功');
            }else{
                return redirect('/pic')->with('error','上传失败');
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        echo '修改';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        echo '执行修改';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
