<x-layout image="goal.svg" title="New Key Result">
  <section class="px-2 lg:px-6 lg:py-8">
    <div class="flex items-center justify-center">
      <div class="container">
        <div class="bg-gray-100 border border-gray-200 rounded-2xl text-sm mt-4">
          <div class="flex flex-col md:flex-row justify-around md:justify-between p-2">
            <div>
              <span class="font-semibold">Objective:</span> {{ $objective->description }}
            </div>
            <div>
              <span class=" text-purpleish hover:text-pinkish underline">
                <a href="/objective/{{ $objective->id }}">Show Objective</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <main class="mt-3 max-w-3xl mx-auto  bg-gray-100 border border-gray-200 p-6 rounded-xl">
      <form method="POST" action="/objective/{{ $objective->id }}/keyResult" class="mt-10">
        @csrf
        <x-text-input name="description"></x-text-input>
        <x-date-input name="start_date"></x-date-input>
        <x-date-input name="end_date"></x-date-input>
        <div class="flex justify-between">
          <x-submit-button>Create Key Result</x-submit-button>
          <x-cancel-button to="/objective">Cancel</x-cancel-button>
        </div>
      </form>
    </main>
  </section>
</x-layout>
