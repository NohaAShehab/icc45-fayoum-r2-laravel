@extends("layouts.app")


@section("title") Product Information @endsection

@section("main")

    <div class="card" style="width: 18rem;">
        <img src="" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <p class="card-text">Price: {{$product->price}}.</p>
            <p class="card-text">Description: {{$product->description}}.</p>
            <p class="card-text">Created at: {{$product->created_at}}.</p>
            <p class="card-text">Updated at: {{$product->updated_at}}.</p>

            <a href="{{route("products.index")}}" class="btn btn-primary">Back to all Products </a>
        </div>
    </div>


@endsection
