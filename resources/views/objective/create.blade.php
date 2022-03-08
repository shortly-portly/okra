<x-layout image="goal.svg" title="New Objective">
  <section>
    <main class="mt-3 max-w-3xl mx-auto  bg-gray-100 border border-gray-200 p-6 rounded-xl">
      <form method="POST" action="/objective" class="mt-10">
        @csrf
        <x-text-input name="description"></x-text-input>
        <x-text-input name="start_date"></x-text-input>
        <x-text-input name="end_date"></x-text-input>
        <x-text-input name="next_review_date" optional></x-text-input>
        <x-button>Create Objective</x-button>
      </form>
    </main>
  </section>
</x-layout>
