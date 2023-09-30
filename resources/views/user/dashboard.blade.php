@extends('user.layouts.app')
@section('title', 'Dashboard')
@section('body')
<!-- Body: Body -->
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row g-3 mb-3 row-deck">
            <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="card ">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar lg  rounded-1 no-thumbnail bg-warning color-defult"><i class="bi bi-journal-check fs-4"></i></div>
                            <div class="flex-fill ms-4">
                                <div class="">Total Tickets</div>
                                <h5 class="mb-0 ">{{$totalTickets}}</h5>
                            </div>
                            <a href="task.html" title="view-members" class="btn btn-link text-decoration-none  rounded-1"><i class="icofont-hand-drawn-right fs-2 "></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="card ">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar lg  rounded-1 no-thumbnail bg-success color-defult"><i class="bi bi-list-check fs-4"></i></div>
                            <div class="flex-fill ms-4">
                                <div class="">Open Tickets</div>
                                <h5 class="mb-0 ">{{ $openTickets }}</h5>
                            </div>
                            <a href="task.html" title="space-used" class="btn btn-link text-decoration-none  rounded-1"><i class="icofont-hand-drawn-right fs-2 "></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="card ">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar lg  rounded-1 no-thumbnail bg-danger color-defult"><i class="bi bi-clipboard-data fs-4"></i></div>
                            <div class="flex-fill ms-4">
                                <div class="">Closed Tickets</div>
                                <h5 class="mb-0 ">{{ $closedTickets }}</h5>
                            </div>
                            <a href="task.html" title="renewal-date" class="btn btn-link text-decoration-none  rounded-1"><i class="icofont-hand-drawn-right fs-2 "></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Row End -->
        <div class="row g-3 mb-3 row-deck">
            @if (Auth::user()->role === App\Enums\UserRoleEnum::AGENT)
            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                @else
                <div class="col-md-12 col-lg-8 col-xl-7 col-xxl-7">
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-5 col-lg-6 order-md-2 ">
                                    <div class="text-center p-4">
                                        <img src="assets/images/task-view.svg" alt="..." class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 col-lg-6 order-md-1 px-4">
                                    <h3 class="fw-bold ">Welcome 👋</h3>
                                    <p class="line-height-custom">Welcome back. We are super glad to have you back</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (Auth::user()->role === App\Enums\UserRoleEnum::COMPLAINANT)
                <div class="col-md-12 col-lg-4 col-xl-5 col-xxl-5">
                    <div class="alert alert-primary p-3 mb-0 w-100">
                        <h6 class="fw-bold mb-1">Need Help?</h6>
                        <p class="small mb-4">Create a ticket and get the help you need</p>
                        <form action="{{ route('create-tickets') }}" method="post">
                            @csrf
                            <div class="my-3">
                                <div class="row col-12">
                                    <div class="col-6"><input type="text" class="form-control form-control-lg" name="subject" placeholder="Subject"></div>
                                    <div class="col-6"><select class="form-select form-control form-control-lg" name="priority">
                                            <option hidden disabled selected>Select Priority</option>
                                            @foreach (App\Enums\TicketPriorityEnum::cases() as $priority)
                                            <option value="{{ $priority }}">
                                                {{ ucfirst($priority->value) }}
                                            </option>
                                            @endforeach
                                        </select></div>
                                </div>
                            </div>
                            <div class="my-3">
                                <textarea type="text" class="form-control form-control-lg" name="body"></textarea>
                            </div>
                            <div class="my-3">
                                <input type="file" class="form-control form-control-lg" name="attachment">
                            </div>
                            <button class="btn btn-primary mt-2">Create Ticket</button>
                        </form>
                    </div>
                </div>
                @endif
            </div><!-- Row End -->
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

<!-- Plugin Js-->
<script src="{{asset('assets/bundles/apexcharts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

<!-- Jquery Page Js -->
<script src="../js/template.js"></script>
<script src="../js/page/index.js"></script>
@endsection

</body>

</html>