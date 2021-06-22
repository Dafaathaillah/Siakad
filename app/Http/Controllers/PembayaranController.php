<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DB;
class PembayaranController extends Controller
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
       $data = DB::table('transactions as ts')
               ->join('mahasiswa as mhs','mhs.id','=','ts.id_mahasiswa')
               ->join('kelas as ks','ks.id','=','mhs.id_kelas')
               ->join('jurusan as js','js.id','=','ks.id_jurusan')
               ->select('js.nama_jurusan','js.tingkat','ts.*','js.id as id_jurusan')
               ->groupBy('js.id')
               ->get();
         $kelas = DB::table('kelas as ks')
               ->join('jurusan as js','js.id','=','ks.id_jurusan')
               ->join('prodi as pd','pd.id','=','js.id_prodi')
               ->select('ks.nama_kelas','js.nama_jurusan','js.id as id_jurusan','pd.nama_prodi','js.tingkat')
               ->get();
        return view('admin.pembayaran.master_pembayaran',compact('data','kelas'));
    }

    public function filterJurusan($jurusan)
    {
      
           $data = DB::table('mahasiswa as mhs')
               ->join('kelas as ks','ks.id','=','mhs.id_kelas')
               ->join('jurusan as js','js.id','=','ks.id_jurusan')
               ->join('prodi as pd','pd.id','=','js.id_prodi')
               ->join('transactions as ts','ts.id_mahasiswa','=','mhs.id')
               ->select('mhs.*','ks.nama_kelas'
                ,'js.nama_jurusan',
                'pd.nama_prodi'
                ,'js.tingkat','ts.status'
                ,'ts.bukti_bayar','ts.id as id_trs')
               ->where('js.id',$jurusan)
               ->get();
      
         return view('admin.pembayaran.master_pembayaran_filter',compact('data'));
       //return $data;
    }



     public function indexPemabayaranMhs()
    {
               $data = DB::table('mahasiswa as mhs')
               ->join('kelas as ks','ks.id','=','mhs.id_kelas')
               ->join('jurusan as js','js.id','=','ks.id_jurusan')
               ->join('prodi as pd','pd.id','=','js.id_prodi')
               ->join('transactions as ts','ts.id_mahasiswa','=','mhs.id')
               ->select('mhs.*','ks.nama_kelas'
                ,'js.nama_jurusan',
                'pd.nama_prodi'
                ,'js.tingkat','ts.status'
                ,'ts.bukti_bayar'
                ,'ts.nominal','ts.id as id_trs')
                ->where('mhs.id_user',Auth::user()->id)
               ->get();
        return view('admin.pembayaran.pembayaran_mhs',compact('data'));
    }

     public function indexPemabayaranMhsRiwayat()
    {
               $data = DB::table('mahasiswa as mhs')
               ->join('kelas as ks','ks.id','=','mhs.id_kelas')
               ->join('jurusan as js','js.id','=','ks.id_jurusan')
               ->join('prodi as pd','pd.id','=','js.id_prodi')
               ->join('transactions as ts','ts.id_mahasiswa','=','mhs.id')
               ->select('mhs.*','ks.nama_kelas'
                ,'js.nama_jurusan',
                'pd.nama_prodi'
                ,'js.tingkat','ts.status'
                ,'ts.bukti_bayar'
                ,'ts.nominal','ts.id as id_trs')
                ->where('mhs.id_user',Auth::user()->id)
                ->whereNotNull('ts.bukti_bayar')
               ->get();
        return view('admin.pembayaran.pembayaran_mhs_riwayat',compact('data'));
    }

    public function generatePembayaran(Request $request)
    {
       $mhsj = DB::table('mahasiswa as mhs')
                   ->join('kelas as ks','ks.id','=','mhs.id_kelas')
                   ->join('jurusan as js','js.id','=','ks.id_jurusan')
                   ->where('js.id',$request->id_jurusan)
                   ->select('mhs.id as id_mahasiswa')
                   ->get();
       $arrIdmahasiswa = [];
       foreach ($mhsj as $mj)
       {
           array_push($arrIdmahasiswa, $mj->id_mahasiswa);
       }
       
       $data = DB::table('transactions as ts')
               ->whereIn('ts.id_mahasiswa',$arrIdmahasiswa)
               ->get();
        if(count($mhsj) == count($data))
        {
            return redirect()->back()->with('danger','Data tagihan sudah di generate sebelumnya!');
        }else
        {
            foreach ($mhsj as $m)
            {
                DB::table('transactions')->insert(
                    [
                        'id_mahasiswa'=>$m->id_mahasiswa,
                        'nominal'=>$request->nominal,
                        'status'=>'Belum Upload Bukti Bayar',
                        'tahun_angkatan'=>$request->tahun_angkatan,
                        'created_at'=>Carbon::now()->toDateTimeString(),
                    ]
                );
            }
            return redirect()->back()->with('success','Data tagihan telah di generate!');
        }
        
    }

    public function upBukti(Request $request,$id)
    {
        DB::table('transactions')->where('id',$id)->update(
            [
                'bukti_bayar'=>$this->uploadFile($request,'bukti_bayar'),
                'status'=>'Menunggu Verfikasi Admin',
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]
        );
        return redirect()->back()->with('success','Data bukti telah di upload');
    }

    public function sudahBayar($id)
    {
        DB::table('transactions')->where('id',$id)->update(
            [
                'status'=>'Terbayar',
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]
        );
        return redirect()->back()->with('success','Data tagihan telah di update menjadi sudah terbayar');
    }


}
