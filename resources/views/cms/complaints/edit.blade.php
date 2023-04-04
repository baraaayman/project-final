@extends('cms.parent')
@section('title','edit complaint')
@section('content')
<form action="{{route('complaints.update', $comp->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
      <div class="card-body">

        <div class="form-group">
            <label for="student_name">student name</label>
            <input type="text" class="form-control" name="student_name" id="student_name"{{ old('student_name', $comp->student_name) }}" >
          </div>

          <div class="form-group">
            <label for="student_email">student email</label>
            <input type="email" class="form-control" name="student_email" id="student_email" {{ old('student_email', $comp->student_email) }}" >
          </div>

          <div class="form-group">
            <label for="student_university_id">student university id</label>
            <input type="number" class="form-control" name="student_university_id" id="student_university_id" {{ old('student_university_id', $comp->student_university_id) }}" >
          </div>


        <div class="form-group">
            <label for="title_form">title</label>
            <input type="text" class="form-control" name="title" id="title_form" {{ old('title', $comp->title) }}" >
          </div>

          <div class="form-group">
            <label for="message_form">message</label>
            <input type="text" class="form-control" name="message" id="message_form" {{ old('message', $comp->message) }}" >
          </div>

        <div class="form-group">
          <label for="image">File input</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="image" id="image">
              <label class="custom-file-label" for="image">Choose file</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text">Upload</span>
            </div>
          </div>
        </div>

        <div>
            <h4><b>type</b></h4>
            <input type="radio" id="Complaint" name="chose" value="Complaint">
            <label for="Complaint">Complaint</label><br>
            <input type="radio" id="Suggestion" name="chose" value="Suggestion">
            <label for="Suggestion">Suggestion</label><br>

          </div>


      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

@endsection
