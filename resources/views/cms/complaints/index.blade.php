@extends('cms.parent')
@section('title','create complaint')
@section('content')


<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>ID</th>
          <th>title</th>
          <th>message</th>
          <th>type</th>
          <th>student_university_id</th>
          <th>student_name</th>
          <th>student_email</th>
          <th>status</th>
          <th>image</th>
          <th>action</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($comp as $item)

        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->message}}</td>
            <td>{{$item->type}}</td>
            <td>{{$item->student_university_id}}</td>
            <td>{{$item->student_name}}</td>
            <td>{{$item->student_email}}</td>
            <td>{{$item->status}}</td>
            <td><img width="80" src="{{ asset('uploads/'.$item->image) }}" alt=""></td>
            <td>
                <a href="{{route('complaints.edit',$item->id)}}">edit</a>

                <form action="{{ route('complaints.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
            </td>


        </tr>

        @endforeach
      </tbody>
    </table>
  </div>

@endsection
