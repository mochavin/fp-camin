<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
  <div class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 shadow-md rounded-md">
      <h1 class="text-2xl font-bold mb-4">Login</h1>
      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
          <label for="email" class="block mb-2">Email</label>
          <input id="email" type="email" name="email" required autofocus class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" style="min-width: 400px;">
        </div>

        <div class="mb-4">
          <label for="password" class="block mb-2">Password</label>
          <input id="password" type="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" style="min-width: 400px;">
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
          Login
        </button>
      </form>

      @if ($errors->any())
      <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
    </div>
  </div>
</body>

</html>