
@extends("layouts.app")


@section("title") All Employees @endsection

@section('main')
    <h1 style="color: blue; text-align: center"> All Employees </h1>
    <a href="{{route("employee.create")}}" class="btn btn-dark justify-content-center">Add new employee</a>
    {{$employees->links()}}


    <div class="d-flex justify-content-center">
        <div class="row row-cols-3 g-2">
            @foreach($employees as $employee)

                <div class="card" style="width: 18rem;">
                    <img src="{{asset("storage/images/employees/".$employee->image)}}"
                         height="200"
                         class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$employee->name}}</h5>
                        <a href="{{route("employee.show", $employee)}}" class="btn btn-primary">Show </a>
                        <a href="{{route("employee.edit", $employee)}}" class="btn btn-warning">Edit </a>

                        @can("delete-employee", $employee)
                            <form action="{{route("employee.destroy", $employee)}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        @else
                            <span style="color: red"> You must be the owner</span>
                        @endcanany
                    </div>

                </div>

            @endforeach
        </div>


    </div>

@endsection
