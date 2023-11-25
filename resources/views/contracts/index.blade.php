<div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <h1>hello</h1>
    <form action="{{ route('generate.contract') }}" method="POST">
        @csrf
        <a href="/contracts/make">ADD CONTRACT</a>

    </form>
</div>
