<?php

namespace App\Http\Controllers;

use App\Models\ReachBackUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        //Validate fields
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'acard' => 'required|string|unique:reach_back_users',
            'acard_validity' => 'required|string',
            'network' => 'required|string',
            'sa_signed' => 'required|string',
            'email' => 'required|email|unique:reach_back_users'
        ]);

        //Create Folder if dosn't exists
        $this->checkDirectory($request->input('acard'));

        //Save the Files
        if ($request->file('sa_signed_local')) {
            $path_sa = $request->file('sa_signed_local')->store($request->input('acard'), 'rbu');
            $path_sa = explode("/", $path_sa);
            $path_sa = $path_sa[1];
        } else {
            $path_sa = "";
        }

        if ($request->file('acard_local')) {
            $path_acard = $request->file('acard_local')->store($request->input('acard'), 'rbu');
            $path_acard = explode("/", $path_acard)[1];
            //$path_acard = $path_acard[1];
        } else {
            $path_acard = "";
        }

        $rbu = new ReachBackUsers();
        $rbu->fname = $request->input('fname');
        $rbu->lname = $request->input('lname');
        $rbu->acard = $request->input('acard');
        $rbu->acard_local = $path_acard;
        $rbu->acard_validity = $request->input('acard_validity');
        $rbu->network = $request->input('network');
        $rbu->sa_signed = $request->input('sa_signed');
        $rbu->sa_signed_local = $path_sa;
        $rbu->email = $request->input('email');

        $rbu->save();
        //Comment
        return redirect("/rbu");
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
        $rbu = ReachBackUsers::find($id);
        if (isset($rbu)) {
            return view('rbu.editRbu', compact('rbu'));
        } else {
            return redirect('/rbu');
        }
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
        info($request);
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'acard' => 'required|string|unique:reach_back_users',
            'acard_validity' => 'required|string',
            'network' => 'required|string',
            'sa_signed' => 'required|string',
            'email' => 'required|email'
        ]);

        $rbu = ReachBackUsers::find($id);
        //dd($request);
        if (isset($rbu)) {
            $rbu->fname = $request->input('fname');
            $rbu->lname = $request->input('lname');
            $rbu->acard = $request->input('acard');
            $rbu->acard_validity = $request->input('acard_validity');
            $rbu->network = $request->input('network');
            $rbu->sa_signed = $request->input('sa_signed');
            $rbu->sa_signed_local = "";
            $rbu->email = $request->input('email');
            $rbu->save();

            return redirect('/rbu');
        } else {
            return redirect('/rbu');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rbu = ReachBackUsers::find($id);
        //dd($rbu);
        if (isset($rbu)) {
            $this->deletefile($rbu->id, $rbu->sa_signed_local);
            $this->deletefile($rbu->id, $rbu->acard_local);
            $this->deleteFolder($rbu->acard);
            $rbu->delete();
        }
        return redirect("/rbu");
    }

    /**
     *
     */
    public function download($id, $file, Request $request)
    {
        $rbu = ReachBackUsers::find($id);
        info("local: " . $file);
        //dd($request);
        if (isset($rbu)) {
            if ($file == $rbu->sa_signed_local) {
                return Storage::disk('rbu')->download($rbu->acard . '/' . $rbu->sa_signed_local, "sa");
            } else if ($file == $rbu->acard_local) {
                return Storage::disk('rbu')->download($rbu->acard . '/' . $rbu->acard_local, "amis");
            } else {
                return redirect("/rbu");
            }
        }
    }

    /**
     *   Create a specific Directory
     *
     * @param acard
     * @return nothing
     */
    private function checkDirectory($acard)
    {
        if (!File::isDirectory($acard)) {
            return Storage::disk('rbu')->makeDirectory($acard);
        }
    }

    /**
     *   Delete a specific File
     *
     * @param file
     * @return nothing
     */

    private function deletefile($id, $file)
    {
        $rbu = ReachBackUsers::find($id);
        $exist = Storage::disk('rbu')->exists($file);
        if (isset($exist)) {
            return Storage::disk('rbu')->delete($rbu->acard . "/" . $file);
        }
    }

    /**
     *   Delete a specific Directory
     *
     * @param acard
     * @return nothing
     */

    private function deleteFolder($folder)
    {
        $exist = Storage::disk('rbu')->exists($folder);
        if (isset($exist)) {
            return Storage::disk("rbu")->deleteDirectory($folder);
        }
    }
}
