                    <form method="POST" action="{{ route('user.create') }}">
                        @csrf

                        <div class="form-row  mb-4">
                            <label for="fname" class="col-md-3 col-form-label text-md-left">{{ __('First Name') }}<span class="asterick">*</span></label>

                            <div class="col-md-8">
                                <input id="fname" type="text" class="form-control auth-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row  mb-4">
                            <label for="lname" class="col-md-3 col-form-label text-md-left">{{ __('Last Name') }}<span class="asterick">*</span></label>

                            <div class="col-md-8">
                                <input id="lname" type="text" class="form-control auth-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row  mb-4">
                            <label for="email" class="col-md-3 col-form-label text-md-left">{{ __('E-Mail Address') }}<span class="asterick">*</span></label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control auth-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row  mb-4">
                            <label for="password" class="col-md-3 col-form-label text-md-left">{{ __('Password') }}<span class="asterick">*</span></label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control auth-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row  mb-4">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-left">{{ __('Confirm Password') }}<span class="asterick">*</span></label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control auth-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                      <div class="form-group  row form-check text-right">
                            <div class="col-md-11">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1">Please confirm you agree with our <a href="#">terms and conditions</a>.</label>
                        </div>
                      </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-11">
                                <button type="submit" class="btn btn-primary auth-btn float-right">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>