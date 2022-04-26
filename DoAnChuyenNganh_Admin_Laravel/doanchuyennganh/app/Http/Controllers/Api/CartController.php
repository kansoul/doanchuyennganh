<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\cart;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_cus)
    {
        $cart = DB::table('cart')
        ->where([
            ['id_customer', '=', $id_cus],
            ['note', '=', 1],
         ])->get();

        if($cart->count() > 0) {
            

            $affected = DB::table('cart')
            ->where([
                ['id_customer', '=', $id_cus],

            ])
            ->update(['note' => 0]);
            return response()->json(['message' => 'The Cart was update'], 200);
        };
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($string)
    {
        $cart =DB::table('cart as n')
        ->join('product as sp', 'n.id_sp', '=', 'sp.id')
        ->join('customer as cs', 'n.id_customer', '=', 'cs.id')
        ->where([
            ['note', '=', 0],
            ['status', '=', 1],
            ['cs.username', '=', $string],
         ])
        ->select('n.*','sp.title','sp.img1','sp.price','cs.name','cs.mkh')
        ->get();
        
        return response()->json($cart);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_cus, $id_sp, $qlt, $note)
    {   
        $cart = DB::table('cart')
        ->where([
            ['id_customer', '=', $id_cus],
            ['id_sp', '=', $id_sp],
            ['note', '=', $note],
         ])->pluck('qlt')->toArray();

        if(count($cart) > 0) {
            

            $affected = DB::table('cart')
            ->where([
                ['id_customer', '=', $id_cus],
                ['id_sp', '=', $id_sp],
                ['note', '=', $note],
            ])
            ->update(['qlt' => $cart[0]+$qlt]);
            return response()->json(['message' => 'The Cart was update'], 200);
        };
        if(count($cart) === 0){
            cart::create([
                'id_customer' => $id_cus,
                'id_sp' => $id_sp,
                'qlt' => $qlt,
                
                'note' => $note,
                'status' => 1,
            ]);
            return response()->json(['message' => 'The Cart was add'], 200);
        }

        
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id_cus, $id_sp)
    {
        DB::table('cart')->where([
            ['id_customer', '=', $id_cus],
            ['id', '=', $id_sp],
         ])->delete();
        return response()->json(['message' => 'The Cart was delete'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($string)
    {
        
        $cart =DB::table('cart as n')
        ->join('product as sp', 'n.id_sp', '=', 'sp.id')
        ->join('customer as cs', 'n.id_customer', '=', 'cs.id')
        ->where([
            ['note', '=', 0],
            ['status', '=', 0],
            ['cs.username', '=', $string],
         ])
        ->select('n.*','sp.title','sp.img1','sp.price','cs.name','cs.mkh')
        ->get();
        
        return response()->json($cart);
    }
}
