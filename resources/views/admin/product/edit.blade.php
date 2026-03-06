<h2>Sửa sản phẩm</h2>

<form method="post" action="/product/update/{{$product->id}}">
@csrf

Tên:
<input type="text" name="name" value="{{$product->name}}"><br><br>

Danh mục:

<select name="category_id">

@foreach($categories as $c)

<option value="{{$c->id}}"
@if($c->id == $product->category_id) selected @endif>

{{$c->name}}

</option>

@endforeach

</select>

<br><br>

Giá:
<input type="number" name="price" value="{{$product->price}}"><br><br>

Stock:
<input type="number" name="stock" value="{{$product->stock}}"><br><br>

<button type="submit">Update</button>

</form>
