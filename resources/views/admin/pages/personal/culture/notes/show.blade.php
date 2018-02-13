<?php
use \App\Helpers\Date\DateHelper;
?>

@extends('admin.layout')

@section('title', 'Note detail')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/pages/culture.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="col-xs-12">
            <!-- About Me Box -->
            <div class="box box-primary" id="box-last-note">
                <div class="box-header with-border">
                    <span class="box-title crop-title-75 title-box-show">{{ $note->title }}</span>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Description</strong>
                    <p class="text-muted"> {{ $note->description }}</p>
                    <hr>

                    <strong>
                        <i class="fa fa-map-marker margin-r-5"></i> Notification |
                        @if($note->notification == 1)
                            <small><span class="label label-success">Enable</span> | </small>
                        @else
                            <small><span class="label label-warning">Disable</span></small>
                        @endif
                    </strong>
                    <small> {{ date('d/m/Y', strtotime($note->notification_date)) }}</small>
                    <hr>
                    <strong>
                        <i class="fa fa-pencil margin-r-5"></i> Status |
                        @if($note->status == 1)
                            <small><span class="label label-success">Enable</span></small>
                        @else
                            <small><span class="label label-warning">Disable</span></small>
                        @endif
                    </strong>

                    <hr>
                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                    <p>{!! $note->content !!}</p>
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
