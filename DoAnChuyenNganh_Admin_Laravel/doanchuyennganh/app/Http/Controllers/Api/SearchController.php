<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\sanpham;
use App\cart;
use DB;
class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index($string)
    {
        $search = DB::table('product')->where('title', 'like', '%' .$string . '%')->get();
        //dd($search);
        return response()->json($search);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($string)
    {
        $cart =DB::table('cart as n')
        ->join('product as sp', 'n.id_sp', '=', 'sp.id')
        ->join('customer as cs', 'n.id_customer', '=', 'cs.id')
        ->where([
            ['note', '=', 1],
            ['cs.username', '=', $string],
         ])
        ->select('n.*','sp.title','sp.img1','sp.price','cs.name','cs.mkh')
        ->get();
        
        return response()->json($cart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
