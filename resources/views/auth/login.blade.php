@extends('auth.layouts.app')
@section('title', 'Login')
@section('body')
                    <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                        <div class="w-100 p-3 p-md-5 card border-0 bg-dark text-light" style="max-width: 32rem;">
                            <!-- Form -->
                            <form class="row g-1 p-3 p-md-4" action="{{route('login')}}" method="POST">
                                @csrf
                                <div class="col-12 text-center mb-1 mb-lg-5">
                                    <h1>Sign in</h1>
                                    <span>Free access to our dashboard.</span>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Email address</label>
                                        <input type="email" class="form-control form-control-lg" name="email" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <div class="form-label">
                                            <span class="d-flex justify-content-between align-items-center">
                                                Password
                                                <a class="text-secondary" href="auth-password-reset.html">Forgot Password?</a>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg" name="password" placeholder="***************">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button class="btn btn-lg btn-block btn-light lift text-uppercase">SIGN IN</button>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <span class="text-muted">Don't have an account yet? <a href="{{route('register')}}" class="text-secondary">Sign up here</a></span>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                </div> <!-- End Row -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<!-- Jquery Core Js -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
@endsection

</body>

</html>