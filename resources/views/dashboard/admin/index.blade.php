@extends('layouts.backend-admin')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-block">
                    <div class="inline-block">
                        <h1 class="no-mrg-vertical">{!! config('app.currency') !!}{{number_format($pending_payments ?? 0, 2) }}</h1>
                        <p>Pending Payments</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-block">
                    <div class="inline-block">
                        <h1 class="no-mrg-vertical">{!! config('app.currency') !!}{{number_format($running_investments ?? 0, 2) }}</h1>
                        <p>Running Investments</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="row">
                    <div class="col-md-8">
                        <div class="padding-20">
                            <div id="monthly-target">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 border left border-hide-sm">
                        <div class="card-block">
                            <h2></h2>
                            <div class="widget-legends mrg-top-30">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-none d-md-inline-block">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-10 ml-auto mr-auto">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="pdd-vertical-5">
                                            <p class="no-mrg-btm"><b class="text-dark font-size-16">{{ $customer_count }}</b> Customers</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="pdd-vertical-5">
                                            <p class="no-mrg-btm"><b class="text-dark font-size-16">{{ $investment_count }}</b> Investments</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="pdd-vertical-5">
                                            <p class="no-mrg-btm"><b class="text-dark font-size-16">{{$payment_count}}</b> Payments</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="pdd-vertical-5">
                                            <p class="no-mrg-btm"><b class="text-dark font-size-16">{{ $package_count }}</b> Packages</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
