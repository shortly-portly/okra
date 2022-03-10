@props(['name' => 'bog', 'optional' => false])
<div class="mb-6">
  <label for="{{ $name }}" class="block mb-2 uppercase font-bold text-xs text-gray-700">
    {{ Str::replace('_', ' ', $name) }}
  </label>
  <input type="date" class="border border-gray-400 bg-white p-2 w-full text-gray-500" name="{{ $name }}"
    id="{{ $name }}" {{ !$optional ? 'required' : '' }} value="{{ old($name) }}">
  @error($name)
    <p class="text-red-500 text-xs mt-2">
      {{ $message }}
    </p>
  @enderror
</div>
