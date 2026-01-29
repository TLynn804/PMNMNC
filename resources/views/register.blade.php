<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Đăng ký</h2>

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form method="POST" action="/register">
        @csrf

        <label>Username:</label><br>
        <input type="text" name="username"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <label>Re-enter Password:</label>
        <input type="password" name="repass"><br><br>

        <label>MSSV:</label>
        <input type="text" name="mssv"><br><br>

        <label>Lớp môn học:</label>
        <input type="text" name="lop"><br><br>

        <label>Giới tính:</label>
        <select name="gioitinh">
            <option value="nam">Nam</option>
            <option value="nu">Nữ</option>
        </select><br><br>

        <button type="submit">Register</button>
    </form>

    <br>
    <a href="{{ route('login') }}">Đã có tài khoản? Đăng nhập</a>
</body>
</html>
