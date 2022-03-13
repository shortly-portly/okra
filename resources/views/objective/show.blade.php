<x-layout image='objective.svg' title="Objective">
  <section class="px-2 lg:px-6 lg:py-8">
    <div class="flex items-center justify-center">
      <div class="container">
        <div class="text-center text-3xl">{{ $objective->description }}</div>
        <div class="bg-gray-100 border border-gray-200 rounded-2xl text-sm mt-4">
          <div class="flex flex-col md:flex-row justify-around md:justify-between p-2">
            <div>
              <span class="font-semibold">Status:</span> {{ $objective->status }}
            </div>
            <div>
              <span class="font-semibold">Start Date:</span> {{ $objective->start_date->format('d M Y') }}
            </div>
            <div>
              <span class="font-semibold">End Date:</span> {{ $objective->end_date->format('d M Y') }}
            </div>
            <div>
              <span class="font-semibold">Next Review Date:</span>
              {{ $objective->next_review_date ? $objective->next_review_date->format('d M Y') : 'None' }}
            </div>
          </div>
          <div class="flex flex-col md:flex-row justify-around md:justify-between p-2">
            <div>
              <span class="font-semibold">Performance Improvement:</span> Yes
            </div>
            <div>
              <span class="font-semibold">Public:</span> No
            </div>
          </div>
        </div>

        <div class="text-center text-3xl mt-8">Key Results</div>

        <div class="text-2xl text-gray-500 text-center">How will I achieve this objective?</div>
        <table class="w-full  sm:bg-white rounded-lg overflow-hidden my-5">
          <thead class="border-b-2 border-gray-400">
            <x-table.primary-header>Description</x-table.primary-header>
            <x-table.primary-header>Status</x-table.primary-header>
            <x-table.primary-header>Action</x-table.primary-header>
          </thead>
          <tbody>
            @foreach ($objective->keyResults as $keyResult)
              <tr class="odd:bg-gray-100 border-b-2 border-gray-300 text-sm">
                <x-table.primary-col>{{ $keyResult->description }}</x-table.primary-col>
                <x-table.primary-col>{{ $keyResult->status }}</x-table.primary-col>
                <x-table.primary-col>
                  <span class=" text-indigo-900 hover:text-pinkish hover:underline">
                    <a href="objective/{{ $objective->id }}">Show</a></span>
                  <span class="text-gray-300 hidden lg:inline">|</span>
                  <span class=" text-indigo-900 hover:text-pinkish hover:underline">
                    <a href="objective/{{ $objective->id }}/edit">Edit</a>
                  </span>
                  <span class="text-gray-300 hidden lg:inline">|</span>
                  <span class=" text-indigo-900 hover:text-pinkish hover:underline">Delete</span>
                </x-table.primary-col>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
</x-layout>
