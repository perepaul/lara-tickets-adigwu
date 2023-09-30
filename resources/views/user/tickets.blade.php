@extends('user.layouts.app')
@section('title', 'Tickets')
@section('body')
<!-- Body: Body -->
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Tickets</h3>
                    <div class="col-auto d-flex w-sm-100">
                        @if (Auth::user()->role === App\Enums\UserRoleEnum::COMPLAINANT)
                        <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#tickadd"><i class="icofont-plus-circle me-2 fs-6"></i>Create Tickets</button>
                    </div>
                    @endif
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row clearfix g-3">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Ticket Id</th>
                                    <th>Subject</th>
                                    <th>Author</th>
                                    <th>Created Date</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tickets as $key => $ticket)
                                <tr>
                                    <td>
                                        <a href="{{route('ticket-details', $ticket->id)}}" class="fw-bold text-secondary">{{$ticket->ticketId}}</a>
                                    </td>
                                    <td>
                                        {{$ticket->subject}}
                                    </td>
                                    <td>
                                        <img class="avatar rounded-circle" src="{{asset('assets/images/xs/avatar1.jpg')}}" alt="">
                                        <span class="fw-bold ms-1">{{$ticket->user->name}}</span>
                                    </td>
                                    <td>
                                        {{$ticket->created_at->diffForHumans()}}
                                    </td>
                                    <td><span class="badge @if ($ticket->priority == App\Enums\TicketPriorityEnum::HIGH)
                                           bg-danger
                                           @elseif ($ticket->priority == App\Enums\TicketPriorityEnum::MEDIUM) bg-warning @elseif ($ticket->priority == App\Enums\TicketPriorityEnum::LOW) bg-secondary @endif">{{ucfirst($ticket->priority->value)}}</span></td>
                                    <td><span class="badge @if ($ticket->status == App\Enums\TicketStatusEnum::OPEN)
                                           bg-success
                                           @else bg-danger @endif">{{ucfirst($ticket->status->value)}}</span></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edittickit{{$key}}"><i class="icofont-Eye-Alt text-success"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="edittickit{{$key}}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title  fw-bold" id="edittickitLabel">{{$ticket->subject}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <textarea class="form-control" id="sub1" value="punching time not proper">{{$ticket->body}}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Ticket Available</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
                                    <img class="avatar lg rounded-circle" src="{{asset('assets/images/xs/avatar2.jpg')}}" alt="">
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
                                    <img class="avatar lg rounded-circle" src="{{asset('assets/images/xs/avatar3.jpg')}}" alt="">
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
                                    <img class="avatar lg rounded-circle" src="{{asset('assets/images/xs/avatar8.jpg')}}" alt="">
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

<!-- Add Tickit-->
<div class="modal fade" id="tickadd" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="leaveaddLabel">Create Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create-tickets') }}" method="post">
                    @csrf
                    <div class="my-3">
                        <div class="row col-12">
                            <div class="col-6"><input type="text" class="form-control form-control-lg" name="subject" placeholder="Subject">
                            </div>
                            <div class="col-6"><select class="form-select form-control form-control-lg" name="priority">
                                    <option hidden disabled selected>Select Priority</option>
                                    @foreach (App\Enums\TicketPriorityEnum::cases() as $priority)
                                    <option value="{{ $priority }}">
                                        {{ ucfirst($priority->value) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="my-3">
                        <textarea type="text" class="form-control form-control-lg" name="body"></textarea>
                    </div>
                    <div class="my-3">
                        <input type="file" class="form-control form-control-lg" name="attachment">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                        <button type="submit" class="btn btn-primary">sent</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Tickit-->

</div>
</div>
@endsection
@section('js')
<!-- Jquery Core Js -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

<!-- Plugin Js-->
<script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

<!-- Jquery Page Js -->
<script src="{{asset('assets/template.js')}}"></script>
<script>
    // project data table
    $(document).ready(function() {
        $('#myProjectTable')
            .addClass('nowrap')
            .dataTable({
                responsive: true,
                columnDefs: [{
                    targets: [-1, -3],
                    className: 'dt-body-right'
                }]
            });
        $('.deleterow').on('click', function() {
            var tablename = $(this).closest('table').DataTable();
            tablename
                .row($(this)
                    .parents('tr'))
                .remove()
                .draw();

        });
    });
</script>
@endsection
</body>

</html>