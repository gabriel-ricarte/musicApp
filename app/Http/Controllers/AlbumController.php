<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AlbumController extends Controller
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
    public function index($artist=0)
    {
        if($artist !== 0){

            $request = Http::withHeaders([
                'Basic' => 'ZGV2ZWxvcGVyOlpHVjJaV3h2Y0dWeQ=='
            ])->accept('application/json')->get('https://moat.ai/api/task/?artist_id='.$artist);

            if (empty($request->json())) {
                return redirect()->back()->withErrors('Artist not found');
            }

            $albums = Album::where('artist_id',$artist)->get();
            return view('album.index')->with('albums',$albums)->with('artist',$request->json());
        }else{
            $albums = Album::all();
            return view('album.index')->with('albums',$albums);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($artist=0)
    {
        if($artist !== 0){
            $request = Http::withHeaders([
                'Basic' => 'ZGV2ZWxvcGVyOlpHVjJaV3h2Y0dWeQ=='
            ])->accept('application/json')->get('https://moat.ai/api/task/?artist_id='.$artist);

            if (empty($request->json())) {
                return redirect()->back()->withErrors('Artist not found');
            }
            return view('album.form')->with('artist',$request->json());
        }else{
            $request = Http::withHeaders([
                'Basic' => 'ZGV2ZWxvcGVyOlpHVjJaV3h2Y0dWeQ=='
            ])->accept('application/json')->get('https://moat.ai/api/task/');

            return view('album.form')->with('artists',$request->json());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'artist_id' => 'required|integer',
            'year' => 'required|max:4',
        ]);

        Album::create($request->all());

        return redirect()->route('album.index.artist',[$request->artist_id]);
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
        $album = Album::find($id);

        $request = Http::withHeaders([
            'Basic' => 'ZGV2ZWxvcGVyOlpHVjJaV3h2Y0dWeQ=='
        ])->accept('application/json')->get('https://moat.ai/api/task/?artist_id='.$album->artist_id);

        return view('album.form')->with('artist',$request->json())->with('album',$album)->with('edit',true);
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
