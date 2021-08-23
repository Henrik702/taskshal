@extends('user.layouts.app')
@section('content')
<header>
    <div class="container">
        @foreach($header->text as $text)
            @foreach($text->translate as $tr)
                <h1>{{$tr->name}}</h1>
            @endforeach
        @endforeach
        <a href="{{url('/order')}}" class="btn">Order</a>
    </div>
</header>
<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 col-xl-5">
                <div class="title">
                    <span>Welcome</span>
                    @foreach($welcome->text as $text)
                        @foreach($text->translate as $tr)
                            <h2>{{$tr->name}}</h2>
                            @php($welcome_description = $tr->description)

                        @endforeach
                    @endforeach
                </div>
                <div class="content">
                    {!! $welcome_description !!}
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-7">
                <img src="{{asset('user/images/map.svg')}}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row align-items-center flex-column-reverse flex-lg-row">
            <div class="col-12 col-lg-6 col-xl-7">
                <img src="{{asset('user/images/about.png')}}" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-lg-6 col-xl-5">
                <div class="title">
                    <span>About our company</span>
                    @foreach($about_1->text as $text)
                        @foreach($text->translate as $tr)
                            <h2>{{$tr->name}}</h2>
                            @php($about_1_description = $tr->description)

                        @endforeach
                    @endforeach
                </div>
                <div class="content">
                    {!! $about_1_description !!}
                </div>
                <div class="title">
                    @foreach($about_2->text as $text)
                        @foreach($text->translate as $tr)
                            <h3>{{$tr->name}}</h3>
                            @php($about_2_description = $tr->description)
                        @endforeach
                    @endforeach
                </div>
                <div class="content">
                    {!! $about_2_description !!}
                </div>
            </div>
        </div>
    </div>
</section>
<section class="advantages" id="about">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl">
                <div class="title">
                    <span>Our advantages</span>
                    @foreach($advantages->text as $text)
                        @foreach($text->translate as $tr)
                            <h2>{{$tr->name}}</h2>
                            @php($advantages_description = $tr->description)
                        @endforeach
                    @endforeach
                </div>
                <div class="content">
                    {!! $advantages_description !!}
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-auto d-flex align-items-center">
                <div class="benefits">
                    <div class="_item">
                        <img src="{{asset('user/images/icons/speed.svg')}}" alt="" class="img-fluid">
                        <span>Speed</span>
                    </div>
                    <div class="_item">
                        <img src="{{asset('user/images/icons/price.svg')}}" alt="" class="img-fluid">
                        <span>Price</span>
                    </div>
                    <div class="_item">
                        <img src="{{asset('user/images/icons/reliability.svg')}}" alt="" class="img-fluid">
                        <span>Reliability</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="testimonials">
    <div class="container">
        <div class="title">
            <span>Clients Testimonials</span>
            <h2>What Our Clients Say!</h2>
        </div>
        <div class="slider">
            <div class="_item">
                <img src="{{asset('user/images/review.png')}}" alt="">
                <h5>Name Surname</h5>
                <p>This was my first business transaction with USA Shipping Group and I must say that I will
                    definitely
                    continue to use their services. They were extremely knowledgeable about the shipping industry
                    and
                    were able to provide me an immediate quote as well as provide fast turnaround service. I would
                    most
                    definitely recommend them!</p>
            </div>
            <div class="_item">
                <img src="{{asset('user/images/review.png')}}" alt="">
                <h5>Name Surname</h5>
                <p>This was my first business transaction with USA Shipping Group and I must say that I will
                    definitely
                    continue to use their services. They were extremely knowledgeable about the shipping industry
                    and
                    were able to provide me an immediate quote as well as provide fast turnaround service. I would
                    most
                    definitely recommend them!</p>
            </div>
            <div class="_item">
                <img src="{{asset('user/images/review.png')}}" alt="">
                <h5>Name Surname</h5>
                <p>This was my first business transaction with USA Shipping Group and I must say that I will
                    definitely
                    continue to use their services. They were extremely knowledgeable about the shipping industry
                    and
                    were able to provide me an immediate quote as well as provide fast turnaround service. I would
                    most
                    definitely recommend them!</p>
            </div>
        </div>
    </div>
