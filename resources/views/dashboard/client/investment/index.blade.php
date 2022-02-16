@extends('layouts.backend-client')

@section('title', 'Investments')

@section('content')
    <div class="page-title">
        <h4>Invest</h4>
    </div>
    <div class="row">
        <div class="col-xs-12">
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-block row">

                    @if($packages->count() > 0)
                        @foreach($packages as $package)
                            <!-- Team member -->
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="image-flip" >
                                    <div class="mainflip flip-0">
                                        <div class="frontside">
                                            <div class="card shield-shadow">
                                                <img class="card-img-top max-h-250" src="{{ url($package->image) }}" alt="Card image cap">
                                                <div class="card-body text-center">
                                                    {{--                                                <p><img class=" img-fluid" src="" alt="card image"></p>--}}
                                                    <h4 class="card-title">{{ ucfirst($package->name) }}</h4>
                                                    <ul class="card-text text-left list-unstyled">
                                                        <li class="flex flex--end">
                                                    <span class="leading">
                                                        Amount:
                                                    </span>
                                                            <span>
                                                        {!! config('app.currency') !!}{{ number_format($package->amount, 2) }}
                                                    </span>
                                                        </li>
                                                        <li class="flex">
                                                    <span class="leading">
                                                        Duration:
                                                    </span>
                                                            <span>
                                                        {{ $package->duration }} days
                                                    </span>
                                                        </li>
                                                        <li class="flex">
                                                    <span class="leading">
                                                        ROI:
                                                    </span>
                                                            <span>
                                                        {{ $package->roi }}%
                                                    </span>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="backside w-100">
                                            <div class="card shield-back-shadow">
                                                <div class="card-body text-center mt-4">
                                                    <h4 class="card-title">How it works</h4>
                                                    <p class="card-text">
                                                        {{ Str::limit($package->description, 250, $end = '....') }}
                                                    </p>
                                                    <a class="btn btn-xs btn-outline-secondary learn-more d-block" data-id="{{$package->id}}" href="javascript:void()"> learn more </a>
{{--                                                    <a href="{{ route('client.packages.buy', $package->id) }}" class="d-block btn btn-success btn-sm text-white text--sm">--}}
{{--                                                        <i class="fa fa-plus"></i> Buy Investment</a>--}}
                                                    <a href="#" data-id="{{ $package->id }}" class="d-block btn btn-success btn-sm text-white text--sm buy-package">
                                                        <i class="fa fa-plus"></i> Buy Investment</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ./Team member -->
                        @endforeach
                    @else
                        <p>No package available at the moment.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        // $(document).ready(function(){
        //     $('#oasis-table').DataTable();
        // });

        $(document).on('click', '.learn-more', function (e) {
            let packageId = $(this).data('id');
            $.ajax({
                url: "{{ route('client.packages.detail', 'XXX' ) }}".replace('XXX', packageId),
                type: 'GET',
                success: function(response){
                    if (response.success)
                    {
                        let data = response.data;
                        $('#packageCost').html( data.amount );
                        $('#packageDuration').html( data.duration );
                        $('#packageROI').html( data.roi );
                        $('#packageName').html( data.name );
                        $('#packageDescription').html( data.description );
                        $('#packageImage').attr('src',  data.image );
                        $('#brochureImage').html( data.brochure_name );
                        console.log(data.brochure);
                        if (data.brochure !== null)
                        {
                            $('#brochureSrc').show()
                            $('#brochureSrc').attr("href","{{ url('XXX') }}".replace('XXX', data.brochure?.substr(1)))
                        }else{
                            $('#brochureSrc').hide()
                        }

                        $('#default-modal').modal();
                    }
                }
            })
        });

        $(document).on('click', '.buy-package', function (e) {
            let packageId = $(this).data('id');

            $.ajax({
                url: "{{ route('client.packages.detail', 'XXX' ) }}".replace('XXX', packageId),
                type: 'GET',
                success: function(response){
                    if (response.success)
                    {
                        console.log(response);
                        let pkg = response.data;
                        $('.amount').html(pkg.amount);
                        $('.pkg-name').html(pkg.name);
                        $('.duration').html(pkg.duration);
                        $('.roi').html(pkg.roi);
                        $("#pkg-cost").val(pkg.amount);
                        $('#amt-to-spend').html(formatMoney(pkg.amount, 2,".",","));
                        $('#pkg-amt-kobo').val(pkg.amount * 100);
                        $('#side-modal-r').modal();
                    }
                }
            })
        });

        $(document).on('submit', '#form', function(e){
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url : "{{ route('admin.packages.store') }}",
                type: 'POST',
                data: formData,//$(this).serialize(),
                cache:false,
                contentType: false,
                processData: false,
                success: function(data){
                    if (data.success)
                    {
                        toastr.success(data.message);
                        document.getElementById("form").reset();
                        location.reload();
                    }else{
                        toastr.error(data.message);
                    }

                    submitBtn.html('Create Package').prop('disabled', false);

                },
                error: function(err)
                {
                    let response = JSON.parse(err.responseText);
                    toastr.error(response.message);
                    submitBtn.html('Create Package').prop('disabled', false);
                }
            });
            return false;
        });

        $(document).ready(function(){
            calculateCost();
            $(document).on('change', '#quantity', function(){
                calculateCost();
            })
        });

        calculateCost = ()=>
        {
            let pkgcost = $("#pkg-cost").val();
            let kobo = $("#pkg-amt-kobo");
            let qty = $('#quantity').val();
            let amtToSpend = $('#amt-to-spend');

            let cost = pkgcost * qty;
            amtToSpend.html(formatMoney(cost, 2,".",","));
            kobo.val( pkgcost * 100);
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

@section('modal-content')
    <div class="modal-body">
        <div class="text-center">
            <img class="img-responsive mrg-horizon-auto mrg-vertical-25 img-fluid" id="packageImage" src="{{ asset('assets/images/others/img-1.jpg') }}" alt="">
            <h3 id="packageName">Package Name</h3>
            <p><span id="packageROI">0</span>% returns in <span id="packageDuration">0</span> day(s)</p>
            <p>Starting at {!! config('app.currency') !!} <span id="packageCost">0.00</span> per unit/plot/Gallon</p>
            <div class="d-block">
                <p id="packageDescription">Package description</p>
                <p id="packageBrochure">
                    <a href="#" id="brochureSrc"> Download Brochure</a>
                </p>
            </div>

        </div>
    </div>
    <button data-dismiss="modal" class="btn btn-primary btn-block no-mrg no-border pdd-vertical-15 ng-scope">
        <span class="text-uppercase">Close</span>
    </button>
@endsection

@section('side-modal-content')
    <div class="modal-body">
        <form action="{{ route('pay') }}" method="post" class="mt-5" class="form-horizontal" role="form">
            @csrf
            <input type="hidden" name="email" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}"> {{-- required --}}
            <input type="hidden" name="first_name" value="{{ \Illuminate\Support\Facades\Auth::user()->first_name }}"> {{-- required --}}
            <input type="hidden" name="last_name" value="{{ \Illuminate\Support\Facades\Auth::user()->last_name }}"> {{-- required --}}

            <input type="hidden" name="amount" value="{{$package->amount * 100}}" id="pkg-amt-kobo"> {{-- required in kobo --}}
            <input type="hidden" value="{{$package->amount}}" id="pkg-cost"> {{-- required in kobo --}}
            <input type="hidden" name="currency" value="NGN">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['package_name' => $package->name, 'cost'=>$package->amount, 'duration'=>$package->duration, 'roi'=>$package->roi,'uuid' =>$package->id]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}

            <div class="form-group row text-center">
                <div class="col-sm-12 alert alert-warning">
                    <p>You are about to purchase the following investment</p>
                    <p><b class="pkg-name">{{ $package->name }}</b></p>
                    <p><span class="roi">{{$package->roi}}</span>% return in <span class="duration">{{$package->duration}}</span> days</p>
                    <p>unit price @ {!! config('app.currency') !!} <span class="amount">{{number_format($package->amount)}}</span></p>
                    <h3>{!! config('app.currency') !!}<span id="amt-to-spend">{{ number_format($package->amount, 2) }}</span></h3>
                </div>
            </div>
            <div class="form-group">
                <label>
                    Order Number
                </label>
                <input type="text" readonly class="form-control" name="orderID" value="INV-{{ time() }}-{{ date('Y') }}">
            </div>
            <div class="form-group">
                <label>
                    Enter quantity of units you want to buy
                </label>
                <input type="number" value="1" class="form-control" placeholder="Quantity" min="1" name="quantity" id="quantity">
            </div>

            <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                <i class="fa fa-plus-circle fa-lg"></i> Buy this Package!
            </button>
        </form>
    </div>
    <button data-dismiss="modal" class="btn btn-primary btn-block no-mrg no-border pdd-vertical-15 ng-scope">
        <span class="text-uppercase">Close</span>
    </button>
@endsection
