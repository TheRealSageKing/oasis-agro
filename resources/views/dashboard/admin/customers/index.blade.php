@extends('layouts.backend-admin')

@section('title', 'Clients')

@section('content')
    <div class="page-title">
        <h4>Clients</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class="table-overflow">
                        <table id="oasis-table" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Total<br> Investments</th>
                                <th>Balance</th>
                                <th>Ledger Balance</th>
                                <th>Account</th>
                                <th>Created Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (isset($customers) && $customers->count() > 0 )
                                @php $i = 1; @endphp
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>
                                            <div class="mrg-top-15">
                                                {{ $i++ }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <span>{{ $customer->first_name }} {{ $customer->last_name }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <span>{{ $customer->email }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <span><b>{{ $customer->phone ?? 'N/A'}}</b></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <span>{{ $customer->investments->count() }}</span>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="mrg-top-15 text-right">
                                                <span>{!! config('app.currency') !!}{{ number_format($customer->wallet, 2) }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15 text-right">
                                                <span>{!! config('app.currency') !!}{{ number_format($customer->ledger, 2) }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                @if ( $customer->bank )
                                                    <span>{{ $customer->bank }}</span><br/>
                                                    <span>{{ $customer->account_no }}</span>
                                                @else
                                                    <span> N/A </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <span>{{ $customer->created_at->format("m/d/Y")}}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9">
                                        <div class="mrg-top-15 text-center">
                                            <b class="text-dark">No customers available at the moment</b>
                                        </div>
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
    <div class="modal-body">
        <div class="text-center">
            <img class="img-responsive mrg-horizon-auto mrg-vertical-25" src="assets/images/others/img-1.jpg" alt="">
            <h3>Espire</h3>
            <p>18 items</p>
        </div>
    </div>
    <button data-dismiss="modal" class="btn btn-primary btn-block no-mrg no-border pdd-vertical-15 ng-scope">
        <span class="text-uppercase">View Now</span>
    </button>
@endsection

@section('side-modal-content')
    <div class="side-modal-wrapper">
        <div class="vertical-align">
            <div class="table-cell">
                <div class="pdd-horizon-15">
                    <h4>Sign Up</h4>
                    <p class="mrg-btm-15 font-size-13">Please enter your email and password to create account</p>
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email Adress">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox font-size-12">
                            <input id="agreement-2" name="agreement-2" type="checkbox">
                            <label for="agreement-2">I agree with the <a href="#">Privacy &amp; Policy</a></label>
                        </div>
                        <button class="btn btn-info btn-sm">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <span>Already have an account? <a href="#">Login Now</a></span>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#oasis-table').DataTable();
        });
    </script>
@endsection
