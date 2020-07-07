@extends('layouts.backend.master')

@section('title','')

@push('css')
    <link rel="stylesheet" href="{{asset('assets/backend/lib/advanced-datatable/css/DT_bootstrap.css')}}" />

    <style>
        .content-panel{
            padding: 10px;
        }
    </style>
@endpush

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> All ORDER</h3>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> <a href="{{route('admin.order.create')}}" type="button" class="btn btn-theme">Add Order</a></h4>
                        <div class="adv-table">
                            <table class="table table-striped table-advance table-hover" id="hidden-table-info">
                                <hr>
                                <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Order ID</th>
                                    <th>Order Name</th>
                                    <th>Phone</th>
                                    <th>Shipping Address</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>#POR0{{ $order->id}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->shipping_address }}</td>
                                    <td>{{ $order->payment->name }}</td>
                                    <td>
                                        <p style="float: left; margin-right:5px;">
                                        @if ($order->is_seen_by_admin)
                                        <span class="label label-success label-mini">Seen</span>
                                        @else
                                        <span class="label label-info label-mini">Unseen</span>
                                        @endif
                                        </p>
                                        <p style="float: left; margin-right:5px;">
                                            @if ($order->is_completed)
                                            <span class="label label-success label-mini">completed</span>
                                            @else
                                            <span class="label label-warning label-mini">Progress</span>
                                            @endif
                                        </p>
                                        <p>
                                            @if ($order->is_paid)
                                            <span class="label label-success label-mini">Paid</span>
                                            @else
                                            <span class="label label-danger label-mini">Unpaid</span>
                                            @endif
                                        </p>

                                    </td>
                                    <td>
                                        <a href="{{route('admin.order.show',$order->id)}}" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                                        <a href="{{route('admin.order.edit',$order->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-xs" onclick="deleteOrder({{ $order->id }})"><i class="fa fa-trash-o "></i></button>
                                        <form id="delete-form-{{ $order->id }}" action="{{ route('admin.order.destroy',$order->id) }}" method="post" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>SN</th>
                                        <th>Order ID</th>
                                        <th>Order Name</th>
                                        <th>Phone</th>
                                        <th>Shipping Address</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                            </table>
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


    <script type="text/javascript" language="javascript" src="{{asset('assets/backend/lib/advanced-datatable/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/advanced-datatable/js/DT_bootstrap.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script type="text/javascript">
        function deleteOrder(id) {
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
    <script type="text/javascript">
        /* Formating function for row details */
        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px; margin-bottom:20px;">';
            sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
            sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
            sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
            sOut += '</table>';

            return sOut;
        }

        $(document).ready(function() {
            /*
             * Insert a 'details' column to the table
             */
            var nCloneTh = document.createElement('th');
            var nCloneTd = document.createElement('td');
            nCloneTd.innerHTML = '<img src="{{asset('assets/backend/lib/advanced-datatable/images/details_open.png')}}">';
            nCloneTd.className = "center";

            $('#hidden-table-info thead tr').each(function() {
                this.insertBefore(nCloneTh, this.childNodes[0]);
            });

            $('#hidden-table-info tbody tr').each(function() {
                this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
            });

            /*
             * Initialse DataTables, with no sorting on the 'details' column
             */
            var oTable = $('#hidden-table-info').dataTable({
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [0]
                }],
                "aaSorting": [
                    [1, 'asc']
                ]
            });

            /* Add event listener for opening and closing details
             * Note that the indicator for showing which row is open is not controlled by DataTables,
             * rather it is done here
             */

        });
    </script>
@endpush
