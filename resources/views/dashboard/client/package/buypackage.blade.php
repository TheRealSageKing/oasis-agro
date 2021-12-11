@extends('layouts.backend-admin')

@section('title', 'Packages')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-block">
                    <form action="{{ route('pay') }}" method="post" id="form"  accept-charset="UTF-8" class="form-horizontal" role="form">
                        @csrf
                        <input type="hidden" name="email" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}"> {{-- required --}}
                        <input type="hidden" name="first_name" value="{{ \Illuminate\Support\Facades\Auth::user()->first_name }}"> {{-- required --}}
                        <input type="hidden" name="last_name" value="{{ \Illuminate\Support\Facades\Auth::user()->last_name }}"> {{-- required --}}
                        <input type="hidden" name="orderID" value="INV-{{ time() }}-{{ date('Y') }}">
                        <input type="hidden" name="amount" value="{{$package->amount * 100}}"> {{-- required in kobo --}}
                        <input type="hidden" value="{{$package->amount}}" id="pkg-cost"> {{-- required in kobo --}}
                        <input type="hidden" name="currency" value="NGN">
                        <input type="hidden" name="metadata" value="{{ json_encode($array = ['package_name' => $package->name, 'cost'=>$package->amount, 'duration'=>$package->duration, 'roi'=>$package->roi,'uuid' =>$package->id]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                        <div class="form-group row text-center">
                            <div class="col-sm-12">
                                <p>You are about to purchase the following investment</p>
                                <p><b>{{ $package->name }}</b></p>
                                <p>{{$package->roi}}% return in {{$package->duration}} days</p>
                                <p>unit price @ {!! config('app.currency') !!}{{number_format($package->amount)}}</p>
                                <h3>{!! config('app.currency') !!}<span id="amt-to-spend">{{ number_format($package->amount, 2) }}</span></h3>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>
                                Enter quantity of units you want to buy
                            </label>
                            <input type="number" value="1" class="form-control" placeholder="Quantity" min="1" name="quantity" id="quantity">
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <input type="number" class="form-control" placeholder="Package Cost" name="package_amount" id="packageCost" >--}}
{{--                        </div>--}}

                        <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                            <i class="fa fa-plus-circle fa-lg"></i> Buy this Package!
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            calculateCost();
            $(document).on('change', '#quantity', function(){
                calculateCost();
            })
        });

        calculateCost = ()=>
        {
            let pkgcost = $("#pkg-cost").val();
            let qty = $('#quantity').val();
            let amtToSpend = $('#amt-to-spend');

            let cost = pkgcost * qty;
            amtToSpend.html(formatMoney(cost, 2,".",","));
        }

        function formatMoney(number, decPlaces, decSep, thouSep) {
            decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
                decSep = typeof decSep === "undefined" ? "." : decSep;
            thouSep = typeof thouSep === "undefined" ? "," : thouSep;
            var sign = number < 0 ? "-" : "";
            var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
            var j = (j = i.length) > 3 ? j % 3 : 0;

            return sign +
                (j ? i.substr(0, j) + thouSep : "") +
                i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) +
                (decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");
        }
    </script>
@endsection
