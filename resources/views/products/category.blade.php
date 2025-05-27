@extends("layouts.publick")

@section("title","Pocetna stranice")

@section("content")

  <h1>Kategorija {{ $category->name}}</h1>
  <div>
    {{$category->description}}
  </div>
  <h2>Proizvodi u kategoriji</h2>
    @foreach ($category->products as $product)
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{$product->name}}</h3>
            </div>
            <div class="panel-body">
                <p>{{$product->description}}</p>
                <p><strong>Cena:</strong>{{$product->price}} RSD</p>
                <a href="{{route('product.show', $product->id)}}" class="btn btn-primary">Pogledaj detalje</a>
            </div>

        </div>

    @endforeach
@endsection


@section('sidebar')
        @include('partials.sidebar')
@endsection
