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
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <h1 class="font-weight-bold">GET NOTIFIED WHEN WE WILL LAUNCH!</h1>
            <form method="POST" action="{{ route('comingsoon.store') }}">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="companyname" placeholder="Enter your Company name"
                        value="{{ old('companyname') }}">
                    @if ($errors->has('companyname'))
                        <span class="text-danger">{{ $errors->first('companyname') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Enter your email"
                        value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="tel" class="form-control @error('tel') is-invalid @enderror" name="tel"
                        placeholder="Enter your phone number" value="{{ old('tel') }}">
                    @error('tel')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mb-2 mt-2">Subscribe</button>
            </form>

        </div>
        <div class="col-md-6 text-center">
            <img src="{{ asset('assets/images/Businessman excited to launch new project.png') }}" alt="Illustration"
                class="illustration">
        </div>
    </div>
</body>

</html>
