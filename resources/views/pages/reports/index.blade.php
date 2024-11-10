@php
    use App\Models\categoryModel;
    use App\Models\Application;
    use App\Models\PaymentLog;

    $payments = PaymentLog::join('t_post', 'post_id', 'unit_id')->get();

    $pending = Application::join('users', 'users.email', 'applications.email')
        ->join('t_post', 'post_id', 'product_id')
        ->where('status', 0)
        ->get();
@endphp

@php

    $approve = Application::join('users', 'users.email', 'applications.email')
        ->join('t_post', 'post_id', 'product_id')
        ->where('status', 1)
        ->get();
@endphp

<x-app-layout>
    <x-slot name="back"></x-slot>
    <x-slot name="header">{{ __('Manage Reports') }}</x-slot>
    <x-slot name="subHeader">{{ __('You can manage your reports and register generate reports here.') }}</x-slot>
    <x-slot name="btn"></x-slot>

    <div class="nk-block">
        <div class="row g-gs">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-inner">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <h1 class="text-2xl fw-bolder">Financial Reports</h1>
                        <hr class="mt-3 mb-3">
                        <table class="datatable-init-export table table-hover text-dark">
                            <thead>
                                <tr>
                                    <th width="50">#</th>
                                    <th width="">Applicant Name</th>
                                    <th width="">Unit / Model Description</th>
                                    <th width="">Mode of Payment</th>
                                    <th width="">Amount Paid</th>
                                    <th width="">Month</th>
                                    <th width="200">Date Submitted</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <br>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-inner">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <h1 class="text-2xl fw-bolder">Pending Loan Application</h1>
                        <hr class="mt-3 mb-3">
                        <table class="datatable-init-export table table-hover text-dark">
                            <thead>
                                <tr>
                                    <th width="50">#</th>
                                    <th width="">Applicant Name</th>
                                    <th width="">Unit / Model Description</th>
                                    <th width="">Installment Price</th>
                                    <th width="">Terms</th>
                                    <th width="">Downpayment</th>
                                    <th width="">Monthly</th>
                                    <th width="120" class="">Status</th>
                                    <th width="200">Date Submitted</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pending as $index => $data)
                                    @php
                                        $dateSubmitted = date('Y-m-d', strtotime('-' . rand(0, 60) . ' days')); // Random date within the last 60 days
                                    @endphp
                                    <tr onclick="go_to('/applicant/apply/{{ $data->id }}')">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->post_title }}</td>
                                        <td>₱ {{ number_format($data->post_install, 2) }}</td>
                                        <td>{{ $data->terms }} Months</td>
                                        <td>₱ {{ number_format($data->downpayment, 2) }}</td>
                                        <td>₱
                                            {{ number_format(($data->post_install - $data->downpayment) / $data->terms, 2) }}
                                            / Month</td>
                                        <td>
                                            <span
                                                class="badge badge-sm badge-dot has-bg bg-warning d-none d-sm-inline-flex w-full">
                                                Pending
                                            </span>
                                        </td>
                                        <td>{{ $data->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <br>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-inner">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <h1 class="text-2xl fw-bolder">Approved Loan Application</h1>
                        <hr class="mt-3 mb-3">
                        <table class="datatable-init-export table table-hover text-dark">
                            <thead>
                                <tr>
                                    <th width="50">#</th>
                                    <th width="">Applicant Name</th>
                                    <th width="">Unit / Model Description</th>
                                    <th width="">Installment Price</th>
                                    <th width="">Terms</th>
                                    <th width="">Downpayment</th>
                                    <th width="">Monthly</th>
                                    <th width="120" class="">Status</th>
                                    <th width="200">Date Submitted</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($approve as $index => $data)
                                    @php
                                        $dateSubmitted = date('Y-m-d', strtotime('-' . rand(0, 60) . ' days')); // Random date within the last 60 days
                                    @endphp
                                    <tr onclick="go_to('/units/apply/{{ $data->id }}')">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->post_title }}</td>
                                        <td>₱ {{ number_format($data->post_install, 2) }}</td>
                                        <td>{{ $data->terms }} Months</td>
                                        <td>₱ {{ number_format($data->downpayment, 2) }}</td>
                                        <td>₱
                                            {{ number_format(($data->post_install - $data->downpayment) / $data->terms, 2) }}
                                            / Month</td>
                                        <td>
                                            <span
                                                class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex w-full">
                                                Approved
                                            </span>
                                        </td>
                                        <td>{{ $data->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
