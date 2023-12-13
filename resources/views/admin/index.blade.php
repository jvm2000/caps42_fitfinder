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
          <p class="text-4xl pt-4 font-semibold">{{ $contracts->count() }} <span class="text-indigo-500">contracts</span></p>
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
            <div id="area-chart"></div>
          </div>
        </div>
        <div class="col-span-2 bg-white shadow-sm rounded-lg px-6 py-4 flex flex-col relative space-y-4">
          <div class="flex items-center w-full relative">
            <p class="text-lg font-semibold mr-auto">Total Comissions Earned</p>
            <p class="text-lg font-semibold">2023</p>
          </div>
          <div style="width: 100%; margin: auto;">
            <div id="commision-chart"></div>
          </div>
        </div>
      </div>
      
      <div class="grid grid-cols-2 gap-x-6 gap-y-4">
        <div class="bg-white shadow-sm rounded-lg px-6 py-4 flex flex-col relative">
          <img src="/icons/admin/analytics/wallet2.svg" alt="" class="w-16 h-16">

          <div class="flex flex-col space-y-3 pt-6">
            <p class="text-lg text-gray-400 font-medium">Transactions Made:</p>
            <p class="text-4xl text-black font-bold">{{ $earnings->count() }} transactions</p>
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

        <div class="bg-white shadow-sm rounded-lg px-6 py-4 flex flex-col relative col-span-2 space-y-4">
          <div class="flex items-center w-full relative">
            <p class="text-lg font-semibold mr-auto">Programs Total Income</p>
          </div>
          <div class="h-36 overflow-y-auto w-full">
            <table class="table-auto w-full">
              <thead>
                <tr>
                  <th class="font-normal text-left">Program</th>
                  <th class="font-normal text-left">Amount</th>
                </tr>
              </thead>
              <tbody>
                @foreach($payments as $payment)
                  <tr class="border-b">
                    <td class="font-normal py-2">{{ $payment->program_name }}</td>
                    <td class="font-normal py-2">{{ $payment->total_amount }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  var coachEarnings = @json($eachEarned);
  var eachCommisioned = @json($eachCommisioned);
  // ApexCharts options and config
  window.addEventListener("load", function() {
    let options = {
      chart: {
        height: "100%",
        maxWidth: "100%",
        type: "area",
        fontFamily: "Inter, sans-serif",
        dropShadow: {
          enabled: false,
        },
        toolbar: {
          show: false,
        },
      },
      tooltip: {
        enabled: true,
        x: {
          show: false,
        },
      },
      fill: {
        type: "gradient",
        gradient: {
          opacityFrom: 0.55,
          opacityTo: 0,
          shade: "#1C64F2",
          gradientToColors: ["#1C64F2"],
        },
      },
      dataLabels: {
        enabled: false,
      },
      stroke: {
        width: 6,
      },
      grid: {
        show: false,
        strokeDashArray: 4,
        padding: {
          left: 2,
          right: 2,
          top: 0
        },
      },
      series: [
        {
          name: "New users",
          data: [0, ...coachEarnings],
          color: "#1A56DB",
        },
      ],
      xaxis: {
        categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
        labels: {
          show: false,
        },
        axisBorder: {
          show: false,
        },
        axisTicks: {
          show: false,
        },
      },
      yaxis: {
        show: false,
      },
    }

    if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
      const chart = new ApexCharts(document.getElementById("area-chart"), options);
      chart.render();
    }
  });

  window.addEventListener("load", function() {
    let options = {
      chart: {
        height: "100%",
        maxWidth: "100%",
        type: "area",
        fontFamily: "Inter, sans-serif",
        dropShadow: {
          enabled: false,
        },
        toolbar: {
          show: false,
        },
      },
      tooltip: {
        enabled: true,
        x: {
          show: false,
        },
      },
      fill: {
        type: "gradient",
        gradient: {
          opacityFrom: 0.55,
          opacityTo: 0,
          shade: "#1C64F2",
          gradientToColors: ["#1C64F2"],
        },
      },
      dataLabels: {
        enabled: false,
      },
      stroke: {
        width: 6,
      },
      grid: {
        show: false,
        strokeDashArray: 4,
        padding: {
          left: 2,
          right: 2,
          top: 0
        },
      },
      series: [
        {
          name: "New users",
          data: [0, ...eachCommisioned],
          color: "#1A56DB",
        },
      ],
      xaxis: {
        categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
        labels: {
          show: false,
        },
        axisBorder: {
          show: false,
        },
        axisTicks: {
          show: false,
        },
      },
      yaxis: {
        show: false,
      },
    }

    if (document.getElementById("commision-chart") && typeof ApexCharts !== 'undefined') {
      const chart = new ApexCharts(document.getElementById("commision-chart"), options);
      chart.render();
    }
  });
</script>