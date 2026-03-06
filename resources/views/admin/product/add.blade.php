@extends('layout.admin')
@section('content')
<h2>Thêm sản phẩm</h2>

<form method="post" action="/product/store">
@csrf

Tên:
<input type="text" name="name"><br><br>

Danh mục:
<select name="category_id">

<option value="">--Chọn--</option>

@foreach($categories as $c)
<option value="{{$c->id}}">
{{$c->name}}
</option>
@endforeach

</select>

<br><br>

Giá:
<input type="number" name="price"><br><br>

Giá sale:
<input type="number" name="sale_price"><br><br>

Stock:
<input type="number" name="stock"><br><br>

Mô tả:
<textarea name="description"></textarea>

<br><br>

<button type="submit">Lưu</button>

</form>

@endsection
