<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homestay</title>
    <style>
        body{
            display: flex;
            justify-content: center;
        }
        .btn-link-verifi{
            padding: 8px 15px;
            text-decoration: none;
            background-color: rgb(207,46,46);   
            color: #fff;        
        }
    </style>
</head>
<body>
<div>
        <h1>Email xác nhận</h1>
        <p>Hệ thống đã tạo tài khoản thành công cho bạn</p>
        <p>Email đăng nhập: {{$user->email}}</p>
        <p>Username: {{$user->username}}</p>
        <p>Password: {{$password}}</p>
        <p>Để đảm bảo yếu tố bảo mật, vui lòng đổi mật khẩu trong vòng 24h</p>
    </div>
</body>
</html>