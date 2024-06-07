<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>深信国检珠宝检测鉴定中心</title>
    <link rel="stylesheet" href="{{asset('images/style.css')}}" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{asset('images/layui/css/layui.css')}}">
    <script src="{{asset('images/layui/layui.js')}}"></script>

</head>

<body>

<style type="text/css">

</style>

<div class="zsdmin_bar">
    <div class="zsdmin_bar_box">
        <a href="/upload/index">上传证书</a>
        <a href="#" style="background:#900;">管理证书</a>
        <a href="zsdy-bm.html" target="_blank" >打印证书背面</a>
    </div>
</div>

<div class="zsmbadmin-list">

    <div class="ser">
        <form method="get" action="/product/index">
        <input class="sertxt" name="certificate_number" type="text" />
        <button class="serbut"  type="submit" >搜索证书</button>
        </form>
    </div>

    <table width="100%" border="0">
        <tr class="row">
            <td width="9%" align="center" valign="middle">选择</td>
            <td width="23%" align="center" valign="middle">证书编号</td>
            <td width="23%" align="center" valign="middle">查询编号</td>
            <td width="19%" align="center" valign="middle">上传日期</td>
            <td width="26%" align="center" valign="middle">操作</td>
        </tr>


        @foreach ($products as $product)
        <tr>
            <td align="center" valign="middle"><input name="name01" type="checkbox" value="{{$product->certificate_number}}" /></td>
            <td align="center" valign="middle">{{$product->certificate_number}}</td>
            <td align="center" valign="middle">{{$product->query_code}}</td>
            <td align="center" valign="middle">{{$product->created_at}}</td>
            <td align="center" valign="middle">
                <a href="/product/detail/{{$product->certificate_number}}" target="_blank">查看</a>
                &nbsp;<a href="{{$product->certificate_number}}" target="_blank">修改</a> &nbsp;
                <a href="javascript:void(0)" class="ajax-link" data-url="{{route('product.delete')}}" data-certificate_number="{{$product->certificate_number}}">删除</a> &nbsp;
                <a href="zsdy-admin.html" target="_blank">打印</a>
            </td>
        </tr>
        @endforeach

    </table>

    <div class="yecode"><a href="#">全选</a>&nbsp; <a href="#">删除</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">下一页</a>&nbsp;&nbsp;&nbsp; <a href="#">上一页</a> &nbsp;&nbsp;&nbsp;跳转至&nbsp;<input class="yeipt" type="text" />&nbsp;页</div>
    {{ $products->links()}}
</div>
@if(!empty(session('detail')))
    <script>
        layer.alert("{{ session('detail') }}",{icon:6,time:2000});
    </script>
@endif
</body>

<script>
    $(document).ready(function() {
        $('.ajax-link').on('click', function(e) {
            e.preventDefault(); // 阻止默认行为

            var url = $(this).data('url'); // 获取 URL
            var certificate_number =  $(this).data('certificate_number'); // 获取 URL
            $.ajax({
                url: url,
                method: 'POST', // 或 'POST'，根据你的需求
                data: {
                    certificate_number: certificate_number,
                    _token: '{{ csrf_token() }}' // Laravel CSRF 保护
                },
                success: function(response) {
                    if (response.status== 200){
                        // 处理成功响应
                        layer.msg(response.msg, {icon:100,time:2000});
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
    });
</script>
</html>
