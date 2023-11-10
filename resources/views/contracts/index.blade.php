<div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <h1>hello</h1>
    <form action="/contracts/make" method="POST">
        @csrf
        <select id="programs" name="programs">
            <option value="">Select a Program</option>
            @foreach($programs as $program)
            <option value="{{ $program }}">{{ $program }}</option>
        @endforeach
        </select>
         <br>
         <select>
            <option value="">Select a Trainee</option>
            @foreach ($trainees as $trainee)
                <option value="{{ $trainee->id }}">{{ $trainee->username }}</option>
            @endforeach
        </select>
        <br>
        <select id="tags" name="tags">
        <option value="">Select a Tag</option>
        @foreach ($tags as $traineeTags)
            <option value="{{ $traineeTags }}">{{ $traineeTags }}</option>
        @endforeach
        </select>
        <br>
        @foreach ($address as $traineeAddress)
            Trainee Address: <input type="text" value="{{ $traineeAddress }}">
        @endforeach
        <br>
        @foreach ($email as $traineeEmailAddress)
            Trainee Email Address: <input type="text" value="{{$traineeEmailAddress}}">
        @endforeach
        <br>
        @foreach($phone_number as $phoneNumber)
            Trainee Phone Number: <input type="text" value="{{$phoneNumber}}">
        @endforeach
        <br>
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
