<h2>Quản lý danh mục</h2>

<a href="/category/create">+ Thêm mới</a>

@if(session('success'))
<p style="color:green">{{session('success')}}</p>
@endif

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Tên</th>
    <th>Parent</th>
    <th>Active</th>
    <th>Action</th>
</tr>

@foreach($categories as $c)
<tr>
    <td>{{$c->id}}</td>
    <td>{{$c->name}}</td>
    <td>{{$c->parent_id}}</td>
    <td>{{$c->is_active}}</td>
    <td>
        <a href="/category/edit/{{$c->id}}">Edit</a> |
        <a href="/category/delete/{{$c->id}}" onclick="return confirm('Xóa?')">Delete</a>
    </td>
</tr>
@endforeach
</table>
