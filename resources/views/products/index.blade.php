@extends("layouts.publick")

@section("title", "Katalog")

@section("content")

    <h1 style="text-align: center; margin-bottom: 30px;">Katalog proizvoda</h1>

    @foreach ($products as $product)
        <div style="
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        ">
            <img
                src="{{ asset('images/products/' . $product->image) }}"
                alt="{{ $product->name }}"
                style="
                    width: 150px;
                    height: 150px;
                    object-fit: cover;
                    border-radius: 8px;
                    margin-right: 20px;
                "
            >
            <div style="flex: 1;">
                <h3 style="margin-top: 0;">{{$product->name}}</h3>
                <p>{{$product->description}}</p>
                <p><strong>Cena:</strong> {{$product->price}} RSD</p>
                <a
                    href="{{route('product.show', $product->id)}}"
                    style="
                        background-color: #007bff;
                        color: white;
                        border: none;
                        padding: 10px 15px;
                        border-radius: 5px;
                        text-decoration: none;
                        display: inline-block;
                    "
                >
                    Pogledaj detalje
                </a>
            </div>
        </div>
    @endforeach

@endsection
