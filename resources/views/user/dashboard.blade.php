<p> hi, welcome user <b>{{ auth()->user()->name }}</b></p>
<form action="/logout" method="POST">
    @csrf
    <li>
        <button class="button" type="submit">Logout</button>
    </li>
</form>