@extends('layouts.app')

@section('title', 'Moje narudžbine')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <h1 class="text-2xl font-bold mb-6">Moje narudžbine</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded shadow-sm">
            <thead>
                <tr class="bg-gray-100 text-left text-sm font-medium text-gray-700">
                    <th class="px-4 py-3 border-b">Proizvod</th>
                    <th class="px-4 py-3 border-b">Količina</th>
                    <th class="px-4 py-3 border-b">Cena</th>
                    <th class="px-4 py-3 border-b">Ukupno</th>
                    <th class="px-4 py-3 border-b">Akcije</th>
                </tr>
            </thead>
            <tbody>
                @php $ukupno = 0; @endphp
                @foreach($orders as $order)
                    @php $ukupno += $order->quantity * $order->product->price; @endphp
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $order->product->name }}</td>
                        <td class="px-4 py-3">
                            <form method="POST" action="{{ route('orders.update', $order) }}" class="flex items-center space-x-2">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $order->quantity }}" min="1" class="w-16 px-2 py-1 border rounded text-sm">
                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">
                                    Izmeni
                                </button>
                            </form>
                        </td>
                        <td class="px-4 py-3">{{ $order->product->price }} RSD</td>
                        <td class="px-4 py-3">{{ $order->quantity * $order->product->price }} RSD</td>
                        <td class="px-4 py-3">
                            <form method="POST" action="{{ route('orders.destroy', $order) }}" onsubmit="return confirm('Da li si siguran?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">
                                    Obriši
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-right">
        <h3 class="text-lg font-semibold">Ukupno za platiti:
            <span class="text-green-600 font-bold">{{ $ukupno }} RSD</span>
        </h3>
    </div>
</div>
@endsection
