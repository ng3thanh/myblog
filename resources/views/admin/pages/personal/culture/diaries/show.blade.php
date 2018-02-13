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
                    <i class="fa fa-pencil margin-r-5"></i>
                    <h3 class="box-title last-title-box-index">Diary |
                        @if($diary)
                            <small class="crop-title-75"><a href="{{ URL::route('diary.show', $diary->id) }}">{{ $diary->title }}</a></small>
                        @endif
                    </h3>

                    @if($diary)
                        <div class="col-md-12">
                            @if($diary->status == 1)
                                <small><span class="label label-success">Enable</span></small>
                            @else
                                <small><span class="label label-warning">Disable</span></small>
                            @endif
                            <i class="{{ $diary->emotion_icon }}">{{ $diary->emotion_name }}</i> -
                            <i class="{{ $diary->weather_icon }}">{{ $diary->weather_name }}</i>
                            @endif
                        </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if($diary)
                        <strong><i class="fa fa-book margin-r-5"></i> Description</strong>
                        <p class="text-muted"> {{ $diary->description }}</p>
                        <hr>
                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Diary content</strong>
                        <p>{!! $diary->content !!}</p>
                    @endif
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
