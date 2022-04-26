<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use DB;
use App\customer;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $customer = customer::find($id);


        return response()->json($customer);
        
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
    public function show($user, $password)
    {
        $aas=  DB::table('customer')->where([
            ['username', '=', 'error@gmail.com'],
            ['password', '=', 'erreorrr'],
         ])->get();
        //dd($a);
        $customer = DB::table('customer')->where([
            ['username', '=', $user],
            ['password', '=', $password],
         ])->get();
        
        if($customer->count() > 0) {
            return response()->json($customer);
        };
        if($customer->count() === 0) {
            
            return response()->json($aas);
        };
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
