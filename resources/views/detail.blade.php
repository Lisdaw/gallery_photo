@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @if($posts)
                <h2 class="mt-1">{{$posts->title}}</h2>
                <p class="lead">Posted on</p>
                <hr>
                <img src="{{asset('images/'.$post->image)}}"class="img-fluid-rounded" alt="" >
                <p class ={{$posts->description}}></p>

                <div class="card-my-4">
                    <h5 class="card-header">
                       Leave Comment:
                    </h5>
                    <div class="body mb-5">
                        <form action=""method="POST">
                            @csrf
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            <div class="form-group" >
                                <p>Nama:</p>
                                <input class="form-control" type="text" >
                            </div>
                            <div class="form-group" >
                                <p>Komen:</p>
                                <input class="form-control" type="text" name="komentar">
                            </div>
                        <input type="submit" class="button">
                        </form>
                    </div>
                </div>


                {{--  isi komen  --}}
                @foreach($komen as $k)
                @if($k->post_id==$id)
                <div class="media-mb-4">
                    <div class="media-body">
                        <h5 class="mt-0">Username</h5>
                        <p> {{$k->komentar}}</p>
                    </div>
                </div>
                {{--  isi komen  --}}
                @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
