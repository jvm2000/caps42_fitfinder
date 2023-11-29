
<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Contracts
  </x-slot>

  <div class="w-full py-10 px-12">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Contracts</p>
      <x-menu-dropdown />
    </div>

		<div class="mt-20 flex flex-col space-y-10">
			<div class="flex items-center relative h-20">
				<div class="flex items-center mr-auto z-20 tab">
					<button 
						id="myButton"
						class="relative px-10 group border-b-8 py-[22px] cursor-pointer hover:border-indigo-400 tablinks" onclick="openTab(event, 'Active')"
					>
						<p class="text-xl font-semibold group-hover:text-indigo-400">Contracts</p>
					</button>

				</div>
				@if (auth()->user()->role === 'Coach')	
				
				<a 
					href="/contracts/make"
					type="submit"
					class="rounded-full flex items-center space-x-4 px-6 py-3 text-md text-white bg-black cursor-pointer w-auto">
					<img src="/icons/programs/plus.svg" class="w-6 h-6">
					<p class="whitespace-nowrap">Create</p>
				</a>
				@endif
				<div class="w-full border-t-8 absolute z-10 bottom-0"></div>

			</div>
		</div>

		{{-- Table  --}}
		<div class="mt-2">
			<div id="Active" class="tabcontent">
				@if($contracts && count($contracts) > 0)
					<table class="w-full table-auto border-spacing-y-6 border-separate">
						<thead>
							<tr>
								<th class="text-xl font-medium text-gray-400 py-4 text-left indent-16">Program's Name</th>
								@if (auth()->user()->role === 'Coach')
								<th class="text-xl font-medium text-gray-400 py-4 text-left">Trainee</th>
								@else
								<th class="text-xl font-medium text-gray-400 py-4 text-left">Coach</th>
								@endif
								<th class="py-4">
									<p class="text-xl font-medium text-gray-400 py-4 text-left w-44">Status</p>
								</th>
								<th class="text-xl font-medium text-gray-400 py-4 text-left">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($contracts as $contract)
								<tr class="">
									<td class="border-l-8 border-indigo-500 py-1">
										<a href="#" id="openModalBtn" class="ml-4 flex items-center space-x-4 group" data-bs-toggle="modal" data-bs-target="#contractDetailsModal">
											<div class="text-left">
												{{$contract->program->name}}
											</div>
										</a>
									</td>
									
									<td class="py-1">
										<p class="text-sm text-ellipsis">{{$contract->trainee->first_name}} {{$contract->trainee->last_name}}</p>
									</td>
									<td class="py-2">
										<p class="text-sm">{{$contract->status}}</p>
									</td>
									
									<td class="py-2">
										<div class="flex items-center space-x-3 relative">
											<a href="" class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
												<img src="/icons/programs/view.svg" alt="" class="w-4 h-4">
											</a>
		
											<a href="" class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
												<img src="/icons/programs/edit.svg" alt="" class="w-4 h-4">
											</a>
										</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					<p>No contracts made yet</p>
				@endif
			</div>
		</div>
  
  @if(session('message'))
    <x-app.toaster message="{{ session('message') }}">
    </x-app.toaster>
  @endif
</x-layout>
{{-- MODAL AS IS --}}
<style>
	.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
	zoom: 1;
  }

  .modal-content {
    font-size: 1em;
    background-color: #fefefe;
    margin: 10% auto;
    border-radius: 20px;
    padding: 20px; 
    width: 80%;
    font-family: 'Arial', sans-serif; /* Choose a suitable font */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: Add a subtle box shadow */
    outline: none; /* Optional: Remove default outline */
}

  /* Style for the close button */
  .close {
	font-size: 1.2em;
    color: #aaa;
    float: right;
    font-size: 24px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: #333;
    text-decoration: none;
    cursor: pointer;
  }

  /* Style for the agreement text */
  .agreement-text {
    font-size: 16px;
    line-height: 1.5;
  }

  /* Style for the buttons */
  .btn-container {
    text-align: center;
    margin-top: 20px;
  }

  .btn {
	font-size: 1em;
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    transition: background-color 0.3s;
  }

  .btn:hover {
    background-color: #0056b3;
  }
  .contract{
	padding: 2em;
	margin:2em;
	border-radius: 20px;
	border: 1px solid rgb(54, 54, 54);
  }
