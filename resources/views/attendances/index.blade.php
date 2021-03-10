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

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Attendances</h4>
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

                            <td>{{ $attendance->id }}</td>
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

                                <form method="POST" action="{!! route('attendances.attendance.destroy', $attendance->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('attendances.attendance.show', $attendance->id ) }}" class="btn btn-info" title="Show Attendance">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>

                                        <a href="{{ route('attendances.attendance.edit', $attendance->id ) }}" class="btn btn-primary" title="Edit Attendance">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>


                                        <button type="submit" class="btn btn-danger" title="Delete Attendance" onclick="return confirm(&quot;Click Ok to delete Attendance.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></buttton>
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
