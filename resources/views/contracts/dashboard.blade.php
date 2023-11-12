<x-layout>
    {{-- Title  --}}
    <x-slot:title>
      FitFinder - Dashboard
    </x-slot>
    <div class="w-full py-10 px-12">
      <div class="flex items-center relative">
        <p class="text-3xl font-semibold mr-auto">Dashboard</p>
        <x-menu-dropdown />
      </div>
  
          <div class="mt-20 flex flex-col space-y-10">
              <div class="flex items-center relative h-20">
                  <div class="flex items-center mr-auto z-20 tab">
                      <button 
                          id="myButton"
                          class="relative px-10 group border-b-8 py-[22px] cursor-pointer hover:border-indigo-400 tablinks" onclick="openTab(event, 'Active')"
                      >
                          <p class="text-xl font-semibold group-hover:text-indigo-400">Active</p>
             </div>
             <form action="{{ route('contracts.index') }}" method="POST">
                  <button type="submit"    class="rounded-full flex items-center space-x-4 px-6 py-3 text-md text-white bg-black cursor-pointer w-auto">
                      <img src="/icons/programs/plus.svg" class="w-6 h-6">
                      <p class="whitespace-nowrap">Create Contract</p>
               </button>
            </form>
                  <div class="w-full border-t-8 absolute z-10 bottom-0"></div>
  
              </div>
          </div>
  
              {{-- Table  --}}
          <div class="mt-2">
              <div id="Active" class="tabcontent">
                  <table class="w-full table-auto border-spacing-y-6 border-separate">
                      <thead>
                          <tr>
                              <th class="text-xl font-medium text-gray-400 py-4 text-left indent-16">Trainee<th>
                              <th class="text-xl font-medium text-gray-400 py-4 text-left indent-16">Status</th>
                              <th class="py-4">
                                  <p class="text-xl font-medium text-gray-400 py-4 text-left w-44 indent-16">Update</p>
                              </th>
                          </tr>
                      </thead>
              </div>
            </div>

  </x-layout>


{{-- <div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
    <h1>Dashboard</h1>
    <form action="route {{('contract.index')}}" method="POST">
        @csrf
        <table border="4">
            <button type="submit">CREATE CONTRACT</a></button>
            <thead>
                <tr>
                    <th>TRAINEE</th>
                    <th>STATUS</th>
                    <th>UPDATE</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>Sample</td>
                        <td>Approved</td>
                        <td>Update</td>
                    </tr>
            </tbody>
        </table>
    </form>
</div> --}}