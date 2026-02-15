<h2>Thêm danh mục</h2>

<form method="post" action="/category/store">
@csrf

Tên:
<input type="text" name="name"><br><br>

Mô tả:
<textarea name="description"></textarea><br><br>

Danh mục cha:
<select name="parent_id">
    <option value="">--Không--</option>
    @foreach($parents as $p)
        <option value="{{$p->id}}">{{$p->name}}</option>
    @endforeach
</select><br><br>

Active:
<input type="checkbox" name="is_active" value="1" checked><br><br>

<button type="submit">Lưu</button>
</form>
