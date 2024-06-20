<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台管理系统登录</title>
    <link rel="stylesheet" href="{{asset('images/style.css') }}" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{asset('images/layui/css/layui.css')}}">
    <script src="{{asset('images/layui/layui.js')}}"></script>
</head>

<body>

<style type="text/css">
    body {    font-family: Arial, sans-serif;    background-color: #f0f2f5;    display: flex;    justify-content: center;    align-items: center;    height: 100vh;    margin: 0;}

    .login-container { width:360px; height:250px;   background-color: white;    padding: 20px;    border-radius: 5px;    box-shadow: 0 0 10px rgba(0,0,0,0.1);}
    .login-container h2{ font-size:26px; text-align:center;}
    .input-group {    margin-bottom: 15px;}
    .input-group label {    display: block;    margin-bottom: 5px;}
    .input-group input {    width: 95%;    padding: 8px;    border: 1px solid #ddd;    border-radius: 3px;}
    button {    width: 100%;    padding: 10px;    background-color: #007bff;    color: white;    border: none;    border-radius: 3px;    cursor: pointer;}
    button:hover {    background-color: #0056b3;}
</style>

<div class="login-container">
    <h2>后台登录</h2>
    <form id="login">
        <div class="input-group">
            <label for="username">用户名</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="password">密码</label>
            <input type="password" id="password" name="password" required>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit">登录</button>
    </form>
</div>

<script>

    $('#login').submit(function(e) {
        e.preventDefault(); // 阻止表单默认提交行为
        var formData = $(this).serialize(); // 序列化表单数据
        $.ajax({
            type: 'POST',
            url: "{{route('login.login')}}", //URL
            data: formData,
            success: function (response) {
                // 成功提交后的回调函数
                console.log(response);
                if (response.status == 200) {
                    layer.msg('提交成功!', {icon: 100, time: 2000});
                    window.location.href = "{{route('product.list')}}";
                } else {
                    layer.msg('提交失敗：' + response.msg, {icon: 100, time: 2000});
                    location.reload(true);
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    alert(errors)
                    console.log(xhr);
                }
            }
        });
    })
    </script>
</body>
</html>