</section>
<section class="services" id="services">
    <div class="container text-center">
        <div class="title">
            <span>Our Services</span>
            @foreach($services->text as $text)
                @foreach($text->translate as $tr)
                    <h2>{{$tr->name}}</h2>
                    @php($services_description = $tr->description)
                @endforeach
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="content">
                    {!! $services_description !!}
                </div>
            </div>
        </div>
        <div class="row justify-content-center benefits mt-3">
            <div class="col-auto">
                <div class="_item">
                    <img src="{{asset('user/images/icons/booking.svg')}}" alt="" class="img-fluid">
                    <span>Booking</span>
                </div>
            </div>
            <div class="col-auto">
                <div class="_item">
                    <img src="{{asset('user/images/icons/warehousing.svg')}}" alt="" class="img-fluid">
                    <span>Warehousing</span>
                </div>
            </div>
            <div class="col-auto">
                <div class="_item">
                    <img src="{{asset('user/images/icons/paperwork.svg')}}" alt="" class="img-fluid">
                    <span>Paperwork</span>
                </div>
            </div>
            <div class="col-auto">
                <div class="_item">
                    <img src="{{asset('user/images/icons/shipping.svg')}}" alt="" class="img-fluid">
                    <span>Shipping</span>
                </div>
            </div>
            <div class="col-auto">
                <div class="_item">
                    <img src="{{asset('user/images/icons/tracking.svg')}}" alt="" class="img-fluid">
                    <span>Tracking</span>
                </div>
            </div>
            <div class="col-auto">
                <div class="_item">
                    <img src="{{asset('user/images/icons/other-processes.svg')}}" alt="" class="img-fluid">
                    <span>Other processes</span>
                </div>
            </div>
        </div>
        <div class="my-4">Order online and we will pick your freight.</div>
        <a href="{{url('/order')}}" class="btn">Order</a>
    </div>
</section>
<section id="dangerous">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5">
                <div class="title">
                    <span>Dangerous Goods</span>
                    @foreach($dangerous_1->text as $text)
                        @foreach($text->translate as $tr)
                            <h2>{{$tr->name}}</h2>
                            @php($dangerous_1_description = $tr->description)
                        @endforeach
                    @endforeach
                </div>
                <div class="content">
                    {!! $dangerous_1_description !!}
                </div>
                <div class="title">
                    @foreach($dangerous_2->text as $text)
                        @foreach($text->translate as $tr)
                            <h2>{{$tr->name}}</h2>
                            @php($dangerous_2_description = $tr->description)
                        @endforeach
                    @endforeach
                </div>
                <div class="content">
                    {!! $dangerous_2_description !!}
                    <div class="row">
                        <div class="col-12 col-md-auto">
                            @foreach($dangerous_3->text as $text)
                                @foreach($text->translate as $tr)
                                    {!! $tr->description !!}
                                @endforeach
                            @endforeach

                        </div>
                        <div class="col-12 col-md-auto">
                            @foreach($dangerous_4->text as $text)
                                @foreach($text->translate as $tr)
                                    {!! $tr->description !!}
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    <p class="danger">
                        *Please note that this is applicable only to air cargo shipments
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-7">
                <img src="{{asset('user/images/dangerous-goods.png')}}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<section id="contacts" class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5">
                <div class="title">
                    <span>Contact us</span>
                    @foreach($contact_title->text as $text)
                        @foreach($text->translate as $tr)
                            <h2>{!! $tr->name !!}</h2>
                            @php($contacts = $tr->description)
                        @endforeach
                    @endforeach
                </div>
                <div class="content">
                    <p><img src="{{asset('user/images/icons/phone.svg')}}" alt="">{{$contact->phone}}</p>
                    @foreach($contact->translate as $texts)
                        <p><img src="{{asset('user/images/icons/working-hours.svg')}}" alt="">{{$texts->wework}}</p>
                        <p><img src="{{asset('user/images/icons/address.svg')}}" alt="">{{$texts->address}}</p>
                    @endforeach
                    <p><img src="{{asset('user/images/icons/mail.svg')}}" alt="">{{$contact->email}}</p>
                    <div class="socials mb-3">
                        <a href="{{$contact->fb_link}}"><img src="{{asset('user/images/icons/facebook.svg')}}" alt=""></a>
                        <a href="{{$contact->insta_link}}"><img src="{{asset('user/images/icons/instagram.svg')}}" alt=""></a>
                        <a href="{{$contact->linkedin}}"><img src="{{asset('user/images/icons/linkedin.svg')}}" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3299.756537056186!2d-118.42165128448431!3d34.20369648056503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c296eb9d02c897%3A0xfa033e86533602f0!2s13154%20Leadwell%20St%2C%20North%20Hollywood%2C%20CA%2091605%2C%20USA!5e0!3m2!1sen!2s!4v1619993316442!5m2!1sen!2s"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>
<div class="to-top">
    <a href="#body"><img src="{{asset('user/icons/up.svg')}}" alt=""></a>
</div>
@endsection
