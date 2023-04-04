@extends('cms.parent')
@section('title','create_admin')
@section('content')



<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">form</h3>
    </div>
<form action="{{route('admins.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="card-body">

      <div class="form-group">
          <label for="name">name</label>
          <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $admin->name) }}" >
        </div>

        <div class="form-group">
          <label for="email">email</label>
          <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $admin->email) }}" >
        </div>

        <div class="form-group">
          <label for="password">password</label>
          <input type="password" class="form-control" name="password" id="password" >
        </div>


    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  </div>

@endsection
