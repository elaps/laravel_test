<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {


    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = $request->except('_token');
        dd($data);
    }

    /**
     * Display the specified resource.
     */
    public function register() {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function login() {
        return view('login.index');
    }

}
