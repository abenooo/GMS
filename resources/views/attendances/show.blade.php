@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Attendance' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('attendances.attendance.destroy', $attendance->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('attendances.attendance.index') }}" class="btn btn-primary" title="Show All Attendance">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('attendances.attendance.create') }}" class="btn btn-success" title="Create New Attendance">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('attendances.attendance.edit', $attendance->id ) }}" class="btn btn-primary" title="Edit Attendance">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Attendance" onclick="return confirm(&quot;Click Ok to delete Attendance.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Firstname</dt>
            <dd>{{ $attendance->firstname }}</dd>
            <dt>Lastname</dt>
            <dd>{{ $attendance->lastname }}</dd>
            <dt>Age</dt>
            <dd>{{ $attendance->age }}</dd>
            <dt>Phone</dt>
            <dd>{{ $attendance->phone }}</dd>
            <dt>Gender</dt>
            <dd>{{ $attendance->gender }}</dd>
            <dt>Date</dt>
            <dd>{{ $attendance->date }}</dd>
            <dt>File</dt>
            <dd>{{ asset('storage/' . $attendance->file) }}</dd>
            <dt>Status</dt>
            <dd>{{ $attendance->is_approved }}</dd>

        </dl>

    </div>
</div>

@endsection