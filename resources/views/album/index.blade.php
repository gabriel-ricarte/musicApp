@extends('layouts.app')

@section('content')
<header class="bg-dark py-3">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">{{$artist[0]['name']}}</h1>
        </div>
        <div class="text-center">
            <button class="btn btn-primary" onclick="">add album</button>
        </div>
    </div>
</header>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @forelse ($albums as $album)
                <div class="col mb-5">
                    <div class="card h-100">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">{{$album['name']}} - {{$album['year']}}</h5>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Listen</a></div>
                        </div>
                    </div>
                </div>
                @empty
                    <span class="alert alert-danger">Artist's album list is empty !</span>
                @endforelse
                </div>
            </div>

    </section>

@endsection
