<form action="/register" method="POST">
    @csrf

    <label>username</label>
    <input type="text" name="username">

    <label>email</label>
    <input type="text" name="email">

    <label>password</label>
    <input type="text" name="password">

    <button>Register</button>
</form>

