@extends('cms.parent')
@section('title','admin.index')

@section('content')

<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>ID</th>
          <th>name</th>
          <th>email</th>
          <th>password</th>
          <th>action</th>



        </tr>
      </thead>
      <tbody>
        @foreach ($admins as $item)

        <tr>
            <td>{{$loop->index + 1 }}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->password}}</td>
            <td>
                <a href="{{route('admins.edit',$item->id)}}">edit</a>

                <form action="{{ route('admins.destroy', $item->id) }}" method="POST">
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
