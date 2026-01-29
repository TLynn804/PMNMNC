<!DOCTYPE html>
<html>
<head>
    <title>Nhập tuổi</title>
</head>
<body>
    <h2>Nhập tuổi của bạn</h2>

    <form method="POST" action="{{ route('age.submit') }}">
        @csrf
        <input type="number" name="age" required>
        <button type="submit">Gửi</button>
    </form>
</body>
</html>
