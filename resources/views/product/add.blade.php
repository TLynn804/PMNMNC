<!DOCTYPE html>
<html>
<head>
    <title>Thêm sản phẩm</title>
</head>
<body>
    <h1>Form thêm sản phẩm</h1>

    <form>
        <label>Tên sản phẩm:</label><br>
        <input type="text"><br><br>

        <label>Giá:</label><br>
        <input type="number"><br><br>

        
        <button type="submit">Lưu</button>
        <br><br>
        <a href="{{ route('product.index') }}">Danh sách sản phẩm</a>
    </form>
</body>
</html>
