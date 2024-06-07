<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>深信国检珠宝检测鉴定中心证书查询</title>
    <link rel="stylesheet" href="{{asset('images/style.css') }}" type="text/css">
</head>

<body>

<table width="100%" border="0" style="padding-top:30px;">
    <tr>
        <td align="center" valign="middle" style="padding:0px; background-color: white;"><img src="{{asset('images/y1.jpg') }}" style="width:100%"></td>
    </tr>
    <tr>
</table>

<table width="100%" border="0" style="padding:20px;">
    <tr>
        <td colspan="2" style="border-radius:10px; border:0px solid beige;text-align:center; padding:10px;background-color:cadetblue;color:white;font-size:12pt"><b>深信国检珠宝检测鉴定中心证书查询</b></td>
    </tr>
</table>

<div class="cpimg"><img src="{{$imagePath}}" width="300" height="300" /></div>

<div class="sj_bg">
    <form id="uploadForm">
    <table width="90%" style="margin:0 auto;">
        <tr>
            <td align="left" class="td01">证书编号</td>
            <td class="td02"></td>
            <td align="center" class="td01">{{$info->certificate_number}}</td>
            <input type="hidden" name="certificate_number" value="{{$info->certificate_number}}">
        </tr>
        <tr>
            <td align="left" class="td03">查询编码</td>
            <td class="td02"></td>
            <td align="center" class="td03">{{$info->query_code}}</td>
        </tr>
        <tr>
            <td align="left" class="td01">申报名称</td>
            <td class="td02"></td>
            <td align="center" class="td01">
                <input type="text" name="declaration_name" value="{{$info->declaration_name}}">
            </td>
        </tr>
        <tr>
            <td align="left" class="td03">产品形状</td>
            <td class="td02"></td>
            <td align="center" class="td03">
                <input type="text" name="product_shape" value="{{$info->product_shape}}">
            </td>
        </tr>
        <tr>
            <td align="left" class="td01">样品质量</td>
            <td class="td02"></td>
            <td align="center" class="td01">
                <input type="text" name="sample_quality" value="{{$info->sample_quality}}">
            </td>
        </tr>
        <tr>
            <td align="left" class="td03">放大检测</td>
            <td class="td02"></td>
            <td align="center" class="td03">
                <input type="text" name="amplification" value="{{$info->amplification}}">
            </td>
        </tr>
        <tr>
            <td align="left" class="td01">检测结果</td>
            <td class="td02"></td>
            <td align="center" class="td01">
                <input type="text" name="detection" value="{{$info->detection}}">
            </td>
        </tr>
        <tr>
            <td align="left" class="td03">拉丁名称</td>
            <td class="td02"></td>
            <td align="center" class="td03">
                <input type="text" name="detection_1" value="{{$info->detection_1}}">
            </td>
        </tr>
        <tr>
            <td align="left" class="td01">执行标准</td>
            <td class="td02"></td>
            <td align="center" class="td01">GB/T16552 GB/T16553 GB.T18043</td>
        </tr>
        <tr>
            <td align="left" class="td03">主检</td>
            <td class="td02"></td>
            <td align="center" class="td03">李洁</td>
        </tr>
        <tr>
            <td align="left" class="td01">审核</td>
            <td class="td02"></td>
            <td align="center" class="td01">王福珍</td>
        </tr>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </table>
        <button type="submit">保存</button>
    </form>
</div>

<table width="100%" border="0" style="padding:20px;">
    <tr>
        <td colspan="2" style="border-radius:10px; border:0px solid beige;text-align:center; padding:10px;background:#db0000;color:white;font-size:12pt"><b>本检验证书只对本产品负责，翻印无效。</b></td>
    </tr>
</table>



<div style=" height:500px;"></div>

</body>

<script>

    $('#uploadForm').submit(function(e) {
        e.preventDefault(); // 阻止表单默认提交行为

        var formData = $(this).serialize(); // 序列化表单数据

        $.ajax({
            type: 'POST',
            url: {{route('product.edit')}}, // 提交到的 URL
            data: formData,
            success: function (response) {
                // 成功提交后的回调函数
                console.log(response);
                if (response.status == 200){
                    layer.msg('编辑成功', {icon:100,time:2000});
                    window.location.href = {{route('product.list')}};
                } else {
                    layer.msg('编辑失敗：'+response.msg, {icon:100,time:2000});
                }
            },
            error: function () {
                // 提交出错的回调函数
                alert('表单提交失败!');
            }
        });
    })
</script>
</html>
