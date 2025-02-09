@extends("layouts.app")


@section("section1")
    <h1 style="text-align: center"> All students </h1>
@endsection

@section("main")
<table class="table table-striped table-hover">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Show</th>
    </tr>
    @foreach($students as $student)
        <tr>
            <td> {{$student['id'] }}</td>
            <td> {{$student["name"]}}</td>
            <td>{{$student["email"]}}</td>
            <td><a href="{{route("students.show", $student['id'])}}" class="btn btn-info"> Show</a></td>
        </tr>

    @endforeach

</table>
@endsection
