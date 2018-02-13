@extends('admin.layout')

@section('title', 'Edit diary')

@section('css') @endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">
                            <small>Edit diary | {{$diary->id}} | {{$diary->title}} </small>
                        </h3>
                    </div>

                    <div class="box-body pad">
                        <form method="POST" action="{{ URL::route('diary.update', $diary->id) }}" id="edit-diary">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <!-- /.box-header -->

                            <div class="col-md-6">
                                <!-- general form elements disabled -->
                                <div class="box box-warning">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <!-- text input -->
                                        <div class="form-group col-md-6">
                                            <label class="label-box-edit"><i class="fa fa-newspaper-o"></i> Emotion</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i id="emotion-icon" class=""></i>
                                                </span>
                                                <select name="emotion" id="emotion" class="form-control" value="{{ old('emotion') }}">
                                                    @foreach($emotions as $key => $value)
                                                        <option value="{{ $value->id }}" @if($value->id == $diary->emotion) selected @endif data-value="{{ $value->icon }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="label-box-edit"><i class="fa fa-newspaper-o"></i> Weather</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i id="weather-icon" class=""></i>
                                                </span>
                                                <select name="weather" id="weather" class="form-control" value="{{ old('weather') }}">
                                                    @foreach($weathers as $key => $value)
                                                        <option value="{{ $value->id }}" @if($value->id == $diary->weather) selected @endif data-value="{{ $value->icon }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12 form-group @if ($errors->has('title')) has-error @endif">
                                            <label class="label-box-edit"><i class="fa fa-edit"></i> Title</label>
                                            <input type="text" name="title" class="form-control" value="{{ $diary->title }}">
                                            @if ($errors->has('title'))
                                                <span class="help-block">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                        <!-- textarea -->
                                        <div class="col-md-12 form-group @if ($errors->has('description')) has-error @endif">
                                            <label class="label-box-edit"><i class="fa fa-archive"></i> Description</label>
                                            <textarea name="description" class="form-control" rows="3">{{ $diary->description }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>

                                        <!-- select -->
                                        <div class="col-md-12 form-group">
                                            <label class="label-box-edit"><i class="fa fa-check-circle"> </i> Select status</label>
                                            <select name="status" class="form-control" value="{{ old('status') }}">
                                                @foreach($status as $key => $value)
                                                    <option value="{{ $key }}" @if($key == $diary->status) selected @endif >{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>

                            <div class="col-md-6">
                                <div class="box box-warning">
                                    <div class="box-body">
                                        <div class="form-group @if ($errors->has('content')) has-error @endif">
                                            <textarea id="diary_editer" name="content" rows="8" cols="60">{{ $diary->content }}</textarea>
                                            @if ($errors->has('content'))
                                                <span class="help-block">{{ $errors->first('content') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="box-footer text-center">
                        <a href="{{ URL::route('diary.index') }}" type="submit" class="btn btn-primary">Back</a>
                        <button form="edit-diary" type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-primary">Clear</button>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
@endsection

@section('script')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('diary_editer')
            $('.textarea').wysihtml5()
            $('#emotion-icon').removeClass().addClass($('#emotion').find(':selected').data('value'));
            $('#weather-icon').removeClass().addClass($('#weather').find(':selected').data('value'));
        })

        $('#emotion').change(function () {
            var icon = $(this).find(':selected').data('value')
            $('#emotion-icon').removeClass().addClass(icon);
        })
        $('#weather').change(function () {
            var icon = $(this).find(':selected').data('value')
            $('#weather-icon').removeClass().addClass(icon);
        })
    </script>
@endsection
