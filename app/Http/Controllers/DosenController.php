<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DB;
class DosenController extends Controller
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
     public function uploadFile(Request $request,$oke)
    {
            $result ='';
            $file = $request->file($oke);
            $name = $file->getClientOriginalName();
            // $tmp_name = $file['tmp_name'];

            $extension = explode('.',$name);
            $extension = strtolower(end($extension));

            $key = rand().'-'.$oke;
            $tmp_file_name = "{$key}.{$extension}";
            $tmp_file_path = "admin/images/cars/";
            $file->move($tmp_file_path,$tmp_file_name);
            // if(move_uploaded_file($tmp_name, $tmp_file_path)){
            $result = url('admin/images/cars').'/'.$tmp_file_name;
            // }
        return $result;
    }
    
    public function index()
    {
       $data = DB::table('dosen')->get();
       return view('admin.dosen.master_dosen',compact('data'));
    }

     public function edit($id)
    {
       $dt = DB::table('dosen')->where('id',$id)->first();
       return view('admin.dosen.master_dosen_edit',compact('dt'));
    }

    public function create(Request $request)
    {
        DB::table('dosen')->insert(
            [
                'nama_dosen'=>$request->nama_dosen,
                'nip'=>$request->nip,
                'foto_dosen'=>$this->uploadFile($request,'foto_dosen'),
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]
        );

        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        if($request->file('foto_dosen')!=null)
        {
            $foto_dosen = $this->uploadFile($request,'foto_dosen');
        }else
        {
            $foto_dosen = $request->old_foto;
        }
        DB::table('dosen')->where('id',$id)->update(
            [
                'nama_dosen'=>$request->nama_dosen,
                'nip'=>$request->nip,
                'foto_dosen'=>$foto_dosen,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]
        );

        return redirect('dosen');
    }

    public function delete($id)
    {
        DB::table('dosen')->where('id',$id)->delete();
        return redirect()->back();
    }
}
