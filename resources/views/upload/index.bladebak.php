<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>深信国检珠宝检测鉴定中心</title>
    <link rel="stylesheet" href="{{asset('images/style.css') }}" type="text/css">
</head>

<body>
<div class="zsmbadmin">

    <div class="zsmbadmin-box">
        <form id="uploadForm" method="post" enctype="multipart/form-data" url="/upload">
        <div class="t1"><input name="certificate_number" type="text" value="A201986"  /></div>
        <div class="t2"><input name="query_code" type="text" value="S12368" /></div>
        <div class="t3"><input name="declaration_ame" type="text" value="沉香" /></div>
        <div class="t4"><input name="product_shape" type="text" value="如图" /></div>
        <div class="t5"><input name="sample_quality" type="text" value="16mm,15.25g" /></div>
        <div class="t6"><input name="amplification" type="text" value="带状薄壁组织" /></div>
        <div class="t7"><input name="detection" type="text" value="瑞香科沉香属" /></div>
        <div class="t8"><input name="t8" type="text" value="Aquilaria sp." /></div>
        <div class="t9">
            <img src="{{asset('images/up1.jpg') }}" />
            <input type="file" id="file" name="upload_image" accept="image/gif, image/jpeg, image/png, image/jpg">
           </div>
        <div class="t10"><a href="#"><img src="{{asset('images//up2.jpg') }}" /></a></div>


            <label for="imageUpload">选择图片:</label>
            <input type="file" id="imageUpload" name="image" accept="image/*" onchange="previewImage(event)">
            <br>
            <img id="imagePreview" class="preview" src="" alt="图片预览">
            <br><br>
            <button type="submit">提交</button>
        </form>

    </div>

</div>
<div class="dyzm">
    <div class="dyzm1"><a href="#">保存上传</a></div>
    <div class="dyzm1 dyzm2"><a href="zsdy.html" target="_blank">打印证书</a></div>
    <div class="dyzm1 dyzm2"><a href="zsdy-bm.html" target="_blank">打印背面</a></div>
</div>

</body>
</html>
