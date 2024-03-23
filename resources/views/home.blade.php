@extends('layouts.app')

@section('content')
    <div class="container">

            <div class="col-md-16 col-md-offset-2">
                {{--  <div class="card mb-3 mt-2">  --}}
                    {{--  <div class="card-header ">Welcome, {{Auth::user()->name}}</div>  --}}
                 {{--  </div>  --}}
                <a href="#uploadimage" data-bs-toggle="modal" class="btn text-light mt-3" style="background-color:#5603ad"><i class="fa fa-upload" aria-hidden="true"></i>
                    Upload Foto</a>
            </div>
        </div>


    {{--  Modal  --}}
    <div class="modal fade " id="uploadimage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Image</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group mb-3">
                    <label for="title">Judul</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="My Holiday">
                </div>

                <div class="form-group mb-3">
                    <label for="deskription">Deskripsi</label>
                    <textarea class="form-control" name="deskription" id="deskription" class="form-control" placeholder="Today I'm enjoy with... ">
                    </textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="album">Album</label>
                    <select name="album" class="form-select @error('album') is-invalid @enderror">
                        <option value="">--Pilih Album--</option>
                        @foreach($albums as $album)
                        <option value="{{$album->id}}">{{$album->namaalbum}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="foto">Foto</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    {{--  Modal  --}}
    <hr class="border-0">

      <div class="container w-100%">
        <div class="row">
        @foreach($posts as $post)
            <div class="col-4">
                <div class="card mt-3 border-0 bg-light mb-3" style="width:260px; height:300px;">
                    <div class="card-img-top">
                        <a href="#{{$post->id}}" data-bs-toggle="modal"><img src="{{asset('images/'.$post->image)}}" alt="" ></a>
                    </div>
                 <div class="post-footer pt-0 align-item-center">
                    <div class="button-footer ">
                        <span class="btn btn-default"><i class="fa fa-comment"></i><span class="btn btn-default">2</span></span>
                        <span class="btn btn-default btn-xs {{$post->likes->contains(fn ($val) => $val->user_id === auth()->user()->id) ?"liked":""}}" onclick="postlike('{{$post->id}}',this)">
                            <i class="fa fa-thumbs-up">
                                <span class="btn btn-default btn-xs" id="{{$post->id}}-count" >{{$post->likes_count}}</span>
                            </i>
                        </span>
                        <span class="btn btn-default"><i class="fa-solid fa-download"></i></span>
                    </div>
                    </div>
                </div>
            </div>


{{--  Modal  --}}
    <div class="modal fade" id="{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class=" ">
                    <div class="show_modal_image"> <a href="#"> <img src="{{asset('images/'.$post->image)}}" alt="" > </a> </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
    </div>

<style>
    .liked{
        background-color: #099;
        background-color: #444;

    }
</style>


@endsection


@section('js')
<script type="text/javascript">
   function postlike(postId, elem) {
        console.log("Liking post "+postId)
        // var csrfToken = '{{csrf_token()}}';
        // var likeCount = parseInt($('#' + postId + "-count").text());

        // $.post('{{route('postlike')}}', { postId: postId, _token: csrfToken }, function(data) {
        //     console.log(data);
        // });
    }
</script>
@endsection
{{--  <script>
    let likeButton = document.querySelector('#like-button');
    let unlikeButton = document.querySelector('#unlike-button');

    likeButton.addEventListener('click', function () {
        let postId = this.dataset.postId;fetch(`/images/${postId}/like`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer {{ auth()->user()->token() }}'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.like) {
                    likeButton.style.display = 'none';
                    unlikeButton.style.display = 'block';
                }
            });
    });

    unlikeButton.addEventListener('click', function () {
        let postId = this.dataset.postId;

        fetch(`/images/${postId}/unlike`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer {{ auth()->user()->token() }}'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (!data.like) {
                    likeButton.style.display = 'block';
                    unlikeButton.style.display = 'none';
                }
            });
    });
</script>  --}}



