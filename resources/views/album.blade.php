@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row ">
        <div class="col-md-4 col-md-offset-2 mt-3 mb-3">
            <a href="#uploadimage" data-bs-toggle="modal" class="btn text-light" style="background-color:#5603ad"><i class="fa fa-upload" aria-hidden="true"></i>
                Buat Album</a>
        </div>
    </div>
</div>

<div class="modal fade " id="uploadimage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create Album</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('album.store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group mb-3">
                <label for="title">Nama Album</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="My Holiday">
            </div>

            <div class="form-group mb-3">
                <label for="deskription">Deskripsi</label>
                <textarea class="form-control" name="deskription" id="deskription" class="form-control" placeholder="Today I'm enjoy with... ">
                </textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <table class="table table-striped">
        <tr>
            <th>NO</th>
            <th>Nama Album</th>
            <th>Deskripsi</th>
        </tr>
        @foreach($album as $album)
        <tr>
        <td>{{$album->id}}</td>
        <td>{{$album->namaalbum}}</td>
        <td>{{$album->deskripsi}}</td>
    </tr>
        @endforeach
    </table>
    @foreach($album as $album)
    @endforeach

  </div>

@endsection
