
@extends("layouts.app")


@section("title") All Employees @endsection

@section('main')
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">Edit Employee Form</h2>
        <form method="POST" action="{{route('employee.update', $employee)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                       id="name" name="name" value="{{ old('name') ? old('name'): $employee->name }}" placeholder="Enter your name" >
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                       id="email" name="email" value="{{ old('email') ? old('email'): $employee->email }}" placeholder="Enter your email" >
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" class="form-control @error('salary') is-invalid @enderror"
                       id="salary" name="salary" value="{{ old('salary') ? old('salary'): $employee->salary }}" placeholder="Enter your salary" >
                @error('salary')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>

    </div>

@endsection
