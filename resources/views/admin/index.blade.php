@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif


    <table class="table table-striped" id="address_type_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>firstname</th>
                            <th>lastname</th>
                            <th>age</th>
                            <th>phone</th>
                            <th>gender</th>
                            <th>date</th>
                            <th>Status</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $attendance)
                            <tr>
                               <td>{{ $attendance->id}}
                            <!--  @for ($i = 0; $i < 1; $i++)
                                <p>{{ $i }}</p>
                                @endfor -->


                            </td>
                            <td>{{ $attendance->firstname }}</td>
                            <td>{{ $attendance->lastname }}</td>
                            <td>{{ $attendance->age }}</td>
                            <td>{{ $attendance->phone }}</td>
                            <td>{{ $attendance->gender }}</td>
                            <td>{{ $attendance->date }}</td>
                            <td>
                            @if(($attendance->is_approved)=='0')
                            <p>Pending</p>
                            @else<p>Approved</p>
                            @endif
                            </td>  <td>
                            @if(($attendance->is_approved)=='0')
                            <a href="{{route('admin.admin.approve', $attendance->id)}}" class="btn btn-success">Approve</a> <!-- //pass the id here -->
                        <a href="{{route('admin.admin.decline', $attendance->id)}}" class="btn btn-danger">Decline</a>
                            @else
                            <a href="{{route('admin.admin.decline', $attendance->id)}}" class="btn btn-danger">Decline</a>
                            @endif
                        </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    <script>
        $(document).ready(function() {
            var table = $('#address_type_table').DataTable({
                paging: true,
                info: false,
                colReorder: true,
                dom: '<"wrapper clearfix"Bfrp>',
                buttons: [{
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],
                columnDefs: [{
                    targets: 3,
                    orderable: false
                }]
            });
            $("#address_type_table_filter").addClass("d-inline float-right");
            $("<hr>").insertBefore("#address_type_table");
        });

    </script>







    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h2 class="mt-2 mb-1">List of Guests</h2>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('attendances.attendance.create') }}" class="btn btn-success" title="Create New Attendance">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($attendances) == 0)
            <div class="panel-body text-center">
                <h4>No Attendances Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>No</th>

                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Age</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($attendances as $attendance)
                        <tr>

                            <td>{{ $attendance->id}}
                            <!--  @for ($i = 0; $i < 1; $i++)
                                <p>{{ $i }}</p>
                                @endfor -->


                            </td>
                            <td>{{ $attendance->firstname }}</td>
                            <td>{{ $attendance->lastname }}</td>
                            <td>{{ $attendance->age }}</td>
                            <td>{{ $attendance->phone }}</td>
                            <td>{{ $attendance->gender }}</td>
                            <td>{{ $attendance->date }}</td>
                            <td>
                            @if(($attendance->is_approved)=='0')
                            <p>Pending</p>
                            @else<p>Approved</p>
                            @endif
                            </td>
                            <td>
                            @if(($attendance->is_approved)=='0')
                            <a href="{{route('admin.admin.approve', $attendance->id)}}" class="btn btn-success">Approve</a> <!-- //pass the id here -->
                        <a href="{{route('admin.admin.decline', $attendance->id)}}" class="btn btn-danger">Decline</a>
                            @else
                            <a href="{{route('admin.admin.decline', $attendance->id)}}" class="btn btn-danger">Decline</a>
                            @endif

<!--  //pass the id here as well -->
 <!-- <a href="{{route('admin.admin.index', $attendance->id)}}" class="btn btn-success">Approve</a> --><!--  //pass the id here -->
<!-- <a href="{{route('admin.admin.index', $attendance->id)}}" class="btn btn-danger">Decline</a> --><!--  //pass the id here as well -->



                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $attendances->render() !!}
        </div>

        @endif

    </div>
@endsection











