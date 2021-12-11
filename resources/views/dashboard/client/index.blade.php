@extends('layouts.backend-client')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-block">
                    <div class="inline-block">
                        <h1 class="no-mrg-vertical">{!! config('app.currency') !!}{{ number_format($wallet ?? 0) }}</h1>
                        <p>Wallet Balance</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-block">
                    <div class="inline-block">
                        <h1 class="no-mrg-vertical">{!! config('app.currency') !!}{{ number_format($ledger ?? 0) }}</h1>
                        <p>Total Invested</p>
                    </div>
                </div>
            </div>
        </div><div class="col-lg-4">
            <div class="card">
                <div class="card-block">
                    <div class="inline-block">
                        <h1 class="no-mrg-vertical">{{ $investmentCount ?? 0 }}</h1>
                        <p>Total Portfolios</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7 col-md-12">
            <div class="widget card">
                <div class="card-block">
                    <h5 class="card-title">Available for sale</h5>
                    <div class="row mrg-top-35">
                        <div class="col-md-12">
    <p>Coming soon</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-12">
            <div class="card">
                <div class="card-heading">
                    <h4 class="card-title inline-block pdd-top-5">Investment History</h4>
                    <a href="{{ url('my-portfolio') }}" class="btn btn-default pull-right no-mrg">All Transactions</a>
                </div>
                <div class="pdd-horizon-20 pdd-vertical-5">
                    <div class="overflow-y-auto relative scrollable" style="max-height: 381px">
                        <table class="table table-lg table-hover">
                            <tbody>
                            @if( isset($portfolioSummary) && $portfolioSummary->count() > 0)
                                @foreach($portfolioSummary as $trans)
                                    <tr>
                                        <td>
                                            <div class="list-info">
                                                <div class="info">
                                                    <span class="title">Jordan Hurst</span>
                                                    <span class="sub-title">ID 863</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-10">
                                                <span>8 May</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="relative mrg-top-10">
                                                <span class="status online"> </span>
                                                <span class="pdd-left-20">Confirmed</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">
                                        <div class="mrg-top-10">
                                            <span>Dont ruffle your feathers yet. Your profits will roll in shortly.</span>
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
