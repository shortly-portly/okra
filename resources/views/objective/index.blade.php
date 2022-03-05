<x-layout image="objective-list.svg">
  <section class="px-6 py-8">
    @if ($objectives->count())
      <div class="flex items-center justify-center">
        <div class="container">
          <div class="flex justify-center overflow-auto relative">
            <table class="w-full  sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
              <thead class="border-b-2 border-gray-400">
                <th class="uppercase font-semibold text-left whitespace-nowrap lg:p-3">
                  Description
                </th>
                <th class="uppercase font-semibold text-left whitespace-nowrap lg:p-3">
                  Status
                </th>
                <th class="uppercase font-semibold text-left hidden lg:p-3 whitespace-nowrap lg:table-cell">
                  Start Date
                </th>
                <th class="uppercase font-semibold text-left hidden lg:p-3 whitespace-nowrap lg:table-cell">
                  End Date
                </th>
                <th class="uppercase font-semibold text-left hidden lg:p-3 whitespace-nowrap lg:table-cell">
                  Action
                </th>
              </thead>
              <tbody>
                @foreach ($objectives as $objective)
                  <tr class="odd:bg-gray-100 border-b-2 border-gray-300 text-sm">
                    <td class="whitespace-nowrap lg:py-3 lg:px-2">{{ $objective->description }}</td>
                    <td class="whitespace-nowrap lg:py-3 lg:px-2">{{ $objective->status }}</td>
                    <td class="whitespace-nowrap  lg:py-3 lg:px- 2 hidden lg:table-cell">Tue 23 March 2022</td>
                    <td class="py-3 px-2 whitespace-nowrap hidden lg:py-2 lg:px-2 lg:table-cell">Thu 09 October 2022
                    </td>
                    <td class="lg:px-2 whitespace-nowrap">
                      <span class=" text-indigo-500 hover:text-indigo-700">Show</span>
                      <span class="text-gray-300 hidden lg:inline">|</span>
                      <span class=" text-indigo-500 hover:text-indigo-700">Edit</span>
                      <span class="text-gray-300 hidden lg:inline">|</span>
                      <span class=" text-indigo-500 hover:text-indigo-700">Delete</span>

                    </td>
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




    <style>
      html,
      body {
        height: 100%;
      }

      @media (min-width: 640px) {
        table {
          display: inline-table !important;
        }

        thead tr:not(:first-child) {
          display: none;
        }
      }

      td:not(:last-child) {
        border-bottom: 0;
      }

      th:not(:last-child) {
        border-bottom: 2px solid rgba(0, 0, 0, .1);
      }

    </style>
  </section>


</x-layout>
