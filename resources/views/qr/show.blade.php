


<title>QR Code Generator</title>
<meta name="csrf-token" content="{{ csrf_token() }}">



<div id="qrcode-container">
    {!! $qrcode !!}
    <p>Content: {{ $content }}</p>
    <button id="refresh-btn">Refresh QR Code</button>
</div>

<script>
    function attachRefreshListener() {
        document.getElementById('refresh-btn').addEventListener('click', function() {
            fetch('{{ route('qrcode.show') }}', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('qrcode-container').innerHTML = data.qrcode + '<p>Content: ' + data.content + '</p><button id="refresh-btn">Refresh QR Code</button>';
                    attachRefreshListener(); // 重新附加事件监听器
                })
                .catch(error => console.error('Error:', error));
        });
    }

    attachRefreshListener(); // 初始附加事件监听器
</script>

