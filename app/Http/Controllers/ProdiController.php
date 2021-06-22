<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
class ProdiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $data = DB::table('prodi')->get();
       return view('admin.prodi.master_prodi',compact('data'));
    }

    public function edit($id)
    {
       $dt = DB::table('prodi')->where('id',$id)->first();
       return view('admin.prodi.master_prodi_edit',compact('dt'));
    }

    public function create(Request $request)
    {
        DB::table('prodi')->insert(
            [
                'nama_prodi'=>$request->nama_prodi,
                'program'=>$request->program,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]
        );

        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        DB::table('prodi')->where('id',$id)->update(
            [
                'nama_prodi'=>$request->nama_prodi,
                'program'=>$request->program,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]
        );

        return redirect('prodi');
    }

    public function delete($id)
    {
        DB::table('prodi')->where('id',$id)->delete();
        return redirect()->back();
    }
}
