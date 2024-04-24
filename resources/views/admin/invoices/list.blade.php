@extends('admin.layouts.app')


@section('content')
    <div class="pagetitle">
        <h1>{{ !empty($meta_title) ? $meta_title : 'Invoices' }}</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{url("admin/invoices/add")}}" class="btn btn-primary">Add Invoice</a>
                        </h5>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Net Total</th>
                                    <th scope="col">Invoices Date</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Total Discount</th>
                                    <th scope="col">Created date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getRecord as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->net_total ?? '' }}</td>
                                        <td>{{ $value->invoices_date ?? '' }}</td>
                                        <td>{{ $value->getCustomersName->name ?? '' }}</td>
                                        <td>{{ $value->total_amount ?? '' }}</td>
                                        <td>{{ $value->total_discount ?? '' }}</td>
                                        <td>{{ $value->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ url('admin/invoices/edit/' . $value->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="bi bi-pencil-square">
                                                </i>
                                            </a>
                                            <a href="{{ url('admin/invoices/delete/' . $value->id) }}" onclick="return confirm('Are you sure?')"
                                                class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
