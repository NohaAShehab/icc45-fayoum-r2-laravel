
@extends("layouts.app")


@section("title") Add New Product @endsection

@section('main')
    <h1 class="text-center">Add new Product</h1>
    <form action="{{route("products.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" value="{{old("name")}}"
                   class="form-control" id="name" name="name" >
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description"
                      name="description" rows="3" >{{old("description")}}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price ($)</label>
            <input type="number" class="form-control" value="{{old("price")}}"
                   id="price" name="price" step="0.01" >
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="text" class="form-control" id="image" value="{{old("image")}}"
                   name="image"  >
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Categories</label>
            <select class="form-select" aria-label="Default select example" name="category_id">
                <option selected disabled value="null">Open this select menu</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach


            </select>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

