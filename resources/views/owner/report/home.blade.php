@extends("layouts.app")



@section("content")
    <div class="container" id="report">
        <div class="row">
            <div class="col-12">
                <div class="select-shop" style="float:right">
                    <h5 style="display:inline; margin-right:10px">Shop</h5>
                    <div class="dropdown show" style="display:inline">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $shop->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @foreach($shops as $shop)
                                <a class="dropdown-item" href="{{ route('report', ['shop_id'=>$shop->id])}}">{{$shop->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div class="top-block">
                    Customer of Day
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="top-block">
                    Points Earn
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="top-block">
                    Exchange Times
                </div>
            </div>
        </div>

        <div class="row chart-group">
            <div class="col-8">
                <div class="card">
                    <h5 class="card-header">Exchange Rate</h5>
                    <canvas class="card-body" id="exchangeChart" width="400" max-height="100"></canvas>
                    <p style="text-align:center">
                        exchange - promotion
                    </p>
                    
                </div>
            </div>
            <div class="col-4 side-container">
                <div class="simple-block" style="flex-grow:1">
                    <p>
                        EXCHANGE <br>
                        PROMOTION
                    </p>
                </div>
                <div class="simple-block" style="flex-grow:1">
                    <p>
                        EXCHANGE <br>
                        AGE
                    </p>
                </div>
                <div class="simple-block" style="flex-grow:1">
                    <p>
                        EXCHANGE <br>
                        GENDER
                    </p>
                </div>
            </div>
        </div>

        <div class="row chart-group">
            <div class="col-4 side-container">
                <div class="simple-block" style="flex-grow:1">
                    <p>
                        POINT RECEIVE <br>
                        TIME
                    </p>
                </div>
                <div class="simple-block" style="flex-grow:1">
                    <p>
                        POINT RECEIVE <br>
                        AGE
                    </p>
                </div>
                <div class="simple-block" style="flex-grow:1">
                    <p>
                        POINT RECEIVE <br>
                        GENDER
                    </p>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <h5 class="card-header">Point Receive</h5>
                    <canvas class="card-body" id="pointReceiveChart" width="400" max-height="400"></canvas>
                    <p style="text-align:center">
                        exchange - promotion
                    </p>
                    
                </div>
            </div>
        </div>

        <div class="row chart-group">
            <div class="col-8">
                <div class="card">
                    <h5 class="card-header">Point Available</h5>
                    <canvas class="card-body" id="pointAvailableChart" width="400" max-height="100"></canvas>
                    <p style="text-align:center">
                        exchange - promotion
                    </p>
                    
                </div>
            </div>
            <div class="col-4 side-container">
                <div class="simple-block" style="flex-grow:1">
                    <p>
                        POINT AVAILABLE <br>
                        AGE
                    </p>
                </div>
                <div class="simple-block" style="flex-grow:1">
                    <p>
                        POINT AVAILABLE <br>
                        GENDER
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("js")
    <script>
        var exchangeData = JSON.parse('{!! json_encode($exchangeData) !!}');
        var pointReceiveData = JSON.parse('{!! json_encode($pointReceiveData) !!}');
        var pointAvailableBundle = JSON.parse('{!! json_encode($pointAvailableData) !!}');
    </script>
    <script src="{{ asset('js/report-home.js') }}"></script>
@endpush
@push("css")
    <link href="{{ asset('css/report.css') }}" rel="stylesheet">
@endpush