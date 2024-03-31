<!-- resources/views/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <!-- Include your CSS and JS files here -->
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="min-h-screen">
  <header>
    <nav class="bg-gray-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <!-- Your logo here -->
            </div>
          </div>
          <div class="ml-4 flex items-center md:ml-6">
            @auth
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Logout</button>
            </form>
            @endauth
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main class="lg:mx-48 lg:my-24 my-12 mx-4">
    @yield('content')
  </main>

  <footer class="bg-gray-200 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <p class="text-center text-gray-500">Footer</p>
    </div>
  </footer>
</body>

</html>