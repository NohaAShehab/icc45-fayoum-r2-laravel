@extends("layouts.app")


@section("title") Category Information @endsection

@section("main")
    <h1> Category details </h1>
    <div class="row">
    <div class="card col-6" style="width: 18rem;" >

        <div class="card-body">
            <h5 class="card-title">{{$category->name}}</h5>
            <p class="card-text">Created at: {{$category->created_at}}.</p>
            <p class="card-text">Updated at: {{$category->updated_at}}.</p>

            <a href="{{route("category.index")}}" class="btn btn-primary">Back to all Categories </a>
        </div>
    </div>
    <div class="col-6">
        <h1>All products in this category  </h1>
        <div class="list-group">
        @forelse($category->products as $product)
            <li class="list-group-item"> <a href="{{route("products.show", $product->id)}}"> {{$product->name}} </a></li>
            @empty
                <h5 style="color: red">No Products</h5>
        @endforelse
        </div>
    </div>

    </div>

@endsection
