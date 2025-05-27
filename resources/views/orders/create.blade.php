@extends("layouts.publick")

@section("title", "Naruči proizvod")

@section("content")
    <h1>Naruči: {{ $product->name }}</h1>

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <label>Količina:</label>
        <input type="number" name="quantity" min="1" required>
        <br><br>
        <button type="submit">Pošalji narudžbinu</button>
    </form>
@endsection
