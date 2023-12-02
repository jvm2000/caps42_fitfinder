<x-layout>
	{{-- Title  --}}
	<x-slot:title>
		FitFinder - Programs
	</x-slot>
	<div class="w-full py-10 px-12">
		<div class="flex items-center relative">
			<p class="text-3xl font-semibold mr-auto">Programs</p>
			<div class="flex items-center space-x-4">
				<div class="">
					<x-notification-component />
				</div>
				<div>
					<x-menu-dropdown />
				</div>
			</div>
		</div>

    <div class="mt-20 flex flex-col space-y-10">
			<div class="flex items-center relative h-20">
				<div class="flex items-center mr-auto z-20 tab">
					<button 
						id="myButton"
						class="relative px-10 group border-b-8 py-[22px] cursor-pointer border-indigo-400 tablinks"
					>
						<p class="text-xl font-semibold text-indigo-400">List</p>
					</button>
        </div>

				<div class="w-full border-t-8 absolute z-10 bottom-0"></div>
      </div>
    </div>

    <div class="mt-2">
			<div class="tabcontent">
				<table class="w-full table-auto border-spacing-y-6 border-separate">
					<thead>
						<tr>
							<th class="text-xl font-medium text-gray-400 py-4 text-left indent-16">Program's Info</th>
							<th class="text-xl font-medium text-gray-400 py-4 text-left">Coach</th>
							<th class="py-4">
								<p class="text-xl font-medium text-gray-400 py-4 text-left w-44">Status</p>
							</th>
							<th class="text-xl font-medium text-gray-400 py-4 text-left">Action</th>
							
						</tr>
					</thead>
          <tbody>
            @foreach($enrolled as $index => $enrollee)
							<tr class="">
								<td class="border-l-8 border-indigo-500 py-1">
									<a href="/progress/show/{{$enrollee->id}}" class="ml-4 flex items-center space-x-4 group">
										<img src="{{$enrollee->program->getImageURL()}}" class="w-9 h-9 rounded-full">
										<div class="text-left">
											<div class="flex items-center space-x-4">
												<p class="text-black text-sm font-medium group-hover:text-indigo-400">{{$enrollee->program->name}}</p>
												<div class="px-2 py-0 rounded-full
												@if ($enrollee->program->prerequisite)
														bg-indigo-200 border border-dashed border-indigo-800 text-indigo-800
												@else
														bg-red-200 border border-dashed border-red-800 text-red-800
												@endif
												text-xs">
												{{ $enrollee->program->prerequisite ? $enrollee->program->prerequisite->name : 'No Prerequisite' }}
												</div>
											</div>
											<p class="text-xs text-zinc-400">{{$enrollee->program->category}}</p>
										</div>
									</a>
								</td>

								<td class="py-1">
									<p class="text-sm text-ellipsis capitalize">{{$enrollee->trainee->first_name}} {{$enrollee->trainee->last_name}}</p>
								</td>
								<td class="py-2">
									@if($enrollee->completion === 1)
									<p class="text-sm text-ellipsis">Completed</p>
									@else
									<p class="text-sm text-ellipsis">Ongoing</p>
									@endif
								</td>

								<td class="py-2">
									<div class="flex items-center space-x-3 relative">
                  
									</div>
								</td>
							</tr>
						@endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-layout>