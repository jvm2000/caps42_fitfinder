<div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <h1>hello</h1>
    <form action="/contracts/make" method="POST">
        @csrf
        <select id="programs" name="programs">
            <option value="">Select a Program</option>
            @foreach($programs as $program)
            <option value="{{ $program->id }}">{{ $program->name }}</option>
        @endforeach
        </select>
         <br>
         <select id="traineeUsername" name="traineeUsername">
            @foreach ($requests as $request)
                <option value="{{ $request->requester->id }}">{{ $request->requester->first_name . ' ' . $request->requester->last_name }}</option>
            @endforeach
        </select>
      
        <br>
       
        @foreach ($requests as $request)
            Trainee Address: <input type="text" name="traineeAddress" value="{{ $request->requester->address.''.$request->requester->city}}">
        @endforeach
        <br>
        @foreach ($requests as $request)
            Trainee Email Address: <input type="text" name="traineeEmailAddress" value="{{$request->requester->email}}">
        @endforeach
        <br>
        @foreach($requests as $request)
            Trainee Phone Number: <input type="text" name="traineePhoneNumber" value="{{$request->requester->phone_number}}">
        @endforeach
        <br>
        <label>Payment Type:</label>
        <select id="paymentType" name="paymentType">
         
                <option value="gcash" >GCASH</option>
                <option value="paypal">PAYPAL</option>
                <option value="applepay">APPLEPAY</option>
        </select><br>
         <label for="startDate">Start Date:</label>
         <input type="date" id="startDate" name="startDate"><br>

        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate"><br>
         <button type="submit">submit</button>
        <br>
        <!-- Display Trainee Addresses -->


    </form>
</div>
