<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheloaiController extends Controller
{
    //
    public function getDanhsach(){
        $theloai = TheLoai::all();
        return view('admin.theloai.danhsach',['theloai'=>$theloai ]);
    }
    public function getSua(){
        
    }
    public function getThem(){
        return view('admin.theloai.them');
    }
    public function postThem(Request $request){
        $this->validate($request,[
            'Ten' => 'required|min:3|max:100'
        ],
        [
            'Ten.required' => 'Ban chua nhap ten the loai',
            'Ten.min' => 'Qua Ngan',
            'Ten.max' => 'Qua Dai',

        ]);
        $theloai= new TheLoai;
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','them thanh cong'); 
    }
}
