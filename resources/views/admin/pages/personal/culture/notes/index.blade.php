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
                    <h3 class="box-title">Notes for something</h3>
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
                            <small class="label label-info"><i class="fa fa-clock-o"></i>  {{ DateHelper::getPeriodOfTime($note->created_at) }}</small>
                            <!-- drag handle -->
                            <span class="handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <!-- todo text -->
                            <span class="text crop-title-75">{{ $note->title }}</span>

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
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-pencil margin-r-5"></i>
                    <h3 class="box-title">Title | Design a nice theme</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                    <p class="text-muted">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                    <p class="text-muted">Malibu, California</p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Title</strong>

                    <p>
                        <span class="label label-danger">UI Design</span>
                        <span class="label label-success">Coding</span>
                        <span class="label label-info">Javascript</span>
                        <span class="label label-warning">PHP</span>
                        <span class="label label-primary">Node.js</span>
                    </p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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
