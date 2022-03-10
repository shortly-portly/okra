@props(['to'])

<div class="mb-6">
  <a href={{ $to }} class="bg-purple-600 text-white rounded py-2 px-4 hover:bg-purple-700">
    {{ $slot }}
  </a>
</div>
