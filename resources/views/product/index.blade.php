<!doctype html>
<html>
<head><meta charset="utf-8"><title>Product</title></head>
<body>
  

<table border="1" cellpadding="10" cellspacing="0">
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

</body>
</html>