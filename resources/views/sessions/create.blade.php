<form action="/login" method="POST">
    @csrf

    <label>email</label>
    <input type="text" name="email">

    <label>password</label>
    <input type="text" name="password">

    <button>Login</button>
</form>

