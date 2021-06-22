<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DB;
class HomeController extends Controller
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
        if(Auth::user()->role=='admin')
        {
            $jurusan = DB::table('jurusan')->count();
            $dosen = DB::table('dosen')->count();
            $mhs = DB::table('mahasiswa')->count();
            return view('home',compact('jurusan','dosen','mhs'));
        }else
        {
           $mhs = DB::table('mahasiswa')->where('id_user',Auth::user()->id)->first();
           $kelas = DB::table('kelas')->where('id',$mhs->id_kelas)->first();
           $dosen = DB::table('dosen')->where('id',$kelas->id_dosen)->first();
            $mks = DB::table('mahasiswa_matakuliah')->where('id_mahasiswa',$mhs->id)->count();
            return view('home_mahasiswa',compact('dosen','mks'));
        }
        
    }
}
