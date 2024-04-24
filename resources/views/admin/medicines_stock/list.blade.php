@extends('admin.layouts.app')


@section('content')
    <div class="pagetitle">
        <h1>{{ !empty($meta_title) ? $meta_title : 'Medicines Stock' }}</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{url("admin/medicines_stock/add")}}" class="btn btn-primary">Add Medicine Stock</a>
                        </h5>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Medicine Name</th>
                                    <th scope="col">Batch Id</th>
                                    <th scope="col">Exipry Date</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">MRP</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">Created date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getRecord as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->getMedicinesName->name ?? '' }}</td>
                                        <td>{{ $value->batch_id }}</td>
                                        <td>{{ date('d-m-Y', strtotime($value->expiry_date)) }}</td>
                                        <td>{{ $value->quantity }}</td>
                                        <td>{{ $value->mrp }}</td>
                                        <td>{{ $value->rate }}</td>
                                        <td>{{ $value->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ url('admin/medicines_stock/edit/' . $value->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="bi bi-pencil-square">
                                                </i>
                                            </a>
                                            <a href="{{ url('admin/medicines_stock/delete/' . $value->id) }}" onclick="return confirm('Are you sure?')"
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
