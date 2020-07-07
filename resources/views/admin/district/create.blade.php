@extends('layouts.backend.master')

@section('title','District Create')

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
            <h3><i class="fa fa-angle-right"></i> ADD DISTRICT</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <h4><i class="fa fa-angle-right"></i> <a href="{{route('admin.district.index')}}" type="button" class="btn btn-theme">Back</a></h4>
                    <div class="form-panel">
                        <div class=" form">
                            <form class="cmxform form-horizontal style-form" id="commentForm" action="{{route('admin.district.store')}}" method="POST">
                                @csrf
                                <div class="form-group ">
                                    <label for="name" class="control-label col-lg-2">District Name (required)</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="name" name="name" type="text" value="{{ old('name') }}"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Division</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="division_id">
                                            <option value="0" selected>Select Division</option>
                                            @foreach($divisions as $division)
                                                <option value="{{$division->id}}">{{$division->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-theme" type="submit">Save</button>
                                        <a href="{{route('admin.district.index')}}" class="btn btn-theme04" type="button">Back</a>
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
