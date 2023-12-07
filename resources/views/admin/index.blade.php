<x-admin-layout header="Dashboard">
  {{-- Title  --}}
  <x-slot:title>
    Admin - Dashboard
  </x-slot>

  <div class="mt-6">
    <div class="grid grid-cols-2 gap-x-6">
      <div class="grid grid-cols-2 gap-4">
        <div class="bg-white shadow-sm rounded-lg px-6 py-4 flex flex-col space-y-4 relative">
          <p class="text-lg font-medium">Trainees</p>
          <p class="text-4xl font-semibold">{{ $trainees->count() }} <span class="text-indigo-500">trainees</span></p>
          <img src="/icons/admin/analytics/trainees.svg" alt="" class="w-16 h-16 absolute top-2 right-12">
        </div>

        <div class="bg-white shadow-sm rounded-lg px-6 py-4 flex flex-col space-y-4 relative">
          <p class="text-lg font-medium">Coaches</p>
          <p class="text-4xl font-semibold">{{ $coaches->count() }} <span class="text-indigo-500">coaches</span></p>
          <img src="/icons/admin/analytics/coaches.svg" alt="" class="w-16 h-16 absolute top-2 right-12">
        </div>

        <div class="bg-white shadow-sm rounded-lg px-6 py-4 flex flex-col space-y-4 relative">
          <p class="text-lg font-medium">Programs</p>
          <p class="text-4xl font-semibold">{{ $programs->count() }} <span class="text-indigo-500">programs</span></p>
          <img src="/icons/admin/analytics/programs.svg" alt="" class="w-16 h-16 absolute top-2 right-12">
        </div>

        <div class="bg-white shadow-sm rounded-lg px-6 py-4 flex flex-col space-y-4 relative">
          <p class="text-lg font-medium">Users</p>
          <p class="text-4xl font-semibold">{{ $users->count() }} <span class="text-indigo-500">users</span></p>
          <img src="/icons/admin/analytics/users.svg" alt="" class="w-16 h-16 absolute top-2 right-12">
        </div>
      </div>
      <div class="grid grid-cols-2 gap-x-6">
        <div class="bg-white shadow-sm rounded-lg px-6 py-4 flex flex-col relative">
          <p class="text-lg font-medium pt-0">Enrollees</p>
          <p class="text-4xl pt-4 font-semibold">{{ $enrollees->count() }} <span class="text-indigo-500">enrolled</span></p>
          <div class="flex items-center space-x-4 absolute left-6 top-36">
            <span class="w-4 h-4 bg-indigo-500"></span>
            <p class="text-sm font-medium">trainees that are enrolled</p>
          </div>
          <div class="relative">
            <!-- Circle Background -->
            <div class="absolute top-0 right-0 bg-gray-300 w-24 h-24 rounded-full"></div>
            
            <!-- Progress Circle Bar -->
            <div class="absolute top-0 right-0 bg-indigo-500 w-24 h-24 rounded-full"
                 style="clip-path: polygon({{$enrollees->count()}}% 0%, 0% 0%, 0% 100%, {{$enrollees->count()}}% 100%);">
            </div>
            
            <!-- Progress Text -->
            <div class="absolute top-0 right-0 flex items-center justify-center w-24 h-24 rounded-full">
                <span class="text-white text-lg font-bold">{{$enrollees->count()}}%</span>
            </div>
          </div>
        </div>

        <div class="bg-white shadow-sm rounded-lg px-6 py-4 flex flex-col relative">
          <p class="text-lg font-medium pt-0">Contracts</p>
          <p class="text-4xl pt-4 font-semibold">{{ $contracts->count() }} <span class="text-indigo-500">enrolled</span></p>
          <div class="flex items-center space-x-4 absolute left-6 top-36">
            <span class="w-4 h-4 bg-red-500"></span>
            <p class="text-sm font-medium w-24">contracts that are currently on</p>
          </div>
          <div class="relative">
            <!-- Circle Background -->
            <div class="absolute top-0 right-0 bg-gray-300 w-24 h-24 rounded-full"></div>
            
            <!-- Progress Circle Bar -->
            <div class="absolute top-0 right-0 bg-red-500 w-24 h-24 rounded-full"
                 style="clip-path: polygon({{$contracts->count()}}% 0%, 0% 0%, 0% 100%, {{$contracts->count()}}% 100%);">
            </div>
            
            <!-- Progress Text -->
            <div class="absolute top-0 right-0 flex items-center justify-center w-24 h-24 rounded-full">
                <span class="text-white text-lg font-bold">{{$enrollees->count()}}%</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-2 gap-x-6 mt-8">
      <div class="flex flex-col space-y-4">
        <div class="col-span-2 bg-white shadow-sm rounded-lg px-6 py-4 flex flex-col relative space-y-4">
          <div class="flex items-center w-full relative">
            <p class="text-lg font-semibold mr-auto">Sales dynamics</p>
            <p class="text-lg font-semibold">2023</p>
          </div>

          <div style="width: 100%; margin: auto;">
            <canvas id="revenueChart"></canvas>
          </div>
        </div>
        <div class="col-span-2 bg-white shadow-sm rounded-lg px-6 py-4 flex flex-col relative space-y-4">
          <div class="flex items-center w-full relative">
            <p class="text-lg font-semibold mr-auto">Overall User Activity</p>
            <p class="text-lg font-semibold">2023</p>
          </div>
        </div>
      </div>
      
      <div class="grid grid-cols-2 gap-x-6">
        <div class="bg-white shadow-sm rounded-lg px-6 py-4 flex flex-col relative">
          <img src="/icons/admin/analytics/wallet2.svg" alt="" class="w-16 h-16">

          <div class="flex flex-col space-y-3 pt-6">
            <p class="text-lg text-gray-400 font-medium">Transactions Made:</p>
            <p class="text-4xl text-black font-bold">{{ $earnings->count() }} transacs</p>
            <p class="text-base text-gray-400">Overall transactions</p>
          </div>
        </div>

        <div class="bg-white shadow-sm rounded-lg px-6 py-4 flex flex-col relative">
          <img src="/icons/admin/analytics/wallet1.svg" alt="" class="w-16 h-16">

          <div class="flex flex-col space-y-3 pt-6">
            <p class="text-lg text-gray-400 font-medium">Commisions Earned:</p>
            <p class="text-4xl text-black font-bold">P{{ $totalEarnings }}.00</p>
            <p class="text-base text-gray-400">Overall FitFinder Earnings</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var months = ['AUG', 'SEP', 'OCT', 'NOV', 'DEC', 'JAN', 'FEB'];
var revenueData = [2000, 3000, 4000, 2500, 3500, 2800, 3200];

var ctx = document.getElementById('revenueChart').getContext('2d');

var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: months,
        datasets: [{
            label: 'Revenue',
            data: revenueData,
            backgroundColor: 'rgba(75, 0, 130, 0.7)',
            borderColor: 'rgba(75, 0, 130, 1)', 
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Revenue ($)'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Months'
                }
            }
        }
    }
});
</script>