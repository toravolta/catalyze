@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-1 col-md-8 mx-auto">
        <div class="col-md-12">
            @if(Auth::check())
            <div class="text-center my-3">
                <a href="{{ route('article.index') }}" class="btn btn-primary">Back</a>
            </div>
            @endif
            <p style="font-size: 11px;"><strong>Blog </strong>/ lorem ipsum dolor sit amet</p>
            <h1 class="bold">{{ucfirst($article->title)}}</h1>
            <p style="font-size: 11px;">{{$article->user->name}} / {{ $article->created_at->format('d F Y') }} / <?php $topic = [1 => 'Reuse and Recycling', 2 => 'Valuing Ecosystem Service', 3 => 'REDD++'];
                                                                                                                    $label = $topic[$article->topic] ?> {{$label}} /</p>
            <p class="bold f11" style="font-size: 11px;">Topics
                <button class="btn btn-light mx-1 no-border f11 {{ ($article->topic == 2)? 'active_article' : '' }}">Valueing ecosystem service</button>
                <button class="btn btn-light mx-1 f11 {{ ($article->topic == 1)? 'active_article' : ''}}">Reuse and Recycling</button>
                <button class="btn btn-light mx-1 f11 {{ ($article->topic == 3)? 'active_article' : ''}}">RED+</button>
            </p>

            <h3>{{ Illuminate\Support\Str::limit($article->content, 100)}}</h3>

            <div class="mt-4">
                <p>
                    <b>HEADING 1</b>
                </p>
                <p class="text-justify">{{ Illuminate\Support\Str::limit($article->content, 200)}}</p>
                <figure class="figure w-100">
                    @if($article->image)
                    <img class="card-img-top image" src="<?php echo asset($article->image) ?>" style="height:260px;" alt="Card image cap">
                    @else
                    <img class="card-img-top image" src="<?php echo asset('/images/noimage.png') ?>" style="height:210px;" alt="Card image cap">
                    @endif
                    <figcaption class="figure-caption py-1" style="font-size: 12px;">{{Illuminate\Support\Str::limit($article->title, 50)}}</figcaption>
                </figure>
                <p class="text-justify">
                    {{ Illuminate\Support\Str::limit($article->content, 200)}}
                </p>

                <div style="border-bottom: 1px solid #c2c2c2; border-top: 1px solid #c2c2c2;" class="my-4 text-center">
                    <i style="color:#66CFEB; font-size:18px;"><b>{{ Illuminate\Support\Str::limit($article->content, 150)}}</b></i>
                </div>

                <p class="text-justify">
                    {{ $article->content}}
                </p>
            </div>

            <div style="border-bottom: 1px solid #c2c2c2;" class="py-3">
                <ul class="list-inline">
                    <li class="list-inline-item"><b>SHARE ON</b></li>
                    <li class="list-inline-item"><img src="{{asset('images/share_fb.jpg')}}"></li>
                    <li class="list-inline-item"><img src="{{asset('images/share_twit.jpg')}}"></li>
                    <li class="list-inline-item"><img src="{{asset('images/share_goo.jpg')}}"></li>
                    <li class="list-inline-item"><img src="{{asset('images/share_rss.jpg')}}"></li>
                </ul>
            </div>

            <div class="row pt-5">
                <div class="col-md-2">
                    <img class="pl-3" src="{{asset('images/propic.jpg')}}">
                </div>

                <div class="col-md-10">
                    <p><b>John Username</b><br><span class="f11">Public Relations, WWF</span></p>
                    <p class="text-justify">
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                        sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                        consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui
                        dolorem ipsum quia dolor sit amet, consectetur.
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.footer')
<!-- Footer -->
</div>
@endsection

@section('reg-style')
<style>
    .f11 {
        font-size: 11px;
    }

    .active_article {
        border: 1px solid #fc8e2e;
        color: #fc8e2e;
    }

    a {
        color: #636363;
        font-size: 13px;
    }

    #main-container {
        background-color: #ffffff;
    }
</style>
@endsection

@section('scriptcode')
<script>

</script>
@endsection