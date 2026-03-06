@extends('layout.admin')
@section('content')
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td> {{$product['id']}}</td>
                <td> {{$product['name']}}</td>
                <td> {{$product['price']}}</td>
                <td> {{$product['stock']}}</td>
                <td>
                    <a href="/product/edit/{{$product->id}}">Edit</a> |
                    <a href="/product/delete/{{$product->id}}">Delete</a>
                </td>
            </tr>
            
        @endforeach
    </table>
   

    <br>

    <a href="{{ route('product.add') }}">
        <button>Thêm mới sản phẩm</button>
    </a>

@endsection