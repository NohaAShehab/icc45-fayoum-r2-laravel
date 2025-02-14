
@extends("layouts.app")


@section("title") Add New Product @endsection

@section('main')
    <h1 class="text-center">Edit Product</h1>
    <form action="{{route("products.update", $product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" value="{{$product->name}}"
                   class="form-control" id="name" name="name" >
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description"
                      name="description" rows="3" >{{$product->description}}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price ($)</label>
            <input type="number" class="form-control" value="{{$product->price}}"
                   id="price" name="price" step="0.01" >
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="text" class="form-control" id="image" value="{{$product->image}}"
                   name="image"  >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

