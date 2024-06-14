<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Coming Soon</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background: linear-gradient(to right, #D6F0FF, #FFC5C5);
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .coming-soon-container {
                background: white;
                border-radius: 15px;
                padding: 30px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                max-width: 1000px;
                width: 100%;
            }

            .logo {
                display: flex;
                align-items: center;
            }

            .logo img {
                height: 40px;
                margin-right: 10px;
            }

            .social-icons {
                display: flex;
                justify-content: flex-end;
            }

            .social-icons img {
                height: 20px;
                margin-left: 10px;
            }

            .illustration {
                max-width: 100%;
                height: auto;
            }
        </style>
    </head>

    <body>
        <div class="coming-soon-container row">
            <div class="col-md-6">
                <div class="logo mb-3">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                    {{-- <div>
                    <h5 class="m-0">webtinz</h5>
                    <small>Unlock Your Digital Potential</small>
                </div> --}}
                </div>
                <p class="text-muted">Coming soon</p>
                <h1 class="font-weight-bold">YOUR INFORMATIONS HAS BEEN SUCCESSFUL SENT !
                </h1>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('assets/images/Businessman excited to launch new project.png') }}" alt="Illustration"
                    class="illustration">
            </div>
        </div>
    </body>

    </html>
</body>

</html>
