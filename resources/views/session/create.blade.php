<x-layout image="login.svg" title="Logon">
  <section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
      <h1 class="text-center font-bold text-xl">Log In</h1>
      <form method="POST" action="/login" class="mt-10">
        @csrf
        <x-text-input name="email"></x-text-input>
        <x-password-input name="password"></x-password-input>
        <x-submit-button>Login In</x-submit-button>
      </form>
    </main>
  </section>


</x-layout>
