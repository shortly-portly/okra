<x-layout image='key_result.svg' title="Key Result">
  <section class="px-2 lg:px-6 lg:py-8">
    <div class="flex items-center justify-center">
      <div class="container">
        <div class="bg-gray-100 border border-gray-200 rounded-2xl text-sm mt-4">
          <div class="flex flex-col md:flex-row justify-around md:justify-between p-2">
            <div>
              <span class="font-semibold">Objective:</span> {{ $keyResult->objective->description }}
            </div>
            <div>
              <span class=" text-purpleish hover:text-pinkish underline">
                <a href="/objective/{{ $keyResult->objective->id }}">Show Objective</a></span>
            </div>
          </div>
        </div>
        <div class="text-center text-3xl p-4">{{ $keyResult->description }}</div>
        <div class="bg-gray-100 border border-gray-200 rounded-2xl text-sm mt-4">
          <div class="flex flex-col md:flex-row justify-around md:justify-between p-2">
            <div>
              <span class="font-semibold">Status:</span> {{ $keyResult->status }}
            </div>
            <div>
              <span class="font-semibold">Start Date:</span> {{ $keyResult->start_date->format('d M Y') }}
            </div>
            <div>
              <span class="font-semibold">End Date:</span> {{ $keyResult->end_date->format('d M Y') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>
