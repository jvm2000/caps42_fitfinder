<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaching Contract</title>
</head>

<body>
<form action="/contracts/send" method="post">
@csrf
<h1>Contract</h1>
    
    <h2>Coach Details</h2>
    <p>
        @foreach($requests as $request)
            {{ $request->coach->first_name . ' ' . $request->coach->last_name }}<br>
            {{ $request->coach->address }}<br>
            {{ $request->coach->city . ' ' . $request->coach->province . ' ' . $request->coach->zip_code }}<br>
            {{ $request->coach->email }}<br>
            {{ $request->coach->phone_number }}<br>
        @endforeach
    </p>

    <p>and</p>

    <h2>Trainee Details</h2>
    <p>
        <label for="traineeUsername">Trainee Name:</label>
        <select id="traineeUsername" name="traineeUsername">
            @foreach ($requests as $request)
                <option value="{{ $request->requester->id }}">{{ $request->requester->first_name . ' ' . $request->requester->last_name }}</option>
            @endforeach
        </select><br>
        <label for="traineeAddress">Trainee Address:</label>
        <input type="text" name="traineeAddress" value="{{ $requests->requester->address . ' ' . $requests->requester->city }}"><br>
        <label for="traineeEmailAddress">Trainee Email Address:</label>
        <input type="text" name="traineeEmailAddress" value="{{ $requests->requester->email }}"><br>
        <label for="traineePhoneNumber">Trainee Phone Number:</label>
        <input type="text" name="traineePhoneNumber" value="{{ $requests->requester->phone_number }}"><br>
    </p>

    <p>
        FitFinder, Inc.<br>
        Sanciangko St, Cebu City, 6000 Cebu<br>
        Fitfinder@getfit.com
    </p>

    <p>WHEREAS, 
        <strong>
            <select id="traineeUsername" name="traineeUsername">
                @foreach ($requests as $request)
                    <option value="{{ $request->requester->id }}">{{ $request->requester->first_name . ' ' . $request->requester->last_name }}</option>
                @endforeach
            </select>
        </strong>
        provides coaching and training services, and 
        <strong>
            <select id="traineeUsername" name="traineeUsername">
                @foreach ($requests as $request)
                    <option value="{{ $request->requester->id }}">{{ $request->requester->first_name . ' ' . $request->requester->last_name }}</option>
                @endforeach
            </select>
        </strong>
        seeks to engage the Coach to receive coaching and training services;
        <br> and FitFinder, Inc. FitFinder operates a platform connecting Coaches and Trainees;
    </p>

    <p>NOW, THEREFORE, in consideration of the mutual covenants contained herein, the parties agree as
        follows:</p>

    <h2>1. COACHING AND TRAINING SERVICES</h2>
    <p>1.1 The Coach agrees to provide coaching and training services to the Trainee. 
        These services may include, but are not limited to <strong><select id="programs" name="programs">
            <option value="">Select a Program</option>
            @foreach($programs as $program)
            <option value="{{ $program->id }}">{{ $program->name }}</option>
        @endforeach
        </select></strong>.</p>
        
    <h2>2. PAYMENT</h2>
    <p> 2.1 The Trainee agrees to pay the Coach for the coaching and training services at the rate of <strong><select id="paymentType" name="paymentType">
         
         <option value="gcash" >GCASH</option>
         <option value="paypal">PAYPAL</option>
         <option value="applepay">APPLEPAY</option>
 </select></strong> as agreed upon between the parties.<br>
       <br> 2.2 FitFinder shall receive a commission of 10% on all payments made by the Trainee to the Coach through the FitFinder platform.</p>

    <h2>3. TERM</h2>
    <p>3.1 This Contract shall commence on <strong>Start Date: </strong><input type="date" id="startDate" name="startDate"><br> and continue until terminated by either party with  <strong>End Date: </strong><input type="date" id="endDate" name="endDate"><br> written notice.</p>

    <h2>4. CONFIDENTIALITY</h2>
    <p>4.1 The Coach, Trainee, and FitFinder agree to maintain the confidentiality of all information 
        shared during the coaching and training sessions and not disclose or use such information for any 
        purpose other than the coaching and training.</p>

    <h2>5. DATA PRIVACY</h2>
    <p>5.1 The parties acknowledge and agree that FitFinder may collect, process, and store personal 
        data as necessary for the provision of services. FitFinder shall implement appropriate data security
         measures to protect the confidentiality and integrity of personal data.<br>
        5.2 The parties agree to comply with all applicable data protection laws and regulations.
     </p>

    <h2>6. TERMINATION</h2>
    <p>6.1 Either party may terminate this Contract for any reason by providing written notice as specified in Section 3. 
        Termination shall not relieve the parties of their obligations and responsibilities under this Contract.</p>
       
    <h2>7. ENTIRE AGREEMENT</h2>
    <p>7.1 This Contract constitutes the entire agreement between the parties and supersedes all prior or contemporaneous agreements, understandings, and representations.</p><br>
    <p>IN WITNESS WHEREOF, the parties have executed this Contract as of the date first above written.</p>

    <h2> @foreach($requests as $request)
            {{ $request->coach->first_name .''.$request->coach->last_name }}
            <br>
        @endforeach
    </h2>
    <p>By:  @foreach($requests as $request)
            {{ $request->coach->first_name .''.$request->coach->last_name }}
            <br>
        @endforeach
    <br>
        Date:{{$currentDate }} </p>

    <p><select id="traineeUsername" name="traineeUsername">
            @foreach ($requests as $request)
                <option value="{{ $request->requester->id }}">{{ $request->requester->first_name . ' ' . $request->requester->last_name }}</option>
            @endforeach
        </select><br>
        Date: {{$currentDate }} </p>
    
        <h2>Fitfinder Inc.</h2>
        <p>By: Fitfinder<br>
            Date: {{$currentDate }} </p>
    <button type="submit" name="submit">Submit</button>
</form>
</body>

</html>