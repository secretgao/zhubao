<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>深信国检珠宝检测鉴定中心</title>
    <link rel="stylesheet" href="{{asset('images/style.css') }}" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
<form id="uploadForm">
<div class="zsmbadmin">

    <div class="zsmbadmin-box">

        <div class="t1"><input name="certificate_number" type="text" value="{{ $certificateNumber}}" readonly /></div>
        <div class="t2"><input name="query_code" type="text" value="{{ $queryCode }}" readonly /></div>
        <div class="t3"><input name="declaration_name" type="text" value="沉香" /></div>
        <div class="t4"><input name="product_shape" type="text" value="如图" /></div>
        <div class="t5"><input name="sample_quality" type="text" value="16mm,15.25g" /></div>
        <div class="t6"><input name="amplification" type="text" value="带状薄壁组织" /></div>
        <div class="t7"><input name="detection" type="text" value="瑞香科沉香属" /></div>
        <div class="t8"><input name="detection_1" type="text" value="Aquilaria sp." /></div>
        <div class="t9">

            <input type="file" id="imageUpload" name="image" accept="image/*" onchange="previewImage(event)">
            <br>
            <img id="imagePreview" class="preview" src="{{asset('images/up1.jpg') }}" alt="图片预览">

           </div>
        <div class="t10">
            <img src="{{$qcurl}}">
            <input type="hidden" id="qc" name="qc_content" value="{{$qcurl}}">
        </div>

        <input type="hidden" id="imagePath" name="image_path">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>

</div>
<div class="dyzm">
    <div class="dyzm1"><button type="submit">保存上传</button></div>
    <div class="dyzm1 dyzm2"><a href="zsdy.html" target="_blank">打印证书</a></div>
    <div class="dyzm1 dyzm2"><a href="zsdy-bm.html" target="_blank">打印背面</a></div>
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
            url: '/upload/upload', // 提交到的 URL
            data: formData,
            success: function (response) {
                // 成功提交后的回调函数
                console.log(response);
                if (response.status == 200){
                    alert('表单提交成功!');
                    window.location.href = "/product/index";
                } else {
                    alert('表单提交失敗：'+response.msg);
                }
            },
            error: function () {
                // 提交出错的回调函数
                alert('表单提交失败!');
            }
        });
    })
</script>

