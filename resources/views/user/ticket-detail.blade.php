@extends('user.layouts.app')
@section('title', 'Ticket Details')
@section('body')
<!-- Body: Body -->
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Tickets Detail</h3>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row g-3">
            <div class="col-xxl-8 col-xl-8 col-lg-12 col-md-12">
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar lg  rounded-1 no-thumbnail bg-lightyellow color-defult"><i class="icofont-optic fs-4"></i></div>
                                    <div class="flex-fill ms-4 text-truncate">
                                        <div class="text-truncate">Status</div>
                                        <span class="badge bg-warning">{{ $ticket->status }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar lg  rounded-1 no-thumbnail bg-lightblue color-defult"><i class="icofont-user fs-4"></i></div>
                                    <div class="flex-fill ms-4 text-truncate">
                                        <div class="text-truncate">Author Name</div>
                                        <span class="fw-bold">{{ $ticket->user->name }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar lg  rounded-1 no-thumbnail bg-lightgreen color-defult"><i class="icofont-price fs-4"></i></div>
                                    <div class="flex-fill ms-4 text-truncate">
                                        <div class="text-truncate">Priority</div>
                                        <span class="badge bg-danger">{{ $ticket->priority }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Row end  -->
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3 text-danger">{{ $ticket->subject }}</h6>
                                {{ $ticket->body }}
                            </div>
                        </div>
                        <!--  -->
                    </div>
                </div> <!-- Row end  -->
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body card-body-height py-4">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <!-- Card End -->
                                <ul class="list-unstyled res-set">
                                    <li class="card mb-2">
                                        <div class="card-body">
                                            <div class="timeline-item-post">
                                                <div class="mb-2 mt-4">
                                                    <a class="me-lg-4 me-2 text-primary" href="#"><i class="icofont-speech-comments"></i> Comment</a>
                                                </div>
                                                <div>
                                                @foreach($ticket->comments as $comment)
                                                    <div class="d-flex mt-3 pt-3 border-top">
                                                        <img class="avatar rounded-circle" src="{{asset('assets/images/xs/avatar2.jpg')}}" alt="">
                                                        <div class="flex-fill ms-3">
                                                            <p class="mb-0"><span>{{ $comment->user->name}}</span> <small class="msg-time">{{ $comment->created_at->diffForHumans()}}</small></p>
                                                            <span class="text-muted">{{ $comment->text}}</span>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group mt-4">
                                                <form action="{{ route('create-comments', $ticket->id) }}" method="post">
                                                    @csrf
                                                    <textarea class="form-control" name="text" placeholder="Type a comment"></textarea>
                                                    <button class="btn btn-primary float-sm-end  mt-5 mt-sm-0">Sent</button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Card End -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Members-->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="addUserLabel">Employee Invitation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="inviteby_email">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email address" id="exampleInputEmail1" aria-describedby="exampleInputEmail1">
                        <button class="btn btn-dark" type="button" id="button-addon2">Sent</button>
                    </div>
                </div>
                <div class="members_list">
                    <h6 class="fw-bold ">Employee </h6>
                    <ul class="list-unstyled list-group list-group-custom list-group-flush mb-0">
                        <li class="list-group-item py-3 text-center text-md-start">
                            <div class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                                <div class="no-thumbnail mb-2 mb-md-0">
                                    <img class="avatar lg rounded-circle" src="assets/images/xs/avatar2.jpg" alt="">
                                </div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <h6 class="mb-0  fw-bold">Rachel Carr(you)</h6>
                                    <span class="text-muted">rachel.carr@gmail.com</span>
                                </div>
                                <div class="members-action">
                                    <span class="members-role ">Admin</span>
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="icofont-ui-settings  fs-6"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="icofont-ui-password fs-6 me-2"></i>ResetPassword</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="icofont-chart-line fs-6 me-2"></i>ActivityReport</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item py-3 text-center text-md-start">
                            <div class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                                <div class="no-thumbnail mb-2 mb-md-0">
                                    <img class="avatar lg rounded-circle" src="assets/images/xs/avatar3.jpg" alt="">
                                </div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <h6 class="mb-0  fw-bold">Lucas Baker<a href="#" class="link-secondary ms-2">(Resend invitation)</a></h6>
                                    <span class="text-muted">lucas.baker@gmail.com</span>
                                </div>
                                <div class="members-action">
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Members
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="icofont-check-circled"></i>

                                                    <span>All operations permission</span>
                                                </a>

                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fs-6 p-2 me-1"></i>
                                                    <span>Only Invite & manage team</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="icofont-ui-settings  fs-6"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="icofont-delete-alt fs-6 me-2"></i>Delete Member</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item py-3 text-center text-md-start">
                            <div class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                                <div class="no-thumbnail mb-2 mb-md-0">
                                    <img class="avatar lg rounded-circle" src="assets/images/xs/avatar8.jpg" alt="">
                                </div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <h6 class="mb-0  fw-bold">Una Coleman</h6>
                                    <span class="text-muted">una.coleman@gmail.com</span>
                                </div>
                                <div class="members-action">
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Members
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="icofont-check-circled"></i>

                                                    <span>All operations permission</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fs-6 p-2 me-1"></i>
                                                    <span>Only Invite & manage team</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="icofont-ui-settings  fs-6"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#"><i class="icofont-ui-password fs-6 me-2"></i>ResetPassword</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="icofont-chart-line fs-6 me-2"></i>ActivityReport</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="icofont-delete-alt fs-6 me-2"></i>Suspend member</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="icofont-not-allowed fs-6 me-2"></i>Delete Member</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
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