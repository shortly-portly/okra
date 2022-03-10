<x-layout image="goal.svg" title="New Objective">
  <section>
    <main class="mt-3 max-w-3xl mx-auto  bg-gray-100 border border-gray-200 p-6 rounded-xl">
      <form method="POST" action="/objective" class="mt-10">
        @csrf
        <x-text-input name="description"></x-text-input>
        <x-date-input name="start_date"></x-date-input>
        <x-date-input name="end_date"></x-date-input>
        <x-date-input name="next_review_date" optional></x-date-input>
        <div class="flex justify-between">
          <x-submit-button>Create Objective</x-submit-button>
          <x-cancel-button to="/objective">Cancel</x-cancel-button>
        </div>
      </form>
    </main>
  </section>
</x-layout>
