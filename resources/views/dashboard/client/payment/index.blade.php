@extends('layouts.backend-client')

@section('title', 'Payment History')

@section('content')
    <div class="page-title">
        <h4>Pending Payment Requests</h4>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="inline-block">
                        <h3 class="no-mrg-vertical">{!! config('app.currency') !!}{{number_format($wallet ?? 0, 2) }}</h3>
                        <p>Wallet Balance</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="inline-block">
                        <h3 class="no-mrg-vertical">{!! config('app.currency') !!}{{number_format($ledger ?? 0, 2) }}</h3>
                        <p>Total Invested</p>
                    </div>
                </div>
            </div>
        </div>
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

                    <button data-toggle="modal" data-target="#default-modal" class="btn btn-sm btn-primary" id="createBtn">Request payment</button>
                    <a href="{{ route('client.payments.history') }}" class="btn btn-sm btn-success">History</a>
                    <div class="table-overflow">
                        <table id="oasis-table" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Transaction Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($payments->count() > 0)
                                @php $i = 1; @endphp
                                @foreach($payments as $payment)

                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <span><b> {{ $payment->payment_type }}</b></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <b class="text-dark font-size-16">{!! config('app.currency') !!}{{ number_format($payment->amount) }}</b>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="relative mrg-top-15">
                                                <span class="status online"> </span>
                                                <span class="pdd-left-20">{{ $payment->status }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <span>
                                                    {{ $payment->created_at->format("m/d/Y")}}
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-10 text-center dropdown inline-block">
                                                <button class="btn btn-icon btn-flat btn-rounded dropdown-toggle" type="button" data-toggle="dropdown">
                                                    <i class="ti-more-alt"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="#" data-id="{{$payment->id}}" class="edit">Edit</a>
                                                    </li>
                                                    @if($payment->investments->count() == 0)
                                                        <li>
                                                            <form class="delete-form" action="{{ route('admin.packages.destroy', $payment->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-link">Delete</button>
                                                            </form>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">
                                        <p>No payment available at the moment.</p>
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

@section('modal-content')
    <form id="form" >
        <div class="modal-body">
            <div class="alert alert-info">
                <p>Enter amount you want to retrieve and your password to confirm transaction</p>
            </div>
            @csrf
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Amount" name="amount" id="amount" min="1000" value="1000">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Confirm Password" name="password" id="password">
            </div>
        </div>
        <input type="submit" class="btn btn-primary btn-block no-mrg no-border pdd-vertical-15 ng-scope" value="View Now"/>
    </form>
@endsection

@section('scripts')
    <script type="text/javascript">

        var loadFile = function(event, outputId) {
            var output = document.getElementById(outputId);
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

        var loadFileName = function(event, outputId) {

            $(outputId).html(event.target.files[0].name);
        };

        var triggerUpload = function(event, triggerId){
            event.preventDefault();
            $(triggerId).trigger('click');
        }

        $(document).ready(function(){
            $('#oasis-table').DataTable();
        });

        document.getElementById('createBtn').addEventListener('click', function(){
            $('#submitBtn').html('Create Package');
        })

        $(document).on('submit', '#form', function(e){
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url : "{{ route('client.payments.request') }}",
                type: 'POST',
                data: formData,
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

                    submitBtn.html('Request Payment').prop('disabled', false);

                },
                error: function(err)
                {
                    let response = JSON.parse(err.responseText);
                    toastr.error(response.message);
                    submitBtn.html('Request Payment').prop('disabled', false);
                }
            });
            return false;
        });
    </script>
@endsection
