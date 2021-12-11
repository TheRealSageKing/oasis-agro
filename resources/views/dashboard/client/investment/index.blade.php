@extends('layouts.backend-client')

@section('title', 'Investments')

@section('content')
    <div class="page-title">
        <h4>Invest</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    @if(session()->has('error'))
                        <div class="alert alert-danger
">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <div class="table-overflow">
                        <table id="oasis-table" class="table table-lg">
                            <thead>
                            <tr>
                                <th width="40%"></th>
                                <th width="20%">ROI</th>
                                <th width="20%">Capital</th>
                                <th width="8%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($packages->count() > 0)
                                @php $i = 1; @endphp
                                @foreach($packages as $package)

                                    <tr>
                                        <td>
                                            <div class="list-info mrg-top-10 d-flex">
                                                <div class="img-frame" style="width:200px">
                                                    <img class="img-fluid" src="{{ asset($package->image) }}" alt="">
                                                </div>
                                                <div class="info">
                                                    <h4 class="title">{{ ucfirst($package->name) }}</h4>
                                                    <span class="font-size-12">{{ Str::limit($package->description, 100, $end = '....') }}</span><br>
                                                    <button class="btn btn-xs btn-default learn-more" data-id="{{$package->id}}"> learn more </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-10">
                                                <span class="sub-title">{{ $package->roi }}% returns in {{$package->duration}} days</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-10">
                                                <b class="sub-title text-primary font-size-14">{!! config('app.currency') !!} {{ number_format($package->amount, 2) }}</b>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-10 text-center dropdown inline-block">
                                                <a href="{{ route('client.packages.buy', $package->id) }}" class="btn btn-lg btn-info buy-package"> Buy Investment</a>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">
                                        <p>No package available at the moment.</p>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function(){
            $('#oasis-table').DataTable();
        });

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
                        $('#default-modal').modal();
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
                    <a href="#"> Download Brochure</a>
                </p>
            </div>

        </div>
    </div>
    <button data-dismiss="modal" class="btn btn-primary btn-block no-mrg no-border pdd-vertical-15 ng-scope">
        <span class="text-uppercase">Close</span>
    </button>
@endsection
