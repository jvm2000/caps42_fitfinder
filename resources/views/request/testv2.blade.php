<div>
  @foreach($requests as $request)
  {{ $request->requester ? $request->requester->first_name : 'No Prerequisite' }}
  {{ $request->coach ? $request->coach->first_name : 'No Prerequisite' }}
  @endforeach
</div>