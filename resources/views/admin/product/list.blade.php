@extends("layouts.admin")

@section("title","Katalog")

@section("content")

    <h1>Katalog proizvoda</h1>
    <a href="{{route('admin.product.create')}}" class="btn btn-success">Dodaj novi proizvod</a>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Ime</th>
                <th>Cena</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>
                <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-primary">Izmeni</a>
                <form action="{{route('admin.product.delete', $product->id)}}" method="POST" style="display: inline;"
                    onsubmit="return confirm('Da li ste sigurni da zelite da obrisete ovaj fajl');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Obrisi</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
