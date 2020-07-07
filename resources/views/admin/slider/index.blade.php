@extends('layouts.backend.master')

@section('title','')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-datepicker/css/datepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-daterangepicker/daterangepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-timepicker/compiled/timepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-datetimepicker/css/datetimepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/backend/lib/advanced-datatable/css/DT_bootstrap.css')}}" />

    <style>
        .content-panel{
            padding: 10px;
        }
        .form-horizontal.style-form .form-group{
            border-bottom: 0px;
        }
        .form-group{
            width: 100%;
        }

        .showback{
            box-shadow: none;
        }

    </style>
@endpush

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> All Slider</h3>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">

                        <!--  MODALS -->
                        <div class="showback">
                            <!-- Button trigger modal -->
                            <button class="btn btn-theme pull-right" data-toggle="modal" data-target="#myModal">
                            Add New Slider
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add New Slider</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-panel">
                                                <div class="form">
                                                    <form class="cmxform form-horizontal style-form" id="commentForm" action="{{route('admin.slider.store')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="ctitle" class="control-label col-lg-2">Title *</label>
                                                            <div class="col-lg-9">
                                                                <input class="form-control" id="title" name="title" type="text"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="csub_title" class="control-label col-lg-2">Sub Title</label>
                                                            <div class="col-lg-9">
                                                                <input class="form-control" id="sub_title" name="sub_title" type="text"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="description" class="control-label col-lg-2">Description</label>
                                                            <div class="col-lg-9">
                                                                <textarea class="form-control" id="comment" name="description" rows="3"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Image *</label>
                                                            <div class="col-md-10">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="{{asset('assets/backend/img/demo_image.png')}}" alt="" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                    <div>
                                                                        <span class="btn btn-theme02 btn-file">
                                                                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                                        <input type="file" class="default" name="image"/>
                                                                        </span>
                                                                        <a href="#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cbutton_text" class="control-label col-lg-2">Button Text</label>
                                                            <div class="col-lg-9">
                                                                <input class="form-control" id="button_text" name="button_text" type="text"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cbutton_link" class="control-label col-lg-2">Button Link</label>
                                                            <div class="col-lg-9">
                                                                <input class="form-control" id="button_link" name="button_link" type="text"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="priority" class="control-label col-lg-2">Priority</label>
                                                            <div class="col-lg-9">
                                                                <input class="form-control" id="priority" name="priority" type="number"/>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-theme">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="showback">

                            <div class="adv-table">
                                <table class="table table-striped table-advance table-hover" id="hidden-table-info">
                                    <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Slider Title</th>
                                        <th>Image</th>
                                        <th>Sub Title</th>
                                        <th>Description</th>
                                        <th>Button Text</th>
                                        <th>Priority</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $key => $slider)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$slider->title}}</td>
                                        <td>
                                            @if($slider->image)
                                            <img style="height: 50px;" src="{{ asset('storage/sliders/'.$slider->image) }}"/>
                                            @else
                                            <img style="height: 50px;" src="{{asset('assets/backend/img/demo_image.png')}}" alt="" />
                                            @endif
                                        </td>
                                        <td>{{ $slider->sub_title }}</td>
                                        <td>{{ Str::limit($slider->description,30) }}</td>
                                        <td>{{ $slider->button_text }}</td>
                                        <td>{{ $slider->priority }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a href="#myModa{{$slider->id}}" class="btn btn-primary btn-xs" data-toggle="modal">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <!-- Modal -->

                                            <div class="modal fade" id="myModa{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">Edit Slider</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-panel">
                                                                <div class="form">
                                                                    <form class="cmxform form-horizontal style-form" id="commentForm" action="{{route('admin.slider.update',$slider->id)}}" method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <label for="ctitle" class="control-label col-lg-2">Title *</label>
                                                                            <div class="col-lg-9">
                                                                                <input style="width:100%;" class="form-control" id="title" name="title" type="text" value="{{$slider->title}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="csub_title" class="control-label col-md-2">Sub Title</label>
                                                                            <div class="col-md-9">
                                                                                <input style="width:100%;" class="form-control" id="sub_title" name="sub_title" type="text" value="{{$slider->sub_title}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <label for="description" class="control-label col-md-2">Description</label>
                                                                            <div class="col-md-9">
                                                                                <textarea style="width:100%;" class="form-control" id="comment" name="description" rows="3">{{$slider->description}}</textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-2">Image *</label>
                                                                            <div class="col-md-10">
                                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 100%;">
                                                                                        <img src="{{ asset('storage/sliders/'.$slider->image) }}" alt="" />
                                                                                    </div>
                                                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                                    <div>
                                                                                        <span class="btn btn-theme02 btn-file">
                                                                                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                                                        <input type="file" class="default" name="image"/>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="cbutton_text" class="control-label col-lg-2">Button Text</label>
                                                                            <div class="col-lg-8">
                                                                                <input style="width:100%;" class="form-control" id="button_text" name="button_text" type="text" value="{{$slider->button_text}}">
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group">
                                                                            <label for="cbutton_link" class="control-label col-md-2">Button Link</label>
                                                                            <div class="col-md-8">
                                                                                <input style="width:100%;" class="form-control" id="button_link" name="button_link" type="text" value="{{$slider->button_link}}">
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group">
                                                                            <label for="priority" class="control-label col-md-2">Priority</label>
                                                                            <div class="col-md-8">
                                                                                <input style="width:100%;" class="form-control" id="priority" name="priority" type="number" value="{{$slider->priority}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-theme">Save changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <button class="btn btn-danger btn-xs" onclick="deleteSlider({{ $slider->id }})"><i class="fa fa-trash-o "></i></button>
                                            <form id="delete-form-{{ $slider->id }}" action="{{ route('admin.slider.destroy',$slider->id) }}" method="post" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Slider Title</th>
                                            <th>Image</th>
                                            <th>Sub Title</th>
                                            <th>Description</th>
                                            <th>Button Text</th>
                                            <th>Priority</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                </table>
                            </div>
                        </div>



                    </div>
                    <!-- /content-panel -->
                </div>
                <!-- /col-md-12 -->
            </div>
            <!-- /row -->
        </section>
    </section>
@endsection

@push('js')
    <!-- js placed at the end of the document so the pages load faster -->
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


    <script type="text/javascript" language="javascript" src="{{asset('assets/backend/lib/advanced-datatable/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/advanced-datatable/js/DT_bootstrap.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script type="text/javascript">
        function deleteSlider(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
    <!--script for this page-->

@endpush
