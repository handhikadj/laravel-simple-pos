<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/home');
    }

    public function home()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        $product->kd_barang =  $product->id;
        $product->save();
        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan'
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postest  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::select('id','nama_roti','harga')->where('id', $id)->get();
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postest  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $input = $request->all();
        $input = $request->except('kd_barang');
        $product->update($input);
        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil terupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postest  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil terhapus'
        ]);
    }

    public function apiProduct()
    {
        $product = Product::all();

        return Datatables::of($product)
            ->addColumn('action', function($product){
                return 
                       '<a href="javascript:void(0)" title="Edit data: '.$product->nama_roti.'" id="getdata" rel="'. $product->id .'"><i class="far fa-edit mr-2"></i></a> ' .
                       '<a href="javascript:void(0)" title="Hapus data: '.$product->nama_roti.'" id="deletedata" rel="'. $product->id .'"><i class="fas fa-times"></i></a>';
            })
            ->make(true);
    }

    public function cariproduk($kdproduk)
    {
         $product   = Product::select('kd_barang')->where('kd_barang', 'LIKE', "$kdproduk%")->get();
        return response()->json($product);
    }
    
}
