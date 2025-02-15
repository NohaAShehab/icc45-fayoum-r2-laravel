
@extends("layouts.app")


@section("title") All Students @endsection

@section('main')
    <h1 style="color: blue; text-align: center"> All Students </h1>
    <a href="{{route("student.create")}}" class="btn btn-dark justify-content-center">Add new student</a>


    <div class="d-flex justify-content-center">
        <div class="row row-cols-3 g-2">
            @foreach($students as $student)

                <div class="card" style="width: 18rem;">
                    <img src="{{asset("storage/images/students/".$student->image)}}"
                         height="200"
                         class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$student->name}}</h5>
                        <a href="{{route("student.show", $student)}}" class="btn btn-primary">Show </a>
                        <a href="" class="btn btn-warning">Edit </a>
                        <form action="{{route("student.destroy", $student)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $students->links() }}
    </div>
@endsection
