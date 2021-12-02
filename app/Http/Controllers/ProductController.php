<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product ;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function addProduct(Request $req){

        $product = new Product ; 
        $product ->name = $req ->input('name') ;
        $product ->price =  $req ->input('price') ;
        $product ->description = $req->input('description');
        $product ->file_path = $req->input('file_path') ; 

        $product->save() ;
        return $product ;

    }

    function list(){

        return Product::all() ; 
    }

    function delete($id){
        $result = Product::where('id',$id)->delete();
        if($result){   return 'fait' ;}
        return " Ce produits n'est pad disponible " ;

    }

    function getProduct($id){
        $product = Product::find($id);
        if($product){   return $product ;}
        return " Ce produits n'est pad disponible " ;

    }

    function search($name){
        $product = Product::where('name','Like',"%$name%")->get();
        if($product){   return $product ;}
        return " Ce produits n'est pad disponible " ;

    }
}
