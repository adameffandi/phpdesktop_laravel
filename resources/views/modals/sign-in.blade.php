<!-- The Modal -->
<div class="modal" id="sign-in-modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">User Sign In</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form class="form-horizontal" role="form" method="POST" action="{{ route('user.login') }}">
                  {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class="col-sm-12 col-md-12 control-label">E-Mail Address</label>

                      <div class="col-sm-12 col-md-12">
                          <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                          @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label for="password" class="col-sm-12 col-md-12 control-label">Password</label>

                      <div class="col-sm-12 col-md-12">
                          <input id="password" type="password" class="form-control" name="password" required>

                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  {{-- <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                          <div class="checkbox">
                              <label>
                                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                              </label>
                          </div>
                      </div>
                  </div> --}}

                  <div class="form-group">
                      <div class="col-md-8 col-md-offset-4">
                          <button type="submit" class="btn btn-primary">
                              Login
                          </button>

                          {{-- <a class="btn btn-link" href="{{ url('/password/reset') }}">
                              Forgot Your Password?
                          </a> --}}
                      </div>
                  </div>
              </form>
            </div>

            <!-- Modal footer -->
            {{-- <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Sign In</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div> --}}

        </div>
    </div>
</div>
