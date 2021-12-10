@extends('layouts.backend-admin')

@section('title', 'Account')

@section('content')
    <div class="page-title">
        <h4>Accounts</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Account Information
                </div>
                <div class="card-block">

                  <form action="{{ route('admin.account.update') }}" method="post" id="xform">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email Address" name="email" id="email" readonly  value="{{ $user->email ?? old('email')  }}" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number" name="phone" id="phoneNumber" value="{{ $user->phone ?? old('phone')  }}">
                            </div>
                            <div class="form-group">
                                <select name="bank" id="bank" class="form-control" required>
                                    <option selected>Choose Bank</option>
                                    <option value="access" @if ($user->bank == 'access') selected="selected" @endif>Access Bank</option>
                                    <option value="citibank" @if ($user->bank == 'citibank') selected="selected" @endif>Citibank</option>
                                    <option value="diamond" @if ($user->bank == 'diamond') selected="selected" @endif>Diamond Bank</option>
                                    <option value="ecobank" @if ($user->bank == 'ecobank') selected="selected" @endif>Ecobank</option>
                                    <option value="fidelity" @if ($user->bank == 'fidelity') selected="selected" @endif>Fidelity Bank</option>
                                    <option value="firstbank" @if ($user->bank == 'firstbank') selected="selected" @endif>First Bank</option>
                                    <option value="fcmb" @if ($user->bank == 'fcmb') selected="selected" @endif>First City Monument Bank (FCMB)</option>
                                    <option value="gtb" @if ($user->bank == 'gtb') selected="selected" @endif>Guaranty Trust Bank (GTB)</option>
                                    <option value="heritage" @if ($user->bank == 'heritage') selected="selected" @endif>Heritage Bank</option>
                                    <option value="keystone" @if ($user->bank == 'keystone') selected="selected" @endif>Keystone Bank</option>
                                    <option value="polaris" @if ($user->bank == 'polaris') selected="selected" @endif>Polaris Bank</option>
                                    <option value="providus" @if ($user->bank == 'providus') selected="selected" @endif>Providus Bank</option>
                                    <option value="stanbic" @if ($user->bank == 'stanbic') selected="selected" @endif>Stanbic IBTC Bank</option>
                                    <option value="standard" @if ($user->bank == 'standard') selected="selected" @endif>Standard Chartered Bank</option>
                                    <option value="sterling" @if ($user->bank == 'sterling') selected="selected" @endif>Sterling Bank</option>
                                    <option value="suntrust" @if ($user->bank == 'suntrust') selected="selected" @endif>Suntrust Bank</option>
                                    <option value="union" @if ($user->bank == 'union') selected="selected" @endif>Union Bank</option>
                                    <option value="uba" @if ($user->bank == 'uba') selected="selected" @endif>United Bank for Africa (UBA)</option>
                                    <option value="unity" @if ($user->bank == 'unity') selected="selected" @endif>Unity Bank</option>
                                    <option value="wema" @if ($user->bank == 'wema') selected="selected" @endif>Wema Bank</option>
                                    <option value="zenith" @if ($user->bank == 'zenith') selected="selected" @endif>Zenith Bank</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control"
                                       placeholder="Account Number"
                                       name="acc_no" id="accountno"
{{--                                       max="10" min="10"--}}
                                       onchange="leadingZeros(this)"
                                       onclick="leadingZeros(this)"
                                       value="{{ $user->account_no ?? old('acc_no') }}"
                                >
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Account Name" name="acc_name" id="account_name" value="{{ $user->account_name ?? old('acc_name') }}">
                            </div>
                            <button class="btn btn-info btn-sm" id="submitBtn" type="submit">Update Profile</button>
                        </form>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Change Password
                </div>
                <div class="card-block">
                    <form action="{{ route('admin.account.update_password') }}" method="post" id="yform">
                        @csrf
                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror " placeholder="Password" name="password" id="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror " placeholder="Confirm Password" name="password_confirmation" id="cpassword">
                            @error('confirm_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button class="btn btn-info btn-sm" id="submitBtn" type="submit">Change Password</button>
                    </form>
                </div>
            </div>
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    Site Information--}}
{{--                </div>--}}
{{--                <div class="card-block">--}}
{{--                    <form action="{{ route('admin.store.store') }}" method="post" id="zform">--}}
{{--                        @csrf--}}
{{--                        <input type="hidden" name="edit" value="" id="packageEdit">--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="text" class="form-control" placeholder="Package Name" name="package_name" id="packageName">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="number" class="form-control" placeholder="Package Cost" name="package_amount" id="packageCost">--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <div class="col-6">--}}
{{--                                <label for="">Duration</label>--}}
{{--                                <select name="package_duration" id="packageDuration" class="form-control">--}}
{{--                                    <option value="30">1 month</option>--}}
{{--                                    <option value="90">3 months</option>--}}
{{--                                    <option value="180">6 months</option>--}}
{{--                                    <option value="360">12 months</option>--}}
{{--                                    <option value="540">18 months</option>--}}
{{--                                    <option value="720">24 months</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="col-6">--}}
{{--                                <label for="">ROI</label>--}}
{{--                                <input type="number" id="packageROI" max="100" min="1" class="form-control" placeholder="ROI (in percentage)" name="package_roi">--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <button class="btn btn-info btn-sm" id="submitBtn" type="submit">Update Account</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
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

        function leadingZeros(input) {
            if(!isNaN(input.value) && input.value.length === 1) {
                input.value = '0' + input.value;
            }
        }
    </script>
@endsection
