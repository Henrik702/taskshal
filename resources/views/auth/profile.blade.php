@extends('layouts.header-sidebar')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Իմ էջը</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}"><i
                                                class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Իմ էջը</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Main content -->
            <section class="content">

                <div class="row">

                    <div class="col-12 col-lg-8 col-xl-8 mx-auto">
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-black"
                                 style="background: url('{{asset('images/gallery/full/10.jpg')}}') center center;">
                                <h3 class="widget-user-username">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h3>
                                <h6 class="widget-user-desc">ՀԱՅԱՍՏԱՆԻ ԱԶԳԱՅԻՆ ԱԳՐԱՐԱՅԻՆ ՀԱՄԱԼՍԱՐԱՆ</h6>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-body box-profile content">
                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <p>Էլ․ փոստ :<span class="text-gray pl-10">{{Auth::user()->email}}</span>
                                            </p>
                                        </div>

                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="box">
                                            <form class="form" method="post" action="{{route('updatePass')}}">
                                                @csrf
                                                <div class="box-body">
                                                    <h4 class="box-title text-info"><i class="ti-user mr-15"></i>
                                                        Գաղտնաբառի փոփոխություն</h4>
                                                    <hr class="my-15">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <h5>Հին գաղտնաբառ <span class="text-danger">*</span>
                                                                </h5>
                                                                <div class="controls">
                                                                    <input type="password" minlength="8"
                                                                           name="current_password"
                                                                           data-validation-minlength-message="Առնվազն 8 նիշ"
                                                                           class="form-control" required
                                                                           data-validation-required-message="Պարտադիր դաշտ">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <h5>Նոր գաղտնաբառ <span class="text-danger">*</span>
                                                                </h5>
                                                                <div class="controls">
                                                                    <input type="password" minlength="8"
                                                                           name="new_password"
                                                                           data-validation-minlength-message="Առնվազն 8 նիշ"
                                                                           class="form-control" required
                                                                           data-validation-required-message="Պարտադիր դաշտ">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <h5>Նոր գաղտնաբառի կրկնություն <span
                                                                        class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="password" minlength="8"
                                                                           data-validation-minlength-message="Առնվազն 8 նիշ"
                                                                           name="confirm_password"
                                                                           data-validation-match-match="new_password"
                                                                           data-validation-match-message="Պետք է համընկնի Նոր գաղտնաբառ դաշտի հետ"
                                                                           data-validation-required-message="Պարտադիր դաշտ"
                                                                           class="form-control" required></div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <!-- /.box-body -->
                                                <div class="box-footer">
                                                    <button type="button"
                                                            class="btn btn-rounded btn-warning btn-outline mr-1">
                                                        <i class="ti-trash"></i> Չեղարկել
                                                    </button>
                                                    <button type="submit"
                                                            class="btn btn-rounded btn-primary btn-outline">
                                                        <i class="ti-save-alt"></i> Պահպանել
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>

                </div>
                <!-- /.row -->

            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
@if(session()->has('success'))
    <script>
        $(document).ready(function () {
            swal({
                title: "Գաղտնաբառը փոփոխված է",
                type: "success",
            });
        })
    </script>
@endif
@endsection
