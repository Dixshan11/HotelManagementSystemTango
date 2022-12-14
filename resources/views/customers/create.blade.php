@extends('layouts.main')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <ol class="d-flex breadcrumb bg-transparent p-0 justify-content-end">
            <li class="breadcrumb-item text-capitalize"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item text-capitalize"><a href="{{route('customers.index')}}">Customers</a></li>
            <li class="breadcrumb-item text-capitalize active" aria-current="page">Add Customer</li>
        </ol>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="container">
            <main class="mx-auto m-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card" style="width:80%;margin: auto">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4> <span style="color:red">Add</span> <span style="color:blue"> Customer </span> </h4>
                                    </div>
                                    <div>
                                        <a href="{{route('customers.index')}}" class="btn btn-md btn-info float-end">Back</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route('customers.store')}}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="fname">First Name</label>
                                            <input type="type" class="form-control @error('fname') is-invalid @enderror" name="fname" id="fname" placeholder="First Name" value="{{ old('fname') }}">
                                            @error('fname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="lname">Last Name</label>
                                            <input type="type" class="form-control @error('lname') is-invalid @enderror" name="lname" id="lname" placeholder="Last Name" value="{{ old('lname') }}">
                                            @error('lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="phone_no">Phone No</label>
                                            <input type="type" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" id="phone_no" placeholder="Phone No" value="{{ old('phone_no') }}">
                                            @error('phone_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="national_id">NIC</label>
                                            <input type="type" class="form-control @error('national_id') is-invalid @enderror" name="national_id" id="national_id" placeholder="National ID" value="{{ old('national_id') }}">
                                            @error('national_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="address">Address</label>
                                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Address" value="{{ old('address') }}"></textarea>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</section>

@endsection