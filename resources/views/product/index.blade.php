@extends('layouts.header-sidebar')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Products</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Product</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <a href="{{route('product.create')}}" class="btn btn-primary">Create product</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Pdf</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($products as $product)
                                            <tr id="data-{{$product->id}}">
                                                <td>{{$product->title}}</td>
                                                <td>{{$product->pdf}}</td>
                                                <td>
                                                    <a href="javascript:void(0);" data-id="{{$product->id}}" class="btn btn-danger data-delete" title="Ջնջել" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
                                                    <a href="{{route('product.edit',$product->id)}}" type="button" class="btn btn-primary ml-2" title="Խմբագրել" data-toggle="tooltip" data-placement="top"><i class="mdi mdi-grease-pencil"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>

    <!-- /.content-wrapper -->
@endsection
@section('script')
    <script src="{{asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('js/pages/data-table.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.data-delete').on('click', function () {
                let id = $(this).data('id');
                swal({
                    title: "Համոզվա՞ծ եք, որ ցանկանում եք ջնջել",
                    text: "Ջնջելուց հետո վերականգնելն անհնար է",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Այո, ջնջել",
                    cancelButtonText: "Ոչ, չջնջել",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function(isConfirm){
                    if (isConfirm) {
                        $.ajax({
                            url: "product/" + id,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'DELETE',
                            success: function (data) {
                                if (data.data.message === "deleted") {
                                    $('#data-' + id).remove();
                                    swal({
                                        title: "Գործողությունը կատարված է",
                                        type: "success",
                                    });
                                }
                            }
                        });
                    } else {
                        swal({
                            title: "Գործողությունը չեղարկված է",
                            type: "error",
                        })
                    }
                });
            });

        })
    </script>
@endsection
