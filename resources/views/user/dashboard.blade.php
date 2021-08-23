@extends('user.layouts.app')
@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-auto">
                    <a href="{{url('/order')}}" class="btn w-100">
                        <img src="images/icons/add.svg" alt="">
                        Order and we will pick your freight
                    </a>
                    <ul class="tabs dashboard mt-4">
                        <li class="active">
                            <a href="{{url('/dashboard')}}"><img src="images/icons/orders.svg" alt=""> My orders </a>
                        </li>
                        <li>
                            <a href="{{url('/settings')}}"><img src="images/icons/settings.svg" alt=""> Settings</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg content">
                    <h4 class="my-3 mt-lg-0">My orders</h4>
                    <table class="order-table d-none d-md-table">
                        <tr class="_head">
                            <th>Track ID</th>
                            <th>Order date</th>
                            <th>Approximate delivery date</th>
                            <th>Status</th>
                            <th style="width: 60px">Action</th>
                        </tr>
                        @foreach($ordrs as $order)
                            <tr>
                                <td>{{$order->order_code}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>
                                    @if($order->location == 1)
                                        {{'US: stock'}}
                                    @endif
                                    @if($order->location == 2)
                                        {{'US: airoport stock'}}
                                    @endif
                                    @if($order->location == 3)
                                        {{'Transit country'}}
                                    @endif
                                    @if($order->location == 4)
                                        {{'Armenia: airoport'}}
                                    @endif
                                    @if($order->location == 5)
                                        {{'Armenia: stock'}}
                                    @endif
                                </td>
                                <td><a href="{{url('/order/success/'.$order->id)}}"><img src="user/images/icons/view.svg" alt=""></a></td>
                            </tr>
                        @endforeach
                        <tr class="completed">
                            <td>#SB154897625031</td>
                            <td>02.23.2021</td>
                            <td>02.23.2021</td>
                            <td>US: stock</td>
                            <td><a href="#"><img src="images/icons/view.svg" alt=""></a></td>
                        </tr>
                    </table>
                    <div class="order-table d-md-none accordion" id="accordionOrder">
                        <div class="_item">
                            <div class="row-head"
                                 id="heading1"
                                 data-toggle="collapse"
                                 data-target="#collapse1"
                                 aria-expanded="false"
                                 aria-controls="collapse1">
                                <span>#SB154897625031</span>
                                <span>US: stock</span>
                            </div>

                            <div id="collapse1" class="collapse" aria-labelledby="heading1"
                                 data-parent="#accordionOrder">
                                <div class="row-body container-fluid">
                                    <div class="row">
                                        <div>Track ID</div>
                                        <div>#SB154897625031</div>
                                    </div>
                                    <div class="row">
                                        <div>Order date</div>
                                        <div>02.23.2021</div>
                                    </div>
                                    <div class="row">
                                        <div>Approximate delivery date</div>
                                        <div>02.23.2021</div>
                                    </div>
                                    <div class="row">
                                        <div>Status</div>
                                        <div>US: stock</div>
                                    </div>
                                    <div class="row">
                                        <div>Action</div>
                                        <div><a href="#"><img src="images/icons/view.svg" alt=""></a>   </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="_item">
                            <div class="row-head"
                                 id="heading2"
                                 data-toggle="collapse"
                                 data-target="#collapse2"
                                 aria-expanded="false"
                                 aria-controls="collapse2">
                                <span>#SB154897625031</span>
                                <span>US: stock</span>
                            </div>

                            <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                 data-parent="#accordionOrder">
                                <div class="row-body container-fluid">
                                    <div class="row">
                                        <div>Track ID</div>
                                        <div>#SB154897625031</div>
                                    </div>
                                    <div class="row">
                                        <div>Order date</div>
                                        <div>02.23.2021</div>
                                    </div>
                                    <div class="row">
                                        <div>Approximate delivery date</div>
                                        <div>02.23.2021</div>
                                    </div>
                                    <div class="row">
                                        <div>Status</div>
                                        <div>US: stock</div>
                                    </div>
                                    <div class="row">
                                        <div>Action</div>
                                        <div><a href="#"><img src="images/icons/view.svg" alt=""></a>   </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
