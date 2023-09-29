@extends('user.layouts.app')
@section('title', 'Profile')
@section('body')
<!-- Body: Body -->
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill mb-0">Profile</h3>
                    </div>
                </div>
            </div>
        </div><!-- Row End -->
        <div class="row g-3">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card teacher-card  mb-3">
                    <div class="card-body  d-flex teacher-fulldeatil">
                        <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-0 text-center w220 mx-sm-0 mx-auto">
                            <a href="#">
                                <img src="{{asset('assets/images/lg/avatar3.jpg')}}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            </a>
                            <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                <h6 class="mb-0 fw-bold d-block fs-6">{{ Auth::user()->occupation }}</h6>
                            </div>
                        </div>
                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <h6 class="mb-0 mt-2  fw-bold d-block fs-6">{{ Auth::user()->name }}</h6>
                            <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted">{{ Auth::user()->occupation }}</span>
                            <p class="mt-2 small">{{ Auth::user()->bio }}</p>
                            <div class="row g-2 pt-2">
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-ui-touch-phone"></i>
                                        <span class="ms-2 small">{{ Auth::user()->phone }} </span>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-email"></i>
                                        <span class="ms-2 small">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-birthday-cake"></i>
                                        <span class="ms-2 small">{{ Auth::user()->dob }}</span>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-address-book"></i>
                                        <span class="ms-2 small">{{ Auth::user()->address }}.</span>
                                    </div>
                                </div>
                            </div><br>
                            <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#edit1"><i class="icofont-edit text-primary fs-6"></i>Edit Profile</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Modal Members-->

<!-- Edit Employee Personal Info-->
<div class="modal fade" id="edit1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="edit1Label"> Personal Informations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="deadline-form">
                    <form action="{{route('edit-profile')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput877" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput977" class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly disabled>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput9777" class="form-label">Bio</label>
                                <textarea class="form-control" name="bio">{{ Auth::user()->bio }}</textarea>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput9777" class="form-label">Occupation</label>
                                <input type="text" class="form-control" name="occupation" value="{{ Auth::user()->occupation }}">
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput9777" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                        <div class="col">
                                <label for="exampleFormControlInput2770" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}">
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput4777" class="form-label">Date of birth</label>
                                <input type="date" class="form-control" name="dob" value="{{ Auth::user()->dob }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                            <button type="button" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
@endsection
@section('js')
<!-- Jquery Core Js -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

<!-- Jquery Page Js -->
<script src="../js/template.js"></script>
@endsection
</body>

</html>