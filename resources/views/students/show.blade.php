
@extends("layouts.app")


@section("title") All Students @endsection

@section('main')
<div class="card shadow-lg p-4">
    <h2 class="text-center mb-4">Student Details</h2>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Name:</strong> {{$student->name}}</p>
            <p><strong>Email:</strong>{{$student->email}}</p>
            <p><strong>Grade:</strong> {{$student->grade}}</p>
        </div>
        <div class="col-md-6">
            <p><strong>Created At:</strong> {{$student->created_at}}</p>
            <p><strong>Updated At:</strong> {{$student->updated_at}}</p>
        </div>
    </div>
    <div class="text-center mt-3">
        <img src="{{asset("storage/images/students/".$student->image)}}" alt="Student Image" class="img-fluid rounded shadow" style="max-width: 200px;">
    </div>
</div>
@endsection
