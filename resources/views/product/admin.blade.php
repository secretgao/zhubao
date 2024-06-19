<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>深信国检珠宝检测鉴定中心</title>
    <link rel="stylesheet" href="{{asset('images/style.css') }}" type="text/css">
</head>

<style type="text/css">
    .admin-userbox{width:1000px; margin:0 auto; padding:20px 0;}
    .admin-userbox table{border:1px solid #CCCCCC; border-bottom:0; border-left:0;}
    .admin-userbox td{border:1px solid #CCCCCC; border-top:0; border-right:0; height:56px; line-height:56px; text-align:center;}
    .addnew-user{ width:120px; height:35px; background:#930; color:#FFF; margin:50px auto; line-height:35px; padding:20px 0; text-align:center; cursor:pointer;}
</style>

<body>
<div class="zsdmin_bar">
    <div class="zsdmin_bar_box">
        <a href="{{route("upload.index")}}">上传证书</a>
        <a href="{{route("product.list")}}" >管理证书</a>
        <a href="{{route('upload.printbm')}}" target="_blank" >打印证书背面</a>
        <a href="{{route('product.admin')}}" style="background:#900;">用户账号管理</a>
    </div>
</div>

<div class="admin-userbox">
    <table>
        <tr>
            <td width="207"><strong>用户名</strong></td>
            <td width="207"><strong>密码</strong></td>
            <td width="203"><strong>备注</strong></td>
            <td width="123"><strong>级别</strong></td>
            <td width="211"><strong>操作</strong></td>
        </tr>
        <tr>
            <td>admin</td>
            <td>admin888</td>
            <td>网站管理员</td>
            <td>超级管理员</td>
            <td><a href="#" id="showDropdownBtn1">更改密码</a></td>
        </tr>
        <tr>
            <td>sunyi</td>
            <td>sunyi888</td>
            <td>香苑</td>
            <td>普通用户</td>
            <td><a href="#" id="showDropdownBtn1">更改密码</a> &nbsp;&nbsp; <a href="#">删除</a></td>
        </tr>
        <tr>
            <td>sunyi</td>
            <td>sunyi888</td>
            <td>香苑</td>
            <td>普通用户</td>
            <td><a href="#" id="showDropdownBtn1">更改密码</a> &nbsp;&nbsp; <a href="#">删除</a></td>
        </tr>
    </table>
    <div class="addnew-user"id="showDropdownBtn2">增加新用户</div>
</div>

<style type="text/css">
    .passwordbox,.newuserbox{ background-color: #f0f2f5;  height: 100vh;    margin: 0;position: fixed; /* 固定定位，覆盖全屏 */  display: none; /* 默认隐藏 */  width: 100%; /* 宽度100% */  height: 100%; /* 高度100% */  top: 0; /* 顶对齐 */  left: 0; /* 左对齐 */  z-index: 1000; /* 确保遮罩层位于其他内容之上 */}
    .login-container { width:360px; height:320px; margin:0 auto; margin-top:300px;  background-color: white;    padding: 20px;    border-radius: 5px;    box-shadow: 0 0 10px rgba(0,0,0,0.1);}
    .login-container h2{ font-size:26px; text-align:center;}
    .input-group {    margin-bottom: 15px;}
    .input-group label {    display: block;    margin-bottom: 5px;}
    .input-group input {    width: 95%;    padding: 8px;    border: 1px solid #ddd;    border-radius: 3px;}
    button {    width: 100%;    padding: 10px;    background-color: #007bff;    color: white;    border: none;    border-radius: 3px;    cursor: pointer;}
    button:hover {    background-color: #0056b3;}
</style>

<div class="passwordbox" id="dropdownPage1" style="display:none;">
    <div class="login-container">
        <h2>修改密码</h2>
        <form action="/your-login-processing-url" method="post">
            <div class="input-group">
                <label for="username">旧密码</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">新密码</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="password">再次输入新密码</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" id="closeDropdownBtn1">提交更改</button>
        </form>
    </div>
</div>

<div class="newuserbox" id="dropdownPage2" style="display:none;">
    <div class="login-container" style="height:360px;">
        <h2>增加新用户</h2>
        <form action="/your-login-processing-url" method="post">
            <div class="input-group">
                <label for="username">设置用户名</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">设置密码</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="password">再次输入新密码</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <select style="width:120px; height:32px;">
                    <option value="超级管理员">超级管理员</option>
                    <option value="普通用户">普通用户</option>

                </select>
            </div>
            <button type="submit" id="closeDropdownBtn2">提交保存</button>
        </form>
    </div>
</div>

<script type="text/javascript">
    // 控制第一个弹出框
    var showButton1 = document.getElementById('showDropdownBtn1'); // 确保此按钮ID存在并正确
    var dropdownPage1 = document.getElementById('dropdownPage1');
    var closeButton1 = document.getElementById('closeDropdownBtn1');

    showButton1.addEventListener('click', function() {
        dropdownPage1.style.display = 'block';
    });

    closeButton1.addEventListener('click', function() {
        dropdownPage1.style.display = 'none';
    });

    // 控制第二个弹出框
    var showButton2 = document.getElementById('showDropdownBtn2'); // 确保此按钮ID存在并正确
    var dropdownPage2 = document.getElementById('dropdownPage2');
    var closeButton2 = document.getElementById('closeDropdownBtn2');

    showButton2.addEventListener('click', function() {
        dropdownPage2.style.display = 'block';
    });

    closeButton2.addEventListener('click', function() {
        dropdownPage2.style.display = 'none';
    });
</script>

</body>
</html>
