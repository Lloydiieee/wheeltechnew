@php
    use App\Models\PaymentLog;
    use App\Models\Application;
    use App\Models\User;
    use Carbon\Carbon;

    $info = User::where('id', $id)->first();

    $app = Application::join('t_post', 'post_id', 'product_id')
        ->select('t_post.*', 'applications.updated_at as app_updated_at', 'applications.*')
        ->where('email', $info->email)
        ->first();
@endphp
@php
    use App\Models\categoryModel;
    use App\Models\Payment;
@endphp
<x-app-layout>
    <x-slot name="back"></x-slot>
    <x-slot name="header">{{ __('Applicant Information') }}</x-slot>
    <x-slot name="subHeader">{{ __('You can enter your personal information and appy here.') }}</x-slot>
    <x-slot name="btn"></x-slot>

    <div class="nk-block">
        <div class="card">
            <div class="card-aside-wrap">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head nk-block-head-lg pb-3">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title text-2xl fw-bold">{{ $app->post_title }}</h4>
                                <div class="nk-block-des">
                                    <p>You can enter your information and submit here.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-data data-list">
                            <div class="data-head">
                                <h6 class="overline-title">Applicant Information</h6>
                            </div>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <td width="140" class="text-end">Price :</td>
                                    <td>₱ {{ number_format($app->post_install, 2) }}</td>
                                </tr>
                                <tr>
                                    <td width="100" class="text-end">DownPayment :</td>
                                    <td>₱ {{ number_format($app->downpayment, 2) }}</td>
                                </tr>
                                <tr>
                                    @php
                                        $monthly = number_format(
                                            ($app->post_install - $app->downpayment) / $app->terms,
                                            2,
                                        );
                                    @endphp
                                    <td width="100" class="text-end">Monthly :</td>
                                    <td>₱ {{ $monthly }} x {{ $app->terms }}
                                        Months</td>
                                </tr>
                            </table>
                            <br>
                            <div class="project-details">
                                <table class="datatable-init table">
                                    <thead>
                                        <tr>
                                            <th width="50">#</th>
                                            <th width="">Applicant Name</th>
                                            <th width="">Unit Name</th>
                                            <th width="">Payment Amount</th>
                                            <th width="">Mode of Payment</th>
                                            <th width="200">Date Submitted</th>
                                            <th width="200">Proof of Payment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $payment = Payment::join('applications', 'applications.id', 'unit_id')
                                                ->join('t_post', 'post_id', 'product_id')
                                                ->join('users', 'users.email', 'applications.email')
                                                ->get();
                                        @endphp
                                        @foreach ($payment as $index => $data)
                                            @php

                                            @endphp
                                            <tr>
                                                <td class="mt-2">{{ $index + 1 }}.</td>
                                                <td class="mt-2">{{ $data->name }}</td>
                                                <td class="mt-2">{{ $data->post_title }}</td>
                                                <td class="mt-2">₱ {{ number_format($data->amount, 2) }}</td>
                                                <td class="mt-2">{{ $data->mode_of_payment }}</td>
                                                <td class="mt-2">
                                                    {{ date_format($data->created_at, 'D, F d, Y') }}
                                                </td>
                                                <td><a href="/storage/{{ $data->proof_of_payment }}"
                                                        class="btn btn-sm btn-light bg-white text-dark btn-block"
                                                        target="_blank">View Attachment</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg toggle-screen-lg"
                    data-toggle-body="true" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                    <div class="card-inner-group" data-simplebar="init">
                        <div class="simplebar-wrapper" style="margin: 0px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                @include('pages._sidemenu')
                            </div>
                            <div class="simplebar-placeholder" style="width: auto; height: 850px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
