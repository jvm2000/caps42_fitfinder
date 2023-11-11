<div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <h1>hello</h1>
    <form action="{{ route('generate.contract') }}" method="POST">
        @csrf
        <select id="programs" name="programs">
            <option value="">Select a Program</option>
            @foreach($programs as $program)
            <option value="{{ $program }}">{{ $program }}</option>
        @endforeach
        </select>
         <br>
         <select id="traineeUsername" name="traineeUsername">
            <option value="">Select a Trainee</option>
            @foreach ($first_name as $key => $fname)
                @php
                    $lname = $last_name[$key] ?? ''; // Fetch the corresponding last name
                @endphp
                <option value="{{ $fname . $lname }}">{{ $fname . ' ' . $lname }}</option>
            @endforeach
        </select>
      
        <br>
        <select id="tags" name="tags">
        <option value="">Select an Interest</option>
        @foreach ($tags as $traineeTags)
            <option value="{{ $traineeTags }}">{{ $traineeTags }}</option>
        @endforeach
        </select>
        <br>
        @foreach ($address as $traineeAddress)
            Trainee Address: <input type="text" name="traineeAddress" value="{{ $traineeAddress }}">
        @endforeach
        <br>
        @foreach ($email as $traineeEmailAddress)
            Trainee Email Address: <input type="text" name="traineeEmailAddress" value="{{$traineeEmailAddress}}">
        @endforeach
        <br>
        @foreach($phone_number as $traineePhoneNumber)
            Trainee Phone Number: <input type="text" name="traineePhoneNumber" value="{{$traineePhoneNumber}}">
        @endforeach
        <br>
        <label for="startDate">Start Date:</label>
         <input type="date" id="startDate" name="startDate"><br>

        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate"><br>
         <button type="submit">submit</button>
        <br>
        <!-- Display Trainee Addresses -->


    </form>
        <!-- @if($contract->count())
            @foreach($contract as $contracts)
                <div>
                    <a href="">{{$contracts->user->first_name}} </a>
                    <span>{{$contracts->created_at}}</span>
                    <p>{{$contracts->address}}</p>
                </div>
            @endforeach
         @else
            No contracts
         @endif -->
</div>
