<h2>Sửa danh mục</h2>

<form method="post" action="/category/update/{{$category->id}}">
@csrf

Tên:
<input type="text" name="name" value="{{$category->name}}"><br><br>

Mô tả:
<textarea name="description">{{$category->description}}</textarea><br><br>

Danh mục cha:
<select name="parent_id">
    <option value="">--Không--</option>
    @foreach($parents as $p)
        <option value="{{$p->id}}"
        {{$category->parent_id == $p->id ? 'selected' : ''}}>
        {{$p->name}}
        </option>
    @endforeach
</select><br><br>

Active:
<input type="checkbox" name="is_active" value="1"
{{$category->is_active ? 'checked':''}}><br><br>

<button type="submit">Cập nhật</button>
</form>
