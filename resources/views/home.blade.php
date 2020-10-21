@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color:#E5E5E5; border-bottom: 1px solid #c2c2c2;">
    <div class="row justify-content-center">
        <ul class="list-inline">
            <li class="list-inline-item">
                <a class="nav-link bold" href="#">RSPO </a>
            </li>
            <li class="list-inline-item">
                <a class="nav-link bold" href="#">WWF International</a>
            </li>
            <li class="list-inline-item">
                <a class="nav-link bold" href="#">WWF Tigers Alive Initiative</a>
            </li>
            <li class="list-inline-item">
                <a class="nav-link bold" href="#">World Resource Institute</a>
            </li>
            <li class="list-inline-item">
                <a class="nav-link bold" href="#">The Coral Triangle</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-lg-7 p-0">
            <img class="img-fluid" src="{{asset('images/mozaik-1.jpg')}}" style="height:400px; width:100%;">
            <div class="bottom-left bold" style="font-size: 18px;">
                <p class="bold" style="font-size: 24px; line-height: 1.4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p>
                <p style="font-size: 15px; line-height: 1.5;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi</p>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="row">
                <img class="img-fluid" src="{{asset('images/mozaik-2.jpg')}}" style="height:200px; width:100%;">
                <div class="bottom-left bold" style="bottom: 52%;">Lorem ipsum dolor sit amet, consectetur.</div>
            </div>
            <div class="row">
                <img class="img-fluid" src="{{asset('images/mozaik-3.jpg')}}" style="height:200px; width:100%;">
                <div class="bottom-left bold" style="font-size: 18px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center py-4">
        <div id="carouselExampleIndicators" class="container carousel slide px-4">
            <ol class="carousel-indicators">
                @foreach ($articles->chunk(6) as $key => $chunk)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" <?php ($key == 0) ? 'class="active"' : '' ?>></li>
                @endforeach
            </ol>
            <div class="carousel-inner" style="height: 680px;">
                @foreach ($articles->chunk(6) as $key => $chunk)
                <div class="carousel-item {{ ($key==0)? 'active' : '' }}">
                    <div class="row mx-auto">
                        @foreach($chunk as $article)
                        <div class="card py-4 mx-auto container2" style="width: 21rem; border: none; background: transparent;">
                            <figure class="figure">
                                @if($article->image)
                                <img class="card-img-top image" src="<?php echo asset($article->image) ?>" style="height:210px;" alt="Card image cap">
                                @else
                                <img class="card-img-top image" src="<?php echo asset('/images/noimage.png') ?>" style="height:210px;" alt="Card image cap">
                                @endif
                                <div class="overlay">
                                    <a href="{{route('show-article', $article->id)}}">
                                        <p class="text-justify text px-2">
                                            <b style="font-size: 18px; color:#fc8e2e;">{{ Illuminate\Support\Str::limit($article->title, 50)}} </b><br><br>
                                            {{ Illuminate\Support\Str::limit($article->content, 125)}}
                                            <span style="color:#fc8e2e;">Read more...</span>
                                        </p>
                                    </a>
                                </div>
                                <figcaption class="figure-caption py-1" style="font-size: 12px;">{{$article->created_at->format('d M Y')}}</figcaption>
                            </figure>
                            <div class="card-body text-left p-0">
                                <p class="card-text" style="font-size: 18px;"><b>{{ Illuminate\Support\Str::limit($article->title, 100)}}</b></p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" style="width:5%;" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" style="width:5%;" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="row pb-5" style="background-color: #ffffff;">
        <div class="col-md-12 text-center">
            <h4 class="my-5">Client</h4>
            <img src="{{asset('images/akoma.jpg')}}" class="mx-5" style="height:40px">
            <img src="{{asset('images/thorntons.jpg')}}" class="mx-5" style="height:45px">
            <img src="{{asset('images/vieira.jpg')}}" class="mx-5" style="height:55px">
            <img src="{{asset('images/artfuels.jpg')}}" class="mx-5" style="height:55px">
            <img src="{{asset('images/erca.jpg')}}" class="mx-5" style="height:45px">
            <img src="{{asset('images/rose.jpg')}}" style="height:45px">
        </div>
    </div>
</div>

<div class="row py-3" style="background-color: #ffffff;">
    <div class="col-md-12 text-center">
        <img src="{{asset('images/card-facebook.jpg')}}" class="p-4" style="height:580px; width:330px;">
        <img src="{{asset('images/twitter-card.jpg')}}" class="p-4" style="height:580px; width:330px;">
        <img src="{{asset('images/card-instagram.jpg')}}" class="p-4" style="height:580px; width:330px;">
    </div>
</div>

@include('layouts.footer')
<!-- Footer -->
</div>
@endsection

@section('reg-style')
<style>
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        height: 100px;
        outline: black;
        background-size: 100%, 100%;
        border-radius: 50%;
        background-image: none;
    }

    .carousel-control-next-icon:after {
        content: '>';
        font-size: 35px;
        color: red;
    }

    .carousel-control-prev-icon:after {
        content: '<';
        font-size: 35px;
        color: red;
    }

    .carousel-indicators li {
        width: 10px;
        height: 10px;
        border-radius: 100%;
        background-color: orange;
    }

    .carousel-indicators {
        bottom: -25px;
    }

    .bottom-left {
        position: absolute;
        bottom: 8px;
        left: 16px;
        color: aliceblue;
        font-size: larger;
    }

    .container2 {
        position: relative;
        width: 100%;
    }

    .image {
        display: block;
        width: 100%;
        height: auto;
    }

    .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        transition: .5s ease;
        background-color: white;
    }

    .container2:hover .overlay {
        opacity: 1;
    }

    .text {
        font-size: 13px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }

    a {
        color: #636363;
        font-size: 13px;
    }

    #main-container {
        background-color: #E5E5E5;
    }
</style>
@endsection

@section('scriptcode')
<script>
    $(document).ready(function() {
        $('.carousel').carousel({
            interval: false,
        });
    })
</script>
@endsection