<div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <h1>hello</h1>
    <form action="{{route('contracts')}}" method="POST">
        @csrf
         Enter Address <input type="text" name="address" id="address">
         <br>
         <select>
            <option value="">Select a Trainee</option>
            @foreach ($trainees as $trainee)
                <option value="{{ $trainee->id }}">{{ $trainee->username }}</option>
            @endforeach
        </select>
        <p>{{$address}}</p>
         <button type="submit">submit</button>
        <br>
        
    </form>
        @if($contract->count())
            @foreach($contract as $contracts)
                <div>
                    <a href="">{{$contracts->user->first_name}} </a>
                    <span>{{$contracts->created_at}}</span>
                    <p>{{$contracts->address}}</p>
                </div>
            @endforeach
         @else
            No contracts
         @endif
</div>
