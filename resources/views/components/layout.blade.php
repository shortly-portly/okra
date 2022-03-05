@props(['image'])

<!doctype html>

<title>Okra</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" defer></script>


<body style="font-family: Open Sans, sans-serif">
  <div class="flex flex-col h-screen">
    <header class="px-6 py-8">
      <nav class="md:flex md:justify-between md:items-center">
        <div>
          <a href="/">
            <img src="/images/{{ $image }}" alt="Okra Logo" class="w-40 h-40">
          </a>
        </div>
        <div class="text-2xl">Okra</div>
        <div class="mt-8 md:mt-0 flex items-center">
          @auth
            <span class="text-xs font-bold uppercase">Welcome {{ auth()->user()->name }}!</span>
            <form action="/logout" method="POST" class="text-sm font-semibold text-purple-900 ml-6">
              @csrf
              <button type="submit">Log Out</button>
            </form>
          @else
            <a href="/register" class="text-sm font-bold uppercase">Register</a>
            <a href="/login" class="text-sm font-bold uppercase ml-6">Login</a>
          @endauth

        </div>
      </nav>
    </header>

    <div class="grow">
      {{ $slot }}
    </div>
    <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-6 mt-16">
      Copyright 2022
    </footer>
    @if (session()->has('success'))
      <div x-data="{show: true}" x-init="setTimeout(()=> show=false, 4000)"
        class="fixed bg-purple-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm" x-show="show">
        <p>{{ session('success') }}</p>
      </div>
    @endif
  </div>
</body>
