@extends('layouts.app')

@section('content')
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Music App</h1>
            <p class="lead fw-normal text-white-50 mb-0">Create and edit albums for your favorite artists</p>
        </div>
    </div>
</header>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @forelse ($artists as $artist)
                <div class="col mb-5">
                    <div class="card h-100">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">{{$artist[0]['name']}}</h5>
                                <a class="twitter-follow-button"
                                    href="https://twitter.com/{{str_replace('@','',$artist[0]['twitter'])}}">
                                    Follow {{$artist[0]['twitter']}}
                                </a>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('album.index.artist',[$artist[0]['id']])}}">Albums</a></div>
                        </div>
                    </div>
                </div>
                @empty
                    <span class="alert alert-danger">Artists list is empty !</span>
                @endforelse
                </div>
            </div>

    </section>

@endsection
