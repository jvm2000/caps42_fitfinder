<x-layout>
	{{-- Title  --}}
	<x-slot:title>
			FitFinder - Total Earnings
	</x-slot>
	<div class="w-full py-10 px-12">
		<div class="flex items-center relative">
				<p class="text-3xl font-semibold mr-auto">Total Earnings</p>
				<x-menu-dropdown />
		</div>

		<div class="mt-6 w-full grid place-items-center">
			<div class="max-w-md w-full">
				<div class="flex flex-col">
					<div class="space-y-4 w-full mt-10">
						<div class="space-y-2">
							<span class="text-md text-gray-600 text-left">Number of Transactions made:</span>
							<div class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border-b rounded-md">
									<p>{{ $payments->count() }} transaction/s</p>
							</div>
						</div>

						<div class="space-y-2">
							<span class="text-md text-gray-600 text-left">Overall Earnings:</span>
							<div class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border-b rounded-md">
									<p>P {{ $coachEarnings }}.00</p>
							</div>
						</div>

						<div class="space-y-2">
							<div class="text-md text-gray-600 text-left">Summary</span>
									<div id="area-chart"></div>
							</div>
						</div>
						<div class="space-y-2">
							<table class="w-full table-auto divide-y divide-gray-200">
								<thead>
									<tr>
										<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Trainee</th>
										<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Program</th>
										<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
										<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Payment Type</th>
									</tr>
								</thead>
								<tbody class="bg-white divide-y divide-gray-200">
									@foreach ($payments as $payment)
										<tr>
											<td class="px-6 py-4">{{ $payment->contract->trainee->first_name }} {{ $payment->contract->trainee->last_name }}</td>
											<td class="px-6 py-4">{{ $payment->contract->program->name }}</td>
											<td class="px-6 py-4">{{ $payment->amount }}</td>
											<td class="px-6 py-4">{{ $payment->contract->payment_type }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-layout>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var coachEarnings = @json($eachEarned);
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
            series: [{
                name: "New users",
                data: [0, ...coachEarnings],
                color: "#1A56DB",
            }, ],
            xaxis: {
                categories: ['01 February', '02 February', '03 February', '04 February', '05 February',
                    '06 February', '07 February'
                ],
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
</script>
