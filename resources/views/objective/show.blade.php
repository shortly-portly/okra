<x-layout image='objective.svg' title="Objective">
  <section class="px-2 lg:px-6 lg:py-8">
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
  </section>
</x-layout>
