<form id="login-form">
    @csrf

    <div class="row">
        <label for="email">
            Email:
            <input type="email" name="email" id="email" required="required"/>
        </label>
    </div>
    <p id="email-error" class="error" style="margin-top: -25px; color: deeppink;"></p>

    <div class="row">
        <label for="password">
            Password:
            <input type="password" name="password" id="password" required="required"/>
        </label>
    </div>
    <p id="password-error" class="error"></p>

    <div class="row">
        <button type="submit">Login</button>
    </div>
</form>
