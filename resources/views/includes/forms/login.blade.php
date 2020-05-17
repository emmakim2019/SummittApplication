                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-row mb-4">
                            <label for="email" class="col-md-3 col-form-label text-md-left">{{ __('E-Mail Address') }}<span class="asterick">*</span></label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control auth-control @error('login_email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('login_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <label for="login_password" class="col-md-3 col-form-label text-md-left">{{ __('Password') }}<span class="asterick">*</span></label>

                            <div class="col-md-8">
                                <input id="login_password" type="password" class="form-control auth-control @error('login_password') is-invalid @enderror" name="login_password" required autocomplete="current-password">

                                @error('login_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col-md-11">
                                <div class="form-check float-right">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row  mb-4">
                            <div class="col-md-11">
                                <button type="submit" class="btn btn-primary auth-btn float-right">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row  mb-0">
                            <div class="col-md-11">

                                @if (Route::has('password.request'))
                                    <a class="btn-link float-right text-primary text-right" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>