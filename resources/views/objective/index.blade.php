<x-layout image="objective-list.svg" title="Objective List">
  <section class="px-2 lg:px-6 lg:py-8">

    <div class="flex justify-end">
      <x-button to="/objective/create">New Objective</x-button>
    </div>
    @if ($objectives->count())
      <div class="flex items-center justify-center">
        <div class="container">
          <div class="flex justify-center overflow-auto relative">
            <table class="w-full  sm:bg-white rounded-lg overflow-hidden my-5">
              <thead class="border-b-2 border-gray-400">
                <x-table.primary-header>Description</x-table.primary-header>
                <x-table.primary-header>Status</x-table.primary-header>
                <x-table.secondary-header>Start</x-table.secondary-header>
                <x-table.secondary-header>End</x-table.secondary-header>
                <x-table.secondary-header>Next Review </x-table.secondary-header>
                <x-table.primary-header>Action</x-table.primary-header>
              </thead>
              <tbody>
                @foreach ($objectives as $objective)
                  <tr class="odd:bg-gray-100 border-b-2 border-gray-300 text-sm">
                    <x-table.primary-col>{{ $objective->description }}</x-table.primary-col>
                    <x-table.primary-col>{{ $objective->status }}</x-table.primary-col>
                    <x-table.secondary-col>{{ $objective->start_date->format('d M Y') }}
                    </x-table.secondary-col>
                    <x-table.secondary-col>{{ $objective->end_date->format('d M y') }}</x-table.secondary-col>
                    <x-table.secondary-col>
                      {{ $objective->next_review_date?->format('d M y') }}
                    </x-table.secondary-col>
                    </td>
                    <x-table.primary-col>
                      <span class=" text-indigo-900 hover:text-pinkish hover:underline">
                        <a href="objective/{{ $objective->id }}">Show</a></span>
                      <span class="text-gray-300 hidden lg:inline">|</span>
                      <span class=" text-indigo-900 hover:text-pinkish hover:underline">Edit</span>
                      <span class="text-gray-300 hidden lg:inline">|</span>
                      <span class=" text-indigo-900 hover:text-pinkish hover:underline">Delete</span>
                    </x-table.primary-col>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    @else
      <p class=" text-center">
        No objectives created yet.
      </p>
    @endif
    {{ $objectives->links() }}

  </section>
</x-layout>
