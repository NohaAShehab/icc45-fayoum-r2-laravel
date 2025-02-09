@extends("layouts.app")


@section("main")

    <h1 style="color: purple"> Student Profile </h1>

    <div class="card" style="width: 18rem;">
        <img src="" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$student["name"]}}</h5>
            <p class="card-text">{{$student['email']}}</p>
            <a href="{{route("students.home")}}" class="btn btn-primary">Back to All students</a>
        </div>

@endsection
