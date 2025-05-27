@extends("layouts.publick")

@section("title", "Istaknuti proizvodi")

@section("content")
    <h1 style="text-align: center; margin: 30px 0;">Istaknuta ponuda</h1>

    <div style="
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    ">
        @foreach ($products as $product)
            <div style="
                background: #fff;
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                overflow: hidden;
                transition: transform 0.3s;
                display: flex;
                flex-direction: column;
            ">
                <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" style="
                    width: 100%;
                    height: 200px;
                    object-fit: cover;
                ">
                <div style="padding: 20px; flex: 1;">
                    <h3 style="margin-bottom: 10px; font-size: 20px;">{{ $product->name }}</h3>
                    <p style="color: #555; font-size: 14px;">{{ $product->description }}</p>
                    <p style="font-weight: bold; margin-top: 10px;">Cena: {{ $product->price }} RSD</p>
                    <a href="{{ route('product.show', $product->id) }}" style="
                        display: inline-block;
                        margin-top: 15px;
                        background-color: #007bff;
                        color: white;
                        padding: 10px 15px;
                        border-radius: 5px;
                        text-decoration: none;
                        font-size: 14px;
                    ">Detalji</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
