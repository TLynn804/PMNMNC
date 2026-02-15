@extends('layout.admin')
@section('content')
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td> {{$product['id']}}</td>
                <td> {{$product['name']}}</td>
                <td> {{$product['price']}}</td>
                <td> {{$product['stock']}}</td>
            </tr>
            
        @endforeach
    </table>

    <br>

    <a href="{{ route('product.add') }}">
        <button>Thêm mới sản phẩm</button>
    </a>

@endsection