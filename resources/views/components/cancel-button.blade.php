@props(['to'])

<div class="mb-6">
  <a href="{{ $to }}" class="text-black border border-black rounded py-2 px-4">
    {{ $slot }}
  </a>
</div>
