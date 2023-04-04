@extends('cms.parent')
@section('title','edit_form')

@section('content')

<form action="{{ route('admins.update', $admins->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')


    <div class="card-body">

        <div class="form-group">
            <label for="name">name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $admins->name) }}" >
          </div>

          <div class="form-group">
            <label for="email">email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $admins->email) }}" >
          </div>


      <div class="card-footer">



    <button class="btn btn-success px-5">Update</button>

    </form>
@endsection
