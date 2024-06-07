<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>深信国检珠宝检测鉴定中心</title>
    <link rel="stylesheet" href="{{asset('images/style.css')}}" type="text/css">
</head>

<body>

<div class="zsmbdy">
    @for ($i = 0; $i <=8; $i++)
        <div class="zsmbdy-box zzz_{{$i}}" >

            <div class="t1">{{$info->certificate_number}}</div>
            <div class="t2">{{$info->query_code}}</div>
            <div class="t3">{{$info->declaration_name}}</div>
            <div class="t4">{{$info->product_shape}}</div>
            <div class="t5">{{$info->sample_quality}}</div>
            <div class="t6">{{$info->amplification}}</div>
            <div class="t7">{{$info->detection}}</div>
            <div class="t8">{{$info->detection_1}}</div>
            <div class="t9"><img src="{{$imagePath}}" /></div>
            <div class="t10"><img src="{{$qcContent}}" /></div>
        </div>
    @endfor
</div>


</body>
</html>
