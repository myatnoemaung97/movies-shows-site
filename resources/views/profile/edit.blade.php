<x-layout>
    <?php $user = auth()->user(); ?>
    <x-profile-layout>
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="form-style-1 user-pro">
                <form action="/profile" method="POST" class="user">
                    @csrf
                    @method('PATCH')

                    <h4>01. Profile details</h4>
                    <div class="row">
                        <div class="col-md-6 form-it">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username"
                                   value="{{ old('username') ?? $user->username }}">
                            @error('username')
                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 form-it">
                            <label for="email">Email Address</label>
                            <input type="text" id="email" name="email" value="{{ old('email') ?? $user->email }}">
                            @error('email')
                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <input class="submit" type="submit" value="save">
                        </div>
                    </div>
                </form>
                <form action="/profile" method="POST" class="password">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="password" value="true">

                    <h4>02. Change password</h4>
                    <div class="row">
                        <div class="col-md-6 form-it">
                            <label for="old_password">Old Password</label>
                            <input type="password" id="old_password" name="old_password">
                            @error('old_password')
                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-it">
                            <label for="new_password">New Password</label>
                            <input type="password" id="new_password" name="new_password">
                            @error('new_password')
                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-it">
                            <label for="confirm_password">Confirm New Password</label>
                            <input type="password" id="confirm_password" name="confirm_password">
                            @error('confirm_password')
                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <input class="submit" type="submit" value="change">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-profile-layout>
</x-layout>
