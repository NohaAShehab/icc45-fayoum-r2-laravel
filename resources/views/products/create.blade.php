
@extends("layouts.app")


@section("title") Add New Product @endsection

@section('main')
    <h1 class="text-center">Add new Product</h1>

    <form action="{{route("products.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price ($)</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="text" class="form-control" id="image" name="image"  required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

