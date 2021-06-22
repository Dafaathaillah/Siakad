<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DB;
class JurusanController extends Controller
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
       $data = DB::table('jurusan as js')
                ->join('prodi as pd','pd.id','=','js.id_prodi')
                ->select('js.*','pd.nama_prodi','pd.id as id_prodi')
                ->get();
       $prodi = DB::table('prodi')->get();
       return view('admin.jurusan.master_jurusan',compact('data','prodi'));
    }

    public function edit($id)
    {
       $dt = DB::table('jurusan')->where('id',$id)->first();
       $prodi = DB::table('prodi')->get();
       return view('admin.jurusan.master_jurusan_edit',compact('dt','prodi'));
    }

    public function create(Request $request)
    {
        DB::table('jurusan')->insert(
            [
                'nama_jurusan'=>$request->nama_jurusan,
                'tingkat'=>$request->tingkat,
                'id_prodi'=>$request->id_prodi,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]
        );

        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        DB::table('jurusan')->where('id',$id)->update(
            [
                'nama_jurusan'=>$request->nama_jurusan,
                'tingkat'=>$request->tingkat,
                'id_prodi'=>$request->id_prodi,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]
        );

        return redirect('jurusan');
    }

    public function delete($id)
    {
        DB::table('jurusan')->where('id',$id)->delete();
        return redirect()->back();
    }
}
