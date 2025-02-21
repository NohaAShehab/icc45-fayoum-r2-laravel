
@extends("layouts.app")


@section("title") All Students @endsection

@section('main')
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">Student Form</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your name" >
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" >
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <input type="number" class="form-control @error('grade') is-invalid @enderror" id="grade" name="grade" value="{{ old('grade') }}" placeholder="Enter your grade" >
                @error('grade')
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
