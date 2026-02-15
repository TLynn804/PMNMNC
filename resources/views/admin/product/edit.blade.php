<!doctype html>
<html>
<head><meta charset="utf-8"><title>Add Product</title></head>
<body>
  <h1>PRODUCT EDIT</h1>

  <form action ="/product/edit/{{ $product->id }}" method="POST">
    @csrf
    <label>Tên sản phẩm:</label>
    <input type="text" name="name" placeholder="Nhập tên..." value = "{{ $product->name }}" />
    <br><br>
    <label>Giá:</label>
    <input type="number" name="price" placeholder="Nhập giá..." value = "{{ $product->price }}" />
    <label>Số lượng:</label>
    <input type="number" name="stock" placeholder="Nhập số lượng..." value = "{{ $product->stock }}" />
    <br><br>
    <button type="submit">Cập nhật</button>
  </form>

  <br>
</body>
</html>