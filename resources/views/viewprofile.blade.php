<x-layout>
    {{-- Title --}}
    <x-slot:title>
        View Profile
    </x-slot>
    <div class="w-full py-14 px-12 relative">
        <div class="flex items-center relative">
            <p class="text-3xl font-semibold mr-auto">View Profile</p>
        </div>

        <div class="p-6">
            <p class="text-2xl font-bold capitalize">
                {{ $user->first_name }} {{ $user->last_name }} 
            </p>
            <p class="text-base text-gray-600">Summary sample</p>
            <p><span class="font-medium">Tags</span>: <span class="font-light">{{ $user->tags }}</span></p>

            <!-- "Send Request" form -->
            <form method="POST" action="{{ route('sendRequest') }}">
                @csrf
                <input type="hidden" name="trainee_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="coach_id" value="{{ $user->id }}">
                <button type="submit" name="sendRequest" class="btn btn-primary">Send Request</button>
            </form>
        </div>
    </div>
</x-layout>
