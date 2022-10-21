<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getdata(){
        $result = [];
        $result['status'] = false ;
        $result['message'] = "something error";
        
        $data = News::get();
        $result['data'] = $data ;
        
        $result['status'] = true ;
        $result['message'] = "suksess";
        
        return response()->json($result);
    }

    public function adddata(Request $r){
        $result = [];
        $result['status'] = false ;
        $result['message'] = "something error";

        $news = new News;
        $images = null;
        if($r->hasFile('images')){
            $file = $r->file('images');
            $name = date('YmdHis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/resep_images',$name);
            $images = $name; 
        }else{
            $images = $r->images;
        }
    
        $news->images =$images;
        $news->content = $r->content;
        $news->title = $r->title;
        $news->save();


        $result['data'] = $news ;
        $result['status'] = true ;
        $result['message'] = "suksess add data";
            
        return response()->json($result);
    }

    public function deletenews(Request $r){
        $result = [];
        $result['status'] = false ;
        $result['message'] = "something error";


        $news = News::find($r->id);
        $news->delete();

        // $result['data'] = $news ;
        $result['status'] = true ;
        $result['message'] = "suksess delete data";
            
        return response()->json($result);
    }


    public function updatenews(Request $r){
        $result = [];
        $result['status'] = false ;
        $result['message'] = "something error";

        $news = News::findOrFail($r->id);
        $images = null;
        if($r->hasFile('images')){
            $file = $r->file('images');
            $name = date('YmdHis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/resep_images',$name);
            $images = $name; 
        }else{
            $images = $r->images;
        }
    
        $news->images =$images;
        $news->content = $r->content;
        $news->title = $r->title;
        $news->save();


        $result['data'] = $news ;
        $result['status'] = true ;
        $result['message'] = "suksess add data";
            
        return response()->json($result);
    }
    // public function addKeranjang(r $r){
    //     $result = [];
    //     $result['status'] = false ;
    //     $result['message'] = "something error";
        
        
    //     $dataKeranjang = Keranjang::where('pid',$r->pid)->where('id_user',$r->id_user)->first();
        
    //     if($dataKeranjang){
            
    //         $dataKeranjang->qty = $r->qty + $dataKeranjang->qty ;
    //         $dataKeranjang->save();
            
    //          $result['data'] = $dataKeranjang;
        
    //     $result['status'] = true ;
    //     $result['message'] = "suksess";
        
    //     return response()->json($result);
            
    //     }
        
    //     $keranjang = new Keranjang ;
    //     $keranjang->pid = $r->pid ;
    //     $keranjang->id_user = $r->id_user ;
    //     $keranjang->harga = $r->harga ;
    //     $keranjang->qty = $r->qty ;
        
    //     $keranjang->save();

        
    //     $result['data'] = $keranjang ;
        
    //     $result['status'] = true ;
    //     $result['message'] = "suksess";
        
    //     return response()->json($result);
    // }
}
