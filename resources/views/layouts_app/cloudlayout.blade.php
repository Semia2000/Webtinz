<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Webtinz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    {{-- css links --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/media.css') }}">

    {{-- Add by Archange for preview template --}}
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Liens vers Bootstrap CSS et JavaScript -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    {{-- End Add by Archange for preview template --}}
    @yield('links')
</head>

<body style="background: url('{{ asset('assets/images/bg.png') }}'); background-size: cover; ">

    <main>
        @yield('content')
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <script>
        let timeout;
    
        function resetTimeout() {
            clearTimeout(timeout);
            timeout = setTimeout(logoutUser, 100 * 60 * 1000); // 100 minutes in milliseconds
        }
    
        function logoutUser() {
            fetch('{{ route('logout') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            }).then(response => {
                if (response.ok) {
                    window.location.href = '{{ route('login') }}';
                }
            });
        }
    
        // Reset the timeout on any user activity
        window.onload = resetTimeout;
        document.onmousemove = resetTimeout;
        document.onkeydown = resetTimeout;
        document.onclick = resetTimeout;
        document.onscroll = resetTimeout;
    </script>
    
    @yield('js')
</body>

</html>
