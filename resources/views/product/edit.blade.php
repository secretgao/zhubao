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

<body>
<form id="uploadForm">
<div class="zsmbadmin">

    <div class="zsmbadmin-box">
        <div class="t1">
            标识备注
            <input name="remark" type="text" value="{{$info->remark}}"  />
        </div>
        <div class="t1">
            {{$info->certificate_number}}
            <input name="certificate_number" type="hidden" value="{{$info->certificate_number}}"  />
        </div>
        <div class="t2">
            {{$info->query_code}}
        </div>
        <div class="t3"><input name="declaration_name" type="text" value="{{$info->declaration_name}}" /></div>
        <div class="t4"><input name="product_shape" type="text" value="{{$info->product_shape}}" /></div>
        <div class="t5"><input name="sample_quality" type="text" value="{{$info->sample_quality}}" /></div>
        <div class="t6"><input name="amplification" type="text" value="{{$info->amplification}}" /></div>
        <div class="t7"><input name="detection" type="text" value="{{$info->detection}}" /></div>
        <div class="t8"><input name="detection_1" type="text" value="{{$info->detection_1}}" /></div>
        <div class="t9">
            <img id="imagePreview" class="preview" src="{{$imagePath}}" alt="图片预览">
			<input type="file" id="imageUpload" name="image" accept="image/*" onchange="previewImage(event)" style="width:200px; height:32px; border:none; color:#F00; margin-top:2px;">
           </div>
        <div class="t10">
            <img src="{{$info->qc_content}}">
        </div>

        <input type="hidden" id="imagePath" name="image_path" value="{{$info->image_path}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>

</div>
<div class="dyzm">
    <div class="dyzm1"><button type="submit" style="width:120px; height:60px; background-color:#666; float:left;text-align: center; line-height:60px; color:#FFF; font-weight:bold; border:0px; color:#FFF; font-size:18px; cursor:pointer;">保存修改</button></div>
</div>
</form>

</body>
</html>
<script>

    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function(){
            const dataURL = reader.result;
            const output = document.getElementById('imagePreview');
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);

        var formData = new FormData();
        var imageFile = $('#imageUpload')[0].files[0];
        var token = $('#uploadForm input[name="_token"]').val();

        formData.append('image', imageFile);
        formData.append('_token', token);
        $.ajax({
            url: '/upload/file', // 替换为你的服务器端点
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log('Success:', response);
                $('#imagePath').val(response.path)
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    }
    $('#uploadForm').submit(function(e) {
        e.preventDefault(); // 阻止表单默认提交行为
        var formData = $(this).serialize(); // 序列化表单数据
        $.ajax({
            type: 'POST',
            url: "{{route('product.update')}}", //URL
            data: formData,
            success: function (response) {
                // 成功提交后的回调函数
                console.log(response);
                if (response.status == 200){
                    layer.msg('提交成功!', {icon:100,time:2000});
                    window.location.href = "{{route('product.list')}}";
                } else {
                    layer.msg('提交失敗：'+response.msg, {icon:100,time:2000});
                }
            },
            error: function () {
                alert('表单提交失败!');
            }
        });
    })
</script>

