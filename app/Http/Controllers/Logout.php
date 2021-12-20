<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class Logout
{

    public static function deconnecter(Request $request) {

        $request->session()->flush();
        return redirect()->route('login');
    }

}
