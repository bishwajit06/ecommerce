@extends('layouts.backend.master')

@section('title','Product Create')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-datepicker/css/datepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-daterangepicker/daterangepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-timepicker/compiled/timepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-datetimepicker/datertimepicker.css')}}" />
@endpush

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> EDIT DIVISION</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <h4><i class="fa fa-angle-right"></i> <a href="{{route('admin.division.index')}}" type="button" class="btn btn-theme">Back All Division</a></h4>
                    <div class="form-panel">
                        <div class=" form">
                            <form class="cmxform form-horizontal style-form" action="{{route('admin.division.update',$division->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Division Name (required)</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="name" name="name" type="text" value="{{$division->name}}"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="priority" class="control-label col-lg-2">Division Priority (required)</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="priority" name="priority" type="number" value="{{$division->priority}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-theme" type="submit">Update</button>
                                        <a href="{{route('admin.division.index')}}" class="btn btn-theme04" type="button">Back</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- /form-panel -->
                </div>
                <!-- /col-lg-12 -->
            </div>
            <!-- /row -->
        </section>
        <!-- /wrapper -->
    </section>
@endsection

@push('js')
    <script src="{{asset('assets/backend/lib/jquery-ui-1.9.2.custom.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/bootstrap-daterangepicker/date.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/bootstrap-daterangepicker/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>
    <script src="{{asset('assets/backend/lib/advanced-form-components.js')}}"></script>
    <script src="{{asset('assets/backend/lib/advanced-form-components.js')}}"></script>
@endpush
