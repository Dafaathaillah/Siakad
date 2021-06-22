<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DB;
use PDF;
class MataKuliahController extends Controller
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
       $data = DB::table('mata_kuliah as mk')
              ->join('dosen as ds','ds.id','=','mk.id_dosen')
              ->select('mk.*','ds.nama_dosen')
              ->get();
       $dosen = DB::table('dosen')->get();
       return view('admin.matakuliah.master_mata_kuliah',compact('data','dosen'));
    }

    public function edit($id)
    {
       $dt = DB::table('mata_kuliah')->where('id',$id)->first();
       $dosen = DB::table('dosen')->get();
       return view('admin.matakuliah.master_mata_kuliah_edit',compact('dt','dosen'));
    }

    public function indexMhs()
    {
       $data = DB::table('mata_kuliah as mk')
              ->select('mk.id as id_matakuliah','mk.nama_mata_kuliah')
              ->get();
      $mhs = DB::table('mahasiswa')->where('id_user',Auth::user()->id)->first();
      //return $data;
       return view('admin.matakuliah.master_mata_kuliah_mahasiswa',compact('data','mhs'));
    }

    public function updateMatakuliahPilih(Request $request)
    {
        DB::table('mahasiswa_matakuliah')->where('id_mahasiswa',$request->id_mahasiswa)->delete();
        $id_matakuliah = $request->id_mata_kuliah;
        foreach ($id_matakuliah as $idm)
        {
           DB::table('mahasiswa_matakuliah')->insert(
            [
              'id_matakuliah'=>$idm,
              'id_mahasiswa'=>$request->id_mahasiswa
            ]
          );
        }
        return redirect()->back()->with('success','Data matakuliah telah di update');
    }

    public function create(Request $request)
    {
        DB::table('mata_kuliah')->insert(
            [
                'nama_mata_kuliah'=>$request->nama_mata_kuliah,
                'sks'=>$request->sks,
                'id_dosen'=>$request->id_dosen,
                'semester'=>$request->semester,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]
        );

        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        DB::table('mata_kuliah')->where('id',$id)->update(
            [
                'nama_mata_kuliah'=>$request->nama_mata_kuliah,
                'sks'=>$request->sks,
                'id_dosen'=>$request->id_dosen,
                'semester'=>$request->semester,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]
        );

        return redirect('matakuliah');
    }

    public function delete($id)
    {
        DB::table('mata_kuliah')->where('id',$id)->delete();
        return redirect()->back();
    }

    public function cetakPfd($id)
    {
       $cekbeh1 = DB::table('transactions')
       ->where('id_mahasiswa',$id)
       ->where('status','Menunggu Verfikasi Admin')
       ->get();
       $cekbeh2 = DB::table('transactions')
       ->where('id_mahasiswa',$id)
       ->where('status','Menunggu Verfikasi Admin')
       ->get();
       if(!$cekbeh1->isEmpty() || !$cekbeh2->isEmpty())
       {
          return redirect()->back()->with('danger','Ada pembayaran yang belum terselesaikan jika sudah membayar dan mengupload bukti transfer dan masih tidak bisa cetak krs, silahkan hubungi admin untuk konfirmasi!');
       }else
       {
           $mhs = DB::table('mahasiswa')->where('id',$id)->first();
           $kelas = DB::table('kelas')->where('id',$mhs->id_kelas)->first();
           $dosen = DB::table('dosen')->where('id',$kelas->id_dosen)->first();
           $data = DB::table('mahasiswa_matakuliah')->where('id_mahasiswa',$id)->get();
           $pdf = PDF::loadview('admin.matakuliah.cetak_krs',compact('data','mhs','kelas','dosen'));
           return $pdf->download('KRS-'.$mhs->nim.'.pdf');
       }
       
    }
}