</style>
<div id="myModal" class="modal">
	<div class="modal-content">
	  <span class="close" id="closeModalBtn">&times;</span>
	  <form action="/contracts/contract" method="POST">
		@csrf
		@if(count($requests) > 0)
	  <!-- Modal content goes here -->
	  <div class="contract">
	  <h1>Contract</h1>
    
	  <h2>Coach Details</h2> <br>
	  <p>
		  @foreach($requests as $request)
			  {{ $request->coach->first_name . ' ' . $request->coach->last_name }}<br>
			  {{ $request->coach->address }}<br>
			  {{ $request->coach->city . ' ' . $request->coach->province . ' ' . $request->coach->zip_code }}<br>
			  {{ $request->coach->email }}<br>
			  {{ $request->coach->phone_number }}<br>
		  @endforeach
	  </p>
	  <br>
	  <p>and</p>
	  <br>
	  <h2>Trainee Details</h2>
	  <p>
		{{ $request->requester->first_name . ' ' . $request->requester->last_name }}<br>
		{{ $request->requester->address . ' ' . $request->requester->city }}<br>
	  	{{ $request->requester->email }}<br>
	  	{{ $request->requester->phone_number }}<br>
	  </p>
	  <br>
	  <p>
		  FitFinder, Inc.<br>
		  Sanciangko St, Cebu City, 6000 Cebu<br>
		  Fitfinder@getfit.com
	  </p>
	  <br>
	  <p>WHEREAS, 
		  {{ $request->coach->first_name .''.$request->coach->last_name }}    
		  provides coaching and training services, and 

		{{ $request->requester->first_name . ' ' . $request->requester->last_name }}
		  seeks to engage the Coach to receive coaching and training services;
		  <br> and FitFinder, Inc. FitFinder operates a platform connecting Coaches and Trainees;
	  </p>
	  <br>
	  <p>NOW, THEREFORE, in consideration of the mutual covenants contained herein, the parties agree as
		  follows:</p>
		  <br>
	  <h2>1. COACHING AND TRAINING SERVICES</h2><br>
	  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.1 The Coach agrees to provide coaching and training services to the Trainee. 
		  These services may include, but are not limited to PROGRAM NAME
		  <br>  <br>
		  
	  <h2>2. PAYMENT</h2><br>
	 	  <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.1 The Trainee agrees to compensate the Coach for coaching and training services at the rate of 2000, and the designated payment method is GCash, as agreed upon between the parties.<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.2 FitFinder shall receive a commission of 10% on all payments made by the Trainee to the Coach through the FitFinder platform.</p>
			   <br>
	  <h2>3. TERM</h2><br>
	  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.1 This Contract shall commence on DATE and continue until terminated by either party with DATE written notice.</p>
	  <br>
	  <h2>4. CONFIDENTIALITY</h2><br>
	  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.1 The Coach, Trainee, and FitFinder agree to maintain the confidentiality of all information 
		  shared during the coaching and training sessions and not disclose or use such information for any 
		  purpose other than the coaching and training.</p>
		  <br>
	  <h2>5. DATA PRIVACY</h2><br>
	  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.1 The parties acknowledge and agree that FitFinder may collect, process, and store personal 
		  data as necessary for the provision of services. FitFinder shall implement appropriate data security
		   measures to protect the confidentiality and integrity of personal data.<br>
		   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.2 The parties agree to comply with all applicable data protection laws and regulations.
	   </p>
	   <br>
	  <h2>6. TERMINATION</h2><br>
	  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.1 Either party may terminate this Contract for any reason by providing written notice as specified in Section 3. 
		  Termination shall not relieve the parties of their obligations and responsibilities under this Contract.</p>
		  <br>
	  <h2>7. ENTIRE AGREEMENT</h2><br>
	  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.1 This Contract constitutes the entire agreement between the parties and supersedes all prior or contemporaneous agreements, understandings, and representations.</p><br>
	  <br><p>IN WITNESS WHEREOF, the parties have executed this Contract as of the date first above written.</p>
	  <br>
	
	  <p>By: 
			  {{ $request->coach->first_name .''.$request->coach->last_name }}
			  <br>
	
		  Date:{{$currentDate }} </p>
		  <br> <br>
	  <p>{{ $request->requester->first_name . ' ' . $request->requester->last_name }}<br>
		  Date: {{$currentDate }} </p>
		  <br> <br>
		  <h2>Fitfinder Inc.</h2>
		  <p>By: Fitfinder<br>
			  Date: {{$currentDate }} </p>
			  <br> <br>
			</div>
			  <div style="text-align: center;">
				<button type="submit" name="action" class="btn" value="agree">I Agree</button>
				<button type="submit" name="action" class="btn" value="decline">Decline</button>
			  </div>
			@endif
	  </form>
	  
	
	</div>
  </div>
<script>
var modal = document.getElementById('myModal');
var openModalBtn = document.getElementById('openModalBtn');
var closeModalBtn = document.getElementById('closeModalBtn');

// When the user clicks the button, open the modal
openModalBtn.onclick = function() {
  modal.style.display = 'block';
}

// When the user clicks the close button, close the modal
closeModalBtn.onclick = function() {
  modal.style.display = 'none';
}

// When the user clicks anywhere outside the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
}
</script>