@extends('layouts.backend-client')

@section('title', 'Investment Details')

@section('content')
    <div class="page-title">
        <h4>{{ $investment->package->name }}</h4>
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

        <div class="col-md-4 col-xs-12">
            <div class="card">
                <img class="card-img-top" src="{{ $investment->package->image ? $investment->package->image: 'https://picsum.photos/200/150/?random' }}">
                <div class="card-block">
                    <h4 class="card-title">{{ $investment->package->name }}</h4>
                    <div class="meta">
                        <ul class="list-unstyled">
                            <li>
                                <p>ROI: {{ $investment->package->roi }}%</p>
                            </li>
                            <li>
                                <p>Principal: {!! config('app.currency') !!}{{ number_format($investment->pkg_amt * $investment->qty) }}</p>
                            </li>
                            <li>
                                <p>Returns: {!! config('app.currency') !!}{{ number_format(($investment->pkg_amt * $investment->qty) * (1 + ($investment->roi / 100))) }}</p>
                            </li>
                            <li>
                                <p>Duration: {{ $investment->duration }} days</p>
                            </li>
                            <li>
                                <p>Created Date: {{ $investment->created_at->format("m/d/Y") }}</p>
                            </li>
                            <li>
                                <p>Maturity Date: {{ $investment->maturity_date->format("m/d/Y") }}</p>
                            </li>
                        </ul>
                    </div>
                    <div class="card-text">
                        {{ $investment->package->description }}
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-8 col-xs-12">
            <div class="card">
                <div class="card-block">
                    <div class="table-overflow">
                        <table id="oasis-table" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Subject</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Created Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (isset($investment->investment_histories) && $investment->investment_histories->count() > 0 )
                                @php $i = 1; @endphp
                                @foreach($investment->investment_histories as $history)
                                    <tr>
                                        <td>
                                            <div class="mrg-top-15">
                                                {{ $i++ }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <b class="text-dark"> Interest paid</b>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <b class="text-dark font-size-16">{{ $history->amount_paid }}</b>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <span class="text-dark"><b>paid</b></span>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="mrg-top-15">
                                                <span>{{ $history->created_at ? $history->created_at->format("m/d/Y") : '' }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9">
                                        <div class="mrg-top-15 text-center">
                                            <b class="text-dark">Patience.. your interests will roll in soon</b>
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
