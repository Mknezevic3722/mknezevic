@extends("layouts.publick")

@section("title", "Početna stranica")

@section("content")

<div style="max-width: 800px; margin: 40px auto; padding: 20px; background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
    <h1 style="font-size: 28px; margin-bottom: 20px; text-align: center;">{{ $product->name }}</h1>

    <div style="font-size: 16px; line-height: 1.6; color: #444; margin-bottom: 20px;">
        {{ $product->description }}
    </div>

    <p style="font-size: 18px; margin-bottom: 10px;"><strong>Cena:</strong> {{ $product->price }} RSD</p>

    <p style="font-size: 18px; margin-bottom: 20px;">
        <strong>Kategorija:</strong>
        {{ $product->category ? $product->category->name : 'Nema kategoriju' }}
    </p>

    @auth
        <form action="{{ route('orders.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <label for="quantity" style="font-size: 16px;">Količina:</label>
            <input type="number" id="quantity" name="quantity" min="1" value="1" required style="padding: 10px; border-radius: 6px; border: 1px solid #ccc;">

            <p><strong>Ukupna cena:</strong> <span id="total">{{ $product->price }}</span> RSD</p>

            <button type="submit" style="background-color: #007bff; color: white; padding: 10px; border: none; border-radius: 6px; font-size: 16px; cursor: pointer;">
                Naruči
            </button>
        </form>

        <script>
            const quantityInput = document.getElementById('quantity');
            const totalSpan = document.getElementById('total');
            const price = {{ $product->price }};

            quantityInput.addEventListener('input', () => {
                const qty = parseInt(quantityInput.value) || 1;
                totalSpan.textContent = qty * price;
            });
        </script>
    @else
        <p style="margin-top: 20px;"><a href="{{ route('login') }}" style="color: #007bff;">Prijavite se</a> da biste naručili proizvod.</p>
    @endauth
</div>

@endsection
