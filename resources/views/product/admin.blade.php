<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>深信国检珠宝检测鉴定中心</title>
    <link rel="stylesheet" href="{{asset('images/style.css') }}" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{asset('images/layui/css/layui.css')}}">
    <script src="{{asset('images/layui/layui.js')}}"></script>
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
        @foreach ($admins as $item)
        <tr>
            <td>{{$item->username}}</td>
            <td>密码</td>
            <td>{{$item->remark}}</td>
            <td>@if ($item->role == 1)  超级管理员  @else 普通用户  @endif </td>
            <td>
                <a
                    href="javascript:void(0)"
                    class="ajax-link-update"
                    onclick="ajaxlinkupdate('{{$item->id}}')"
                  >更改密码</a>
                &nbsp;&nbsp;
                @if ($item->role == 2 && $user->role == 1)
                    <a
                        href="javascript:void(0)"
                        class="ajax-link-delete"
                        data-url="{{route('product.admin.delete')}}"
                        data-id="{{$item->id}}">删除</a>
                @else

                @endif
            </td>
        </tr>
        @endforeach

    </table>
    <div class="addnew-user" id="showDropdownBtn2">增加新用户</div>
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
        <form  id="updatepassword">
            <div class="input-group">
                <label for="username">旧密码</label>
                <input type="text" id="username" name="old_password" required>
            </div>
            <div class="input-group">
                <label for="password">新密码</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="password">再次输入新密码</label>
                <input type="password" id="password" name="password_confirmed" required>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="update_password_user_id" value="">
            <button type="submit">提交更改</button>
        </form>
    </div>
</div>

<div class="newuserbox" id="dropdownPage2" style="display:none;">
    <div class="login-container" style="height:360px;">
        <h2>增加新用户</h2>
        <form id="adduser" >
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
                <input type="password" id="password" name="password_confirmed" required>
            </div>
            <div class="input-group">
                <label for="remark">备注</label>
                <input type="text" id="remark" name="remark" >
            </div>
            <div class="input-group">
                <select style="width:120px; height:32px;" name="role">
                    <option value="1">超级管理员</option>
                    <option value="2">普通用户</option>
                </select>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit">提交保存</button>
        </form>
    </div>
</div>

<script type="text/javascript">
    // 控制第一个弹出框
    $('#showDropdownBtn2').on('click', function(e) {
        $('#dropdownPage2').show();
    });

    $('#adduser').submit(function(e) {
        e.preventDefault(); // 阻止表单默认提交行为
        var formData = $(this).serialize(); // 序列化表单数据
        $.ajax({
            type: 'POST',
            url: "{{route('product.admin.add')}}", //URL
            data: formData,
            success: function (response) {
                // 成功提交后的回调函数
                console.log(response);
                if (response.status == 200) {
                    layer.msg('提交成功!', {icon: 100, time: 2000});
                    window.location.href = "{{route('product.admin')}}";
                } else {
                    layer.msg('提交失敗：' + response.msg, {icon: 100, time: 2000});
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

    $('#updatepassword').submit(function(e) {
        e.preventDefault(); // 阻止表单默认提交行为
        var formData = $(this).serialize(); // 序列化表单数据
        $.ajax({
            type: 'POST',
            url: "{{route('product.admin.updatepassword')}}", //URL
            data: formData,
            success: function (response) {
                // 成功提交后的回调函数
                console.log(response);
                if (response.status == 200) {
                    layer.msg('提交成功!', {icon: 100, time: 2000});
                    window.location.href = "{{route('product.admin')}}";
                } else {
                    layer.msg('提交失敗：' + response.msg, {icon: 100, time: 2000});
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

    function ajaxlinkupdate(id){
        console.log(id);
        $('#dropdownPage1').show();
        $('#updatepassword input[name="update_password_user_id"]').val(id);
    }
    $('.ajax-link-delete').on('click', function(e) {
        e.preventDefault(); // 阻止默认行为
        var url = $(this).data('url'); // 获取 URL
        var id =  $(this).data('id'); // 获取 URL
        $.ajax({
            url: url,
            method: 'POST', // 或 'POST'，根据你的需求
            data: {
                id: id,
                _token: '{{ csrf_token() }}' // Laravel CSRF 保护
            },
            success: function(response) {
                if (response.status== 200){
                    // 处理成功响应
                    layer.msg(response.msg, {icon:100,time:2000});
                    console.log(response);
                    location.reload();    // 重新加载当前页面
                } else {
                    layer.msg(response.msg, {icon:70,time:2000});
                }
            },
            error: function(xhr) {
                // 处理错误响应
                layer.msg('请求失败', {icon: 2});
                console.log(xhr.responseText);
            }
        });
    });


</script>

</body>
</html>
