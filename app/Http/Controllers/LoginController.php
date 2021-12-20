<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('user_auth_off')->except('logout');
    }

    public function index() {
        return view('login');
    }

    public function auth(Request $request) {

        try {
            $response = Http::get(config('app.api_url')."/auth/".$request->login."/".$request->password);
            $datas = $response->json();
            //dd($datas);
            
            if ($datas == 404) {
                msg_flash("Login ou mot de passe incorrect", 'danger');
                //dd($datas);
                return redirect()->route('login');
            }
            elseif ($datas == 500) {
                msg_flash("Une erreur est survenue, veuillez contacter l'administrateur", 'danger');
                return redirect()->route('login');
            }
            else {
                if ($datas['role'] === "Virgile") {
                    msg_flash("Vous n'êtes pas autorisé a accéder a cette page", 'danger');
                    return redirect()->back();
                }
                session(['user' => $datas]);
                return redirect()->route('home');
            }
        } catch (\Throwable $th) {
            msg_flash('Une erreur est survenue', 'danger');
            return redirect()->route('login');
        }

    }

    public function logout(Request $request) {

        $request->session()->flush();
        return redirect()->route('login');
    }
}
