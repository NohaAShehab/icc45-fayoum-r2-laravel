
@extends("layouts.app")


@section("title") All categorys @endsection

@section('main')
    <h1 style="color: blue; text-align: center"> All Categories </h1>


    <div class="d-flex justify-content-center">
    <div class="row row-cols-3 g-2">
    @foreach($categories as $category)

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$category->name}}</h5>
            </div>
        </div>

    @endforeach
    </div>
    </div>

@endsection
