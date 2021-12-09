@extends('layouts.backend-admin')

@section('title', 'Packages')

@section('content')
    <div class="page-title">
        <h4>Packages</h4>
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

                    <button data-toggle="modal" data-target="#side-modal-r" class="btn btn-sm btn-primary" id="createBtn">Create package</button>

                    <div class="table-overflow">
                        <table id="oasis-table" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Duration</th>
                                <th>ROI</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($packages->count() > 0)
                                @php $i = 1; @endphp
                                @foreach($packages as $package)

                                <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    <div class="list-info mrg-top-10">
                                        <img class="thumb-img" src="{{ asset($package->image) }}" alt="">
                                        <div class="info">
                                            <span class="title">{{ $package->name }}</span>
                                            <span class="sub-title">{{ 'View brochure' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="mrg-top-15">
                                        <b class="text-dark font-size-16">{!! config('app.currency') !!}{{ number_format($package->amount) }}</b>
                                    </div>
                                </td>
                                <td>
                                    <div class="mrg-top-15">
                                        <span class="text-dark"><b> {{ $package->duration }} day(s)</b></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="mrg-top-15">
                                        <span class="text-dark"><b>{{ $package->roi }}%</b></span>
                                    </div>

                                </td>
                                <td>
                                    <div class="relative mrg-top-15">
                                        @if($package->is_active)
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
                                        <span>
{{--                                            {{ $package->created_at->diffForHumans() }}--}}
                                            {{ $package->created_at->format("m/d/Y")}}
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
                                                <a href="#">Activate</a>
                                            </li>
                                            <li>
                                                <a href="#" data-id="{{$package->id}}" class="edit">Edit</a>
                                            </li>
                                            @if($package->investments->count() == 0)
                                            <li>

                                                <form class="delete-form" action="{{ route('admin.packages.destroy', $package->id) }}" method="POST">
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

        $(document).on('click', '.edit', function (e) {
            let packageId = $(this).data('id');
            $.ajax({
                url: "{{ route('admin.packages.edit', 'XXX' ) }}".replace('XXX', packageId),
                type: 'GET',
                success: function(response){
                    if (response.success)
                    {
                        let data = response.data;
                        $('#packageCost').val( data.amount );
                        $('#packageDuration').val( data.duration );
                        $('#packageROI').val( data.roi );
                        $('#packageName').val( data.name );
                        $('#packageDescription').val( data.description );
                        $('#fileImage').attr('src',  data.image );
                        $('#brochureImage').html( data.brochure_name );

                        $('#packageEdit').val(packageId);
                        $('#submitBtn').html('Update Package');
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
    </script>
@endsection
