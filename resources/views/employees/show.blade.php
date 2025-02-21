
@extends("layouts.app")


@section("title") All Employees @endsection

@section('main')
<div class="card shadow-lg p-4">
    <h2 class="text-center mb-4">Employee Details</h2>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Name:</strong> {{$employee->name}}</p>
            <p><strong>Email:</strong>{{$employee->email}}</p>
            <p><strong>Salary:</strong> {{$employee->salary}}</p>
            <p><strong>Created by:</strong> {{$employee->creator ? $employee->creator->name: "no"}}</p>

        </div>
        <div class="col-md-6">
            <p><strong>Created At:</strong> {{$employee->created_at}}</p>
            <p><strong>Updated At:</strong> {{$employee->updated_at}}</p>
        </div>
    </div>
    <div class="text-center mt-3">
        <img src="{{asset("storage/images/employees/".$employee->image)}}" alt="Employee Image" class="img-fluid rounded shadow" style="max-width: 200px;">
    </div>
</div>
@endsection
