<head>
  <title>Register</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
  <div class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 shadow-md rounded-md">
      <h1 class="text-2xl font-bold mb-4">Register</h1>

      <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" style="min-width: 400px;" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" style="min-width: 400px;" name="email" value="{{ old('email') }}" required autocomplete="email">

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" style="min-width: 400px;" name="password" required autocomplete="new-password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" style="min-width: 400px;" name="password_confirmation" required autocomplete="new-password">
            </div>
          </div>

          <button type="submit" class="w-full mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
            register
          </button>

          <div class="mt-4">
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>
  </div>
</body>