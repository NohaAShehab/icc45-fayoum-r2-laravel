
@extends("layouts.app")


@section("title") All Products @endsection

@section('main')
    <h1 style="color: blue; text-align: center"> All products </h1>
    <div class="d-flex justify-content-center">
    <div class="row row-cols-3 g-2">
    @foreach($products as $product)

        <div class="card" style="width: 18rem;">
            <img src="{{asset("images/products/".$product->image)}}"
                    height="200"
                 class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">Price: {{$product->price}}.</p>
                <a href="{{route("products.show", $product->id)}}" class="btn btn-primary">Show </a>
                <a href="{{route("products.destroy", $product->id)}}" class="btn btn-danger">Delete </a>
            </div>
        </div>

    @endforeach
    </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection
