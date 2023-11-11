<x-layout>
    <x-slot:title>
        FitFinder - Contracts
    </x-slot:title>
    <div class="w-full overflow-y-auto h-[50rem] py-10 px-12">
        <div class="flex items-center relative">
          <p class="text-3xl font-semibold mr-auto">Contracts</p>
          <x-menu-dropdown />
        </div>
        

        <div class="mt-10 w-full gap-x-8 items-center">
            <form action="" method="post">
                <h1>This Contract ("Contract") is made and entered into as of [Date] between:</h1>
                <h2 class="mt-10">Coach Details</h2>
            <p>
                @foreach($first_name as $firstName)
                    {{ $firstName }}
                    @foreach($last_name as $lname)
                        {{$lname}}
                    @endforeach
                    <br>
                @endforeach
        
                @foreach($address as $add)
                    {{ $add }}<br>
                @endforeach
                @foreach($city as $c)
                    {{ $c }}
                @endforeach
                @foreach($province as $p)
                    {{ $p }}
                @endforeach
                @foreach($zip_code as $zip)
                    {{ $zip }}<br>
                @endforeach
                @foreach($phone_number as $pn)
                    {{ $pn }}<br>
                @endforeach
            </p>
            </div>
            <p>and</p>
        
            <h2 class="mt-10">Trainee Details</h2>
            <p>
                {{$traineeUsername}}<br>
                {{$traineeAddress}}<br>
                {{$traineeEmailAddress}}<br>
                {{$traineePhoneNumber}}<br>
            </p>
            <br>
            <p>WHEREAS, @foreach($first_name as $firstName)
                    <strong>{{ $firstName }}</strong>
                @endforeach  provides coaching and training services, and <strong>{{$traineeEmailAddress}}</strong> seeks to engage the Coach to receive coaching and training services;</p>
        
            <p class="mt-10">NOW, THEREFORE, in consideration of the mutual covenants contained herein, the parties agree as
                follows:</p>
        
            <h2 class="mt-10">1. COACHING AND TRAINING SERVICES</h2>
            <p class="mt-10">The Coach agrees to provide coaching and training services to the Trainee. These services may include,
                but are not limited to <strong>{{$programs}}</strong>.</p>
        
            <h2 class="mt-10">2. PAYMENT</h2>
            <p class="mt-10">The Trainee agrees to pay the Coach for the coaching and training services at the rate of [Specify Payment Terms,
                e.g., hourly, per session, or other] as agreed upon between the parties. Payment terms shall be [Specify Payment
                Schedule, e.g., weekly, bi-weekly, or as agreed upon].</p>
        
            <h2 class="mt-10">3. TERM</h2>
            <p class="mt-10">This Contract shall commence on <strong>{{$startDate}}</strong> and continue until terminated by either party with <strong>{{$endDate}}</strong> written notice.</p>
        
            <h2 class="mt-10">4. CONFIDENTIALITY</h2>
            <p class="mt-10">The Coach and Trainee agree to maintain the confidentiality of all information shared during the
                coaching and training sessions and not disclose or use such information for any purpose other than the
                coaching and training.</p>
        
            <h2 class="mt-10">5. TERMINATION</h2>
            <p class="mt-10">Either party may terminate this Contract for any reason by providing written notice as specified in
                Section 3. Termination shall not relieve the parties of their obligations and responsibilities under this
                Contract.</p>
        
            <h2 class="mt-10">6. ENTIRE AGREEMENT</h2>
            <p class="mt-10">This Contract constitutes the entire agreement between the parties and supersedes all prior or
                contemporaneous agreements, understandings, and representations.</p>

            <h2 class="mt-10">DATA PRIVACY</h2> 
            <p class="mt-10">In compliance with the Republic Act 10173 - Data Privacy Act of 20121, the Company is committed to
             protecting and respecting the privacy of the personal data collected from the Trainee. 
             The Company will ensure that all personal data is processed in accordance with the principles of
              transparency, legitimate purpose, and proportionality. </p>
            <p class="mt-10">IN WITNESS WHEREOF, the parties have executed this Contract as of the date first above written.</p>
        
            <h2 class="mt-10"> @foreach($first_name as $firstName)
                    {{ $firstName }}
                @endforeach
                @foreach($last_name as $lname)
                    {{ $lname }}
                @endforeach
            </h2>
            <p class="mt-10">By:  @foreach($first_name as $firstName)
                    {{ $firstName }}
                @endforeach
                @foreach($last_name as $lname)
                    {{ $lname }}
                @endforeach
            <br>
                Date: {{$startDate}}</p>
        
            <h2 class="mt-10">{{$traineeUsername}}</h2>
            <p class="mt-10">By: {{$traineeUsername}}<br>
                Date: {{$startDate}}</p>

                <div class="flex items-center space-x-4 space-y-20">
                    <button type="submit" class="rounded-md flex items-center px-6 py-3 text-md text-white bg-black cursor-pointer active:mt-[1px]"> Submit </button>
                  </div>
        </form>
        </div>





    </div>
</x-layout>




{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaching Contract</title>
</head>

<body>
<form action="" method="post">
        <h1>Contract</h1>
    <h2>Coach Details</h2>
    <p>
        @foreach($first_name as $firstName)
            {{ $firstName }}
            @foreach($last_name as $lname)
                {{$lname}}
            @endforeach
            <br>
        @endforeach

        @foreach($address as $add)
            {{ $add }}<br>
        @endforeach
        @foreach($city as $c)
            {{ $c }}
        @endforeach
        @foreach($province as $p)
            {{ $p }}
        @endforeach
        @foreach($zip_code as $zip)
            {{ $zip }}<br>
        @endforeach
        @foreach($phone_number as $pn)
            {{ $pn }}<br>
        @endforeach
    </p>

    <p>and</p>

    <h2>Trainee Details</h2>
    <p>
        {{$traineeUsername}}<br>
        {{$traineeAddress}}<br>
        {{$traineeEmailAddress}}<br>
        {{$traineePhoneNumber}}<br>
    </p>

    <p>WHEREAS, @foreach($first_name as $firstName)
            <strong>{{ $firstName }}</strong>
        @endforeach  provides coaching and training services, and <strong>{{$traineeEmailAddress}}</strong> seeks to engage the Coach to receive coaching and training services;</p>

    <p>NOW, THEREFORE, in consideration of the mutual covenants contained herein, the parties agree as
        follows:</p>

    <h2>1. COACHING AND TRAINING SERVICES</h2>
    <p>The Coach agrees to provide coaching and training services to the Trainee. These services may include,
        but are not limited to <strong>{{$programs}}</strong>.</p>

    <h2>2. PAYMENT</h2>
    <p>The Trainee agrees to pay the Coach for the coaching and training services at the rate of [Specify Payment Terms,
        e.g., hourly, per session, or other] as agreed upon between the parties. Payment terms shall be [Specify Payment
        Schedule, e.g., weekly, bi-weekly, or as agreed upon].</p>

    <h2>3. TERM</h2>
    <p>This Contract shall commence on <strong>{{$startDate}}</strong> and continue until terminated by either party with <strong>{{$endDate}}</strong> written notice.</p>

    <h2>4. CONFIDENTIALITY</h2>
    <p>The Coach and Trainee agree to maintain the confidentiality of all information shared during the
        coaching and training sessions and not disclose or use such information for any purpose other than the
        coaching and training.</p>

    <h2>5. TERMINATION</h2>
    <p>Either party may terminate this Contract for any reason by providing written notice as specified in
        Section 3. Termination shall not relieve the parties of their obligations and responsibilities under this
        Contract.</p>

    <h2>6. ENTIRE AGREEMENT</h2>
    <p>This Contract constitutes the entire agreement between the parties and supersedes all prior or
        contemporaneous agreements, understandings, and representations.</p>

    <p>IN WITNESS WHEREOF, the parties have executed this Contract as of the date first above written.</p>

    <h2> @foreach($first_name as $firstName)
            {{ $firstName }}
        @endforeach
        @foreach($last_name as $lname)
            {{ $lname }}
        @endforeach
    </h2>
    <p>By:  @foreach($first_name as $firstName)
            {{ $firstName }}
        @endforeach
        @foreach($last_name as $lname)
            {{ $lname }}
        @endforeach
    <br>
        Date: {{$startDate}}</p>

    <h2>{{$traineeUsername}}</h2>
    <p>By: {{$traineeUsername}}<br>
        Date: {{$startDate}}</p>
    <button type="submit" name="submit">Submit</button>
</form>
</body>

</html> --}}
