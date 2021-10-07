@extends('layouts.app')

@section('content')
<header class="bg-dark py-3">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            @if (isset($artist) && !empty($artist))
                <h1 class="display-4 fw-bolder">{{$artist[0]['name']}}</h1>
                <div class="text-center">
                    <a class="btn btn-primary" href="{{url('/album/create/artist_id/'.$artist[0]['id'])}}">new album</a>
                </div>
            @else
                <h1 class="display-4 fw-bolder">Albums List</h1>
                <div class="text-center">
                    <a class="btn btn-primary" href="{{route('album.create')}}">new album</a>
                </div>
            @endif
        </div>

    </div>
</header>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @forelse ($albums as $album)
                <div class="col mb-5">
                    <div class="card h-100">
                        <div class="card-body p-2">
                            <div class="text-center">
                                <h5 class="fw-bolder">{{$album['name']}} - {{$album['year']}}</h5>
                            </div>
                            <hr>
                            <div class="row">
                                @if (Auth::user()->role)
                                    <div class="col-md">
                                        <div class="text-left"><a class="btn btn-danger mt-auto" href="{{route('album.delete')}}"><span class="fa fa-trash"></span></a></div>
                                    </div>
                                @endif
                                <div class="col-md text-right">
                                    <a class="btn btn-warning mt-auto" href="{{route('album.edit',[$album['id']])}}"><span class="fa fa-edit"></span></a>
                                </div>
                                <div class="col-md">
                                    <a class="btn btn-primary mt-auto" href="#"><span class="fa fa-music"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <span class="alert alert-danger">Album list is empty</span>
                @endforelse
                </div>
            </div>

    </section>

@endsection
