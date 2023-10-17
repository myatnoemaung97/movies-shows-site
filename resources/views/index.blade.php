@auth
    <a class="bnt btn-danger" href="/logout">Logout</a>
    @can('admin')
        <a class="bnt btn-danger" href="/admin">Admin</a>
    @endcan

    <p>{{ auth()->user()->username }}</p>
@else
    <a class="bnt btn-primary" href="/login">Login</a>
    <a class="bnt btn-success" href="/register">Register</a>
@endauth
