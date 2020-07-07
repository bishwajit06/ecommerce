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
            <h3><i class="fa fa-angle-right"></i> EDIT CATEGORY</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <h4><i class="fa fa-angle-right"></i> <a href="{{route('admin.category.index')}}" type="button" class="btn btn-theme">Back All Category</a></h4>
                    <div class="form-panel">
                        <div class=" form">
                            <form class="cmxform form-horizontal style-form" action="{{route('admin.category.update',$category->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Category Name (required)</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="name" name="name" type="text" value="{{$category->name}}"/>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Category Parent</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="parent_id">
                                            <option value="">Select Parent Category</option>
                                            @if($category->parent_id == NULL)
                                                <option value="0" selected>Select Parent Category</option>
                                            @else
                                                <option value="{{$category->parent->id}}" selected>{{$category->parent->name}}</option>
                                            @endif
                                            @foreach($mainCategories as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="description" class="control-label col-lg-2">Category Description</label>
                                    <div class="col-lg-8">
                                        <textarea class="form-control" id="comment" name="description" rows="5">{{$category->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Upload Image Banner</label>
                                    <div class="col-md-10">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail">
                                                @if($category->banner_image == "default.png")
                                                    <img style="width: 200px; height: 150px;" src="{{asset('assets/backend/img/demo_image.png')}}" alt="" />
                                                @else($category->image == "default.png")
                                                    <img style="height: 150px;" src="{{ asset('storage/category/'.$category->banner_image) }}"/>
                                                @endif
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-theme02 btn-file">
                                                  <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" name="banner_image" value="{{$category->banner_image}}"/>
                                                </span>
                                                <a href="#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Upload Image Icon</label>
                                    <div class="col-md-10">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail">
                                                @if($category->icon_image == "default.png")
                                                    <img style="width: 50px; height: 50px;" src="{{asset('assets/backend/img/demo_image.png')}}" alt="" />
                                                @else($category->image == "default.png")
                                                    <img style="height: 50px;" src="{{ asset('storage/category/icon/'.$category->icon_image) }}"/>
                                                @endif
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 50px; max-height: 50px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-theme02 btn-file">
                                                  <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" name="icon_image" value="{{$category->icon_image}}"/>
                                                </span>
                                                <a href="#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-theme" type="submit">Update</button>
                                        <a href="{{route('admin.category.index')}}" class="btn btn-theme04" type="button">Back</a>
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
