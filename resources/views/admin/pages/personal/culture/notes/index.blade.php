<?php
    use \App\Helpers\Date\DateHelper;
?>

@extends('admin.layout')

@section('title', 'Notes')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/pages/note.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title last-title-box-index">Notes for something</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ URL::route('note.create') }}" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add note</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                    <ul class="todo-list">
                        @foreach($notes as $key => $note)
                        <li>
                            <!-- Emphasis label -->
                            <span class="text crop-span">
                                <small class="label label-info" id="time-ago"><i class="fa fa-clock-o"></i>  {{ DateHelper::getPeriodOfTime($note->created_at) }}</small>
                            </span>
                            <!-- drag handle -->
                            <span class="handle crop-span" id="crop-span-ellipsis">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>

                            <span class="text crop-title-75" id="title-note-index"><a href="{{ URL::route('note.show', $note->id) }}">{{ $note->title }}</a> </span>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <a href="{{ URL::route('note.edit', $note->id) }}"><i class="fa fa-edit"></i></a>
                                <a href="#" id="test"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                    <div class="box-tools pull-right">
                        {{ $notes->links() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- About Me Box -->
            <div class="box box-primary" id="box-last-note">
                <div class="box-header with-border">
                    <i class="fa fa-pencil margin-r-5"></i>
                    <h3 class="box-title last-title-box-index">Last Note |
                        <small class="crop-title-75"><a href="{{ URL::route('note.show', $lastNote->id) }}">{{ $lastNote->title }}</a></small>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Description</strong>
                    <p class="text-muted"> {{ $lastNote->description }}</p>
                    <hr>

                    <strong>
                        <i class="fa fa-map-marker margin-r-5"></i> Notification |
                        @if($lastNote->notification == 1)
                            <small><span class="label label-success">Enable</span> | </small>
                        @else
                            <small><span class="label label-warning">Disable</span></small>
                        @endif
                    </strong>
                    <small> {{ $lastNote->notification_date }}</small>
                    <hr>
                    <strong>
                        <i class="fa fa-pencil margin-r-5"></i> Status |
                        @if($lastNote->status == 1)
                            <small><span class="label label-success">Enable</span></small>
                        @else
                            <small><span class="label label-warning">Disable</span></small>
                        @endif
                    </strong>

                    <hr>
                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                    <p>{!! $lastNote->content !!}</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('script')

@endsection
