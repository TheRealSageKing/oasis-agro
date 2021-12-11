@extends('layouts.backend-client')

@section('title', 'Portfolio')

@section('content')
    <div class="page-title">
        <h4>My Portfolio</h4>
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
                                <th>Quantity</th>
                                <th>Amount</th>
                                <th>Duration</th>
                                <th>ROI</th>
                                <th>Maturity Date</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (isset($portfolios) && $portfolios->count() > 0 )
                                @php $i = 1; @endphp
                                @foreach($portfolios as $portfolio)
                                    <tr>
                                        <td>
                                            <div class="mrg-top-15">
                                                {{ $i++ }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <b class="text-dark">{{ $portfolio->package->name }}</b>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <b class="text-dark font-size-16">{{ $portfolio->qty }}</b>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <span class="text-dark"><b>{!! config('app.currency') !!}{{ number_format($portfolio->pkg_amt,2) }}</b></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <span class="text-dark"><b> {{ $portfolio->duration }}</b></span>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <span>{{ $portfolio->roi }}%</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <span>{{ $portfolio->maturity_date->format("m/d/Y")}}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="relative mrg-top-15">
                                                @if($portfolio->is_open)
                                                    <span class="status online"> </span>
                                                    <span class="pdd-left-20">Active</span>
                                                @else
                                                    <span class="status offline"> </span>
                                                    <span class="pdd-left-20">Inactive</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <span>{{ $portfolio->created_at->format("m/d/Y")}}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-10 text-center">
                                                <button class="btn btn-icon btn-flat btn-rounded dropdown-toggle">
                                                    <i class="ti-more-alt"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9">
                                        <div class="mrg-top-15 text-center">
                                            <b class="text-dark">No portfolio available at the moment</b>
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
