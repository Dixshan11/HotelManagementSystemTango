@extends('layouts.main')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div class="content-header">
    <div class="container-fluid">
        <ol class="d-flex breadcrumb bg-transparent p-0 justify-content-end">
            <li class="breadcrumb-item text-capitalize"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item text-capitalizeactive" aria-current="page"><a href="{{ route('customers.index') }}">Customers</a></li>
        </ol>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="container">
            <main class="mx-auto m-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4><span style="color:red">Customer</span> <span style="color:blue"> List </span> </h4>
                                    </div>
                                    <div>
                                        <a href="{{ route('customers.create') }}" class="btn btn-md btn-primary float-end"><i class="fa fa-plus"></i>Add
                                            Customer</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm table-bordered" style="font-size: 14px" id="my-table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone no</th>
                                            <th scope="col">National ID</th>
                                            <th scope="col">Address</th>
                                            <th style="width: 100px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($customers)
                                        @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->first_name }}</td>
                                            <td>{{ $customer->last_name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->phone_no }}</td>
                                            <td>{{ $customer->national_id }}</td>
                                            <td>{{ $customer->address }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="{{ route('customers.show', $customer->id) }}"><i class="fas fa-eye"></i></a>
                                                <a class="btn btn-sm btn-warning" href="{{ route('customers.edit', $customer->id) }}"><i class="fas fa-edit"></i></a>
                                                <button onclick="deleteConfirmation('{{ $customer->id }}')" class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash"></i></button>
                                                <form action="{{ route('customers.destroy', $customer->id) }}" method="post" id='form-data-{{ $customer->id }}'>
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <th colspan="3">No Record</th>
                                        </tr>
                                        @endif                                 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function deleteConfirmation(id) {
        Swal.fire({
            title: 'Are you sure?',
            html: "You want to delete this Customer",
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Yes, Delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $('#form-data-' + id).submit();
            }
        })
    }

    $(document).ready(function() {

        $('#my-table').DataTable();

    })
</script>
@endpush