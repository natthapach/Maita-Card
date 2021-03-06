@extends('layouts.app')

@section('content')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.12';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <div class="row m-2">
        <div class="card-header h3 font-weight-bold bg-dark text-white">
            <i class="fa fa-maxcdn" aria-hidden="true"></i>
             Card
        </div>
        <div class="col-lg-5 card m-2 p-0">
            <div class="h2 card-header d-flex justify-content-between">
                <div>
                    <div class="h2">
                        {{$card->cardTemplate->name}}
                    </div>
                    <div class="h4">
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        {{$card->cardTemplate->style}}
                    </div>
                </div>
                <div id="social-links">
                    <div class="fb-share-button"
                         data-href="{{ url('/').'/'.$card->cardTemplate->id.'/rewards' }}"
                         data-layout="button">
                    </div>
        {{--            <a target="_blank"
                       onclick="shareToFB()"
                       class="h3 social-button my-class text-primary font-weight-bold" id="my-id">
                        Share
                        <span class="fa fa-facebook-official fa-1x"></span>
                    </a>

                    <script>
                        function shareToFB() {
                            let left = (screen.width/2)-(500/2);
                            let top = (screen.height/2)-(300/2);
                            let url = "https://www.facebook.com/sharer/sharer.php?u={{ url('/') }}";
                            window.open(url,
                                'facebook-share-dialog',
                                'width=500,height=300, top='+top+', left='+left);
                        }
                    </script>--}}
                </div>
            </div>

            <div class="card-body d-flex flex-row flex-wrap align-items-center justify-content-around">
                <div class="d-flex justify-content-around">
                    <img src="{{ url('storage/cards/'.$card->CardTemplate->img) }}"
                         width="350" height="200" alt="{{ $card->CardTemplate->img }}">

                </div>
                <div class="d-flex flex-column align-items-center">
                    @if($card->cardTemplate->style === 'point')
                        <div class="m-2">
                            <p class="h1 py-2 card-body bg-dark text-white font-weight-bold">
                                <i class="fa fa-product-hunt" aria-hidden="true"></i>
                                {{$card->point}}
                            </p>
                        </div>
                        <div>
                            <label class="my-2 font-weight-bold">
                                Checkin
                                <i class="fa fa-plus"></i>
                                {{$card->checkin_point}}
                            </label>
                        </div>
                    @else
                        <div class="">
                            <p class="h1 py-2 card-body bg-dark text-white font-weight-bold">
                                <i class="fa fa-product-hunt" aria-hidden="true"></i>
                                {{$card->point}}
                            </p>
                        </div>
                        <div>
                            <label class="my-2 font-weight-bold">
                                <i class="fa fa-stop-circle" aria-hidden="true"></i>
                                Stamp
                            </label>
                        </div>
                    @endif
                </div>


            </div>
            <a href="/{{$card->template_id}}/rewards"
               class="btn btn-dark font-weight-bold w-100">
                Redeem Point
                <i class="fa fa-gift" aria-hidden="true"></i>
            </a>
        </div>


        <div class="col-lg-5 card m-2 p-0">
            <div class="card-header h4"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Shop</div>
            <div class="h2 card-body mb-0">
                {{$card->cardTemplate->shop->name}}
                <div class="h5">
                    {{$card->cardTemplate->shop->category}}
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-around  align-items-center card-body">
                <div class="">
                    <img src="{{ url('storage/logos/'.$card->CardTemplate->shop->logo_img) }}"
                         width="120" height="120" alt="{{ $card->CardTemplate->shop->logo_img }}">
                </div>
                <div class="h4">
                    <label class="">
                        <i class="fa fa-user"></i>
                        {{$card->cardTemplate->shop->owner->fname .' '. $card->cardTemplate->shop->owner->lname}}
                    </label>
                    <br>
                    <label class="">
                        <i class="fa fa-phone-square"></i>  {{$card->cardTemplate->shop->phone}}
                    </label>
                    <br>
                    <label class="">
                        <i class="fa fa-envelope"></i>  {{$card->cardTemplate->shop->email}}
                    </label>
                </div>


            </div>
        </div>

    </div>
@endsection

@push('js')
    <script src="{{ asset('js/share.js') }}"></script>
@endpush