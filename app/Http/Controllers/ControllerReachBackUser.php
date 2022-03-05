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
        //Validate
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'acard' => 'required|string|unique:reach_back_users',
            'acard_validity' => 'required|string',
            'network' => 'required|string',
            'sa_signed' => 'required|string',
            'email' => 'required|email|unique:reach_back_users'
        ]);
        dd($request);

        $this->checkDirectory($request->input('acard'));
        info($request->input('sa_signed_local'));
        if ($request->input('sa_signed_local')) {
            $path_sa = $request->file('sa_signed_local')->store($request->input('sa_signed_local'), 'rbu');
        } else {
            $path_sa = "";
        }

        if ($request->input('acard_local')) {
            $path_acard = $request->file('acard_local')->store($request->input('acard_local'), 'rbu');
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
            $this->deleteFile($rbu->sa_signed_local);
            $this->deleteFile($rbu->acard_local);
            $this->deleteFolder($rbu->acard);
            $rbu->delete();
        }
        return redirect("/rbu");
    }

    /**
     *
     */
    public function download($id, Request $request)
    {
        $rbu = ReachBackUsers::find($id);
        //dd($request);
        if (isset($rbu)) {
            return Storage::disk('rbu')->download($rbu->sa_signed_local, "sa");
        }
    }
    /**
     *
    public function downloadsa($id, Request $request)
    {
        //dd($request);
        $rbu = ReachBackUsers::find($id);
        if (isset($rbu)) {
            return Storage::disk('rbu')->download($rbu->sa_signed_local);
        }
    }*/


    /**
     *   Create a specific Directory
     *
     * @param acard
     * @return nothing
     */
    private function checkDirectory($acard)
    {
        $directory = "public/rbu/" . $acard;
        if (!File::isDirectory($directory)) {
            return Storage::makeDirectory($directory);
        }
    }

    /**
     *   Delete a specific File
     *
     * @param file
     * @return nothing
     */

    private function deleteFile($file)
    {
        $exist = Storage::disk('rbu')->exists($file);
        if (isset($exist)) {
            return Storage::disk('rbu')->delete($file);
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

    public function sadelete($id)
    {
        $rbu = ReachBackUsers::find($id);
        //delete the file selected
        $file = Storage::disk('rbu')->exists($rbu->sa_signed_local);
        if (isset($file)) {
            $this->deleteFile($file);
            $rbu->sa_signed_local = null;
            $rbu->save();
        }

        if (!Storage::disk('rbu')->exists($rbu->acard_local)) {
            $this->deleteFolder($rbu->acard);
        }

        return redirect("/rbu");
    }
}
