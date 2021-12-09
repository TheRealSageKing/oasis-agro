@extends('layouts.backend-admin')

@section('title', 'Payments')

@section('content')
    <div class="page-title">
        <h4>Pending Payments</h4>
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
                        <table id="oasis-table" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Client Name</th>
                                <th>Amount</th>
                                <th>Payment Type</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($payments) && $payments->count() > 0)
                                @php $i = 1; @endphp
                                @foreach($payments as $payment)

                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <span><b> {{ $payment->user->first_name }} {{ $payment->user->last_name }}</b></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <span class="text-dark font-size-16">{!! config('app.currency') !!} {{ number_format($payment->amount) }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                                <span class="text-dark"><b> {{ $payment->payment_type }} day(s)</b></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="relative mrg-top-15">
                                                <span class="pdd-left-20">Pending</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mrg-top-15">
                                        <span>
{{--                                            {{ $payment->created_at->diffForHumans() }}--}}
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
                                                        <a href="#" data-id="{{$payment->id}}" class="edit">Mark as paid</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <p>No payment pending for you at the moment.</p>
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

@section('side-modal-content')
    <div class="side-modal-wrapper">
        <div class="vertical-align">
            <div class="table-cell">
                <div class="pdd-horizon-15">
                    <h4>Create a Package</h4>
                    <p class="mrg-btm-15 font-size-13">A new investment package for client/customers to invest in</p>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('admin.packages.store') }}" method="post" id="form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="edit" value="" id="packageEdit">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Package Name" name="package_name" id="packageName">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Package Cost" name="package_amount" id="packageCost">
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="">Duration</label>
                                <select name="package_duration" id="packageDuration" class="form-control">
                                    <option value="30">1 month</option>
                                    <option value="90">3 months</option>
                                    <option value="180">6 months</option>
                                    <option value="360">12 months</option>
                                    <option value="540">18 months</option>
                                    <option value="720">24 months</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="">ROI</label>
                                <input type="number" id="packageROI" max="100" min="1" class="form-control" placeholder="ROI (in percentage)" name="package_roi">
                            </div>

                        </div>
                        <div class="form-group">
                            <textarea name="package_description" id="packageDescription" cols="30" rows="10" class="form-control" placeholder="Package Description"></textarea>
                        </div>

                        <div class="form-group row">
                            <div class="col-8">

                                <input type="file" name="package_image" id="packageImage" class="hide-me" onchange="loadFile(event, 'fileImage');"/>
                                <button class="btn btn-sm btn-default btn-block" id="imgUploadBtn" type="button" onclick="triggerUpload(event, '#packageImage');"><i></i> upload image</button>

                                <input type="file" name="package_brochure" id="packageBrochure" class="hide-me" onchange="loadFileName(event, '#brochureImage')"/>
                                <button class="btn btn-sm btn-default btn-block" id="brochureUploadBtn" type="button" onclick="triggerUpload(event, '#packageBrochure');">
                                    <i></i> upload brochure <br>
                                    <span id="brochureImage"></span>
                                </button>
                            </div>
                            <div class="col-4">
                                <div class="card">
                                    <img src="{{ asset('img/images/default-package-image.jpg') }}" alt="" class="img-fluid package-image" id="fileImage"/>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-info btn-sm" id="submitBtn" type="submit">Create Package</button>
                    </form>
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
    </script>
@endsection
