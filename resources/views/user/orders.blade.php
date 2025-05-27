@extends('layouts.publick')

@section('title', 'Moje narudžbine')

@section('content')
    <div style="max-width: 900px; margin: 40px auto; padding: 20px;">
        <h1 style="text-align: center; margin-bottom: 30px;">Moje narudžbine</h1>

        @if($orders->isEmpty())
            <p style="text-align: center;">Nemate nijednu narudžbinu.</p>
        @else
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th style="padding: 10px; border: 1px solid #ddd;">Naziv proizvoda</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">Količina</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">Datum</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd;">{{ $order->product->name }}</td>
                            <td style="padding: 10px; border: 1px solid #ddd;">{{ $order->quantity }}</td>
                            <td style="padding: 10px; border: 1px solid #ddd;">{{ $order->created_at->format('d.m.Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
