<?php

namespace App\Http\Controllers;

use App\Models\ReachBackUsers;
use Illuminate\Http\Request;

class ControllerReachBackUser extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rbu = ReachBackUsers::all();
        return view('rbu.rbu', compact('rbu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("rbu.newRbu");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $rbu = new ReachBackUsers();
        $rbu->fname = $request->input('fname');
        $rbu->lname = $request->input('lname');
        $rbu->acard = $request->input('acard');
        $rbu->acard_validity = $request->input('acard_validity');
        $rbu->network = $request->input('network');
        $rbu->sa_signed = $request->input('sa_signed');
        $rbu->email = $request->input('email');

        $rbu->save();

        $rbu = ReachBackUsers::all();
        return view("rbu.rbu", compact("rbu"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
