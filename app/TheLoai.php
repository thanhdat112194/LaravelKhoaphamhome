<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //
    protected $table ="TheLoai";
    public function loaitin(){
        return $this->hasMany('App\LoaiTin','idTheloai','id');
    }
    public function tintuc(){
        //App\loaitin lien ket trunggian
        //
        return $this->hasManyThrough('App\TicTuc','App\LoaiTin',
    'idTheLoai','idLoaiTin','id');
    }
}
