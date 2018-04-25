@extends("layouts.app")

@section("content")
    <div class="container" id="pointReceive-gender">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <canvas style="padding:5px;" class="card-body" id="pointReceiveChart" width="400" max-height="100"></canvas>
            </div>
            <div class="col-xs-12 col-md-4 side-menu" style="height:300px">
                <h4>
                    Select Card Template
                </h4>
                <div class="side-scroll">
                    @foreach($datasets as $dataset)
                    <div class="form-check">
                        <input v-on:change="onCheckPromotion({{$dataset['template_id']}})" name="template" class="form-check-input" type="radio" value="" id="promotion-select-{{$dataset['template_id']}}">
                        <label class='form-check-label' for="promotion-select-{{$dataset['template_id']}}">
                            {{ $dataset['template_name'] }}
                        </label>
                    </div>
                    @endforeach 
                </div>
                
            </div>
        </div>

        <div class="row">
            <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Template Name</th>
                    @foreach($label as $gender)
                        <th scope="col">{{$gender}}</th>
                    @endforeach
                    
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($datasets as $dataset)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $dataset['template_name'] }}</td>
                        <td>{{ $dataset['data']['male'] }}</td>
                        <td>{{ $dataset['data']['female'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push("js")
    <script>
        var label = JSON.parse('{!! json_encode($label) !!}');
        var datasets = JSON.parse('{!! json_encode($datasets) !!}');
        console.log(datasets);
    </script>
    <script src="{{ asset('js/report-pointReceive-gender.js') }}"></script>
@endpush
@push("css")
    <link href="{{ asset('css/report.css') }}" rel="stylesheet">
@endpush