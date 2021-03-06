@extends('layouts.app')

@section('page-title')

@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <div class="" style="text-align:center;">
        <p>Promotion Detail</p>

      </div>
      <div class="card mt-4">
        <img class="card-img-top img-fluid" src='{{ url("storage/promotions/$promotion->reward_img") }}'style="width:100%;height:100%;max-width:900px" alt="">
        <div class="card-body">
          <div class="">
            <h2>reward :  {{ $promotion->reward_name }}</h2>
            <h4>by  {{$promotion->cardTemplate->shop->name}}</h4>
        </div>
          <div class="" style="font-size:40px;color:red">
              <p> <i class="fa fa-product-hunt"></i><strong>     {{ $promotion->point }} Point</strong></p>
          </div>
          <div class="condition">
            <h4>Condition</h4>
            <p>{{ $promotion->condition }}</p>
            <small class="text-muted">Exp:   {{\Carbon\Carbon::parse($promotion->exp_date)->diffForHumans() }}</small>
            <hr>
            <form class="" action="/maitahome/{{$promotion->id}}" method="post">
              @csrf
              <input type='hidden' name="promotion_id" value=" {{$promotion->id}} " />
              <button type="submit"  class="btn btn-success"name="button">card</button>
            </form>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>





@endsection
