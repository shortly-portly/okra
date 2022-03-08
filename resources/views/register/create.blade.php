<x-layout image="goal.svg" title="Register">
  <section>
    <main class="mt-3 max-w-3xl mx-auto  bg-gray-100 border border-gray-200 p-6 rounded-xl">
      <form method="POST" action="/register" class="mt-10">
        @csrf
        <x-text-input name="name"></x-text-input>
        <x-text-input name="username"></x-text-input>
        <x-text-input name="email"></x-text-input>
        <x-password-input name="password"></x-password-input>
        <x-button>Register</x-button>
      </form>
    </main>
  </section>
</x-layout>
