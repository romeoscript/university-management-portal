
<h2 class="title my-4">Login</h2>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="input form-group mb-3">
        <label for="reg_no">Reg Number</label>
        <input id="reg_no" type="tel" class="form-control" name="reg_no" value="" required>
    </div>

    @if (Session::has('alert'))
        <span><strong class="text-danger">{{ Session::get('alert') }}</strong></span>
    @endif

    @if ($errors->has('reg_no'))
        <span><strong>{{ $errors->first('reg_no') }}</strong></span>
    @endif

    @if ($errors->has('password'))
        <span><strong>{{ $errors->first('password') }}</strong></span>
    @endif
    <div class="input form-group mb-3">
        <label for="password">Password</label>
        <input id="password" class="form-control" type="password" name="password" required
            autocomplete="current-password">
    </div>
    <a href="forgot-password" class="py-3 link-dark">Forgot your password?</a>

    <div class="mt-4">
        <button type="submit" class="px-3 text-center btn btn-dark border-0 bg-theme-2 btn-block">
            <span>Log In</span>
            <i class="fa fa-check"></i>
        </button>
    </div>
</form>