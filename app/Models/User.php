<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cekMk($idmk,$idmhs)
    {
        $data = DB::table('mahasiswa_matakuliah')
        ->where('id_matakuliah',$idmk)
        ->where('id_mahasiswa',$idmhs)
        ->first();
        if($data)
        {
            return 'ada';
        }else
        {
            return 'tidak';
        }
    }

    public function pdfMk($idmk)
    {
        $mk = DB::table('mata_kuliah')->where('id',$idmk)->first();
        return $mk;
    }
}
