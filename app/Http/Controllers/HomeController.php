<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $request = Http::withHeaders([
            'Basic' => 'ZGV2ZWxvcGVyOlpHVjJaV3h2Y0dWeQ=='
        ])->accept('application/json')->get('https://moat.ai/api/task/');

        return view('home')->with('artists',$request->json());
    }
}
