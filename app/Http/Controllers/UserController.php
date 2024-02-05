<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
    */

    public function index()
    {
        $data = User::get();
        return view('users', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = new User();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->telefone = $request->telefone;
            $data->password = Hash::make($request->password);

            $store_user = $data->save();

            if($store_user) {
                return redirect()->back();
            }

        }catch(Exception $e) {
            return ($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::find($id);
        return view('showUsers', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        
        $update = User::where(['id' => $request->id])->update([
            'name' => $request->name,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'password' => bcrypt($request->password),
            'id' => $request->id
        ]);

        if($update) {
            return Redirect()->route('users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $id)
    {
        $delete = User::destroy($id->id);
        //User::find($id)->delete();
        if($delete) {
            return Redirect()->route('users.index');
        }
    }
}
