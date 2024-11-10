@php
    use App\Models\categoryModel;
    use App\Models\Payment;
@endphp
<x-app-layout>
    <x-slot name="back"></x-slot>
    <x-slot name="header">{{ __('Loans Payments') }}</x-slot>
    <x-slot name="subHeader">{{ __('You can manage the payments and update loans here.') }}</x-slot>
    <x-slot name="btn">

    </x-slot>

    <div class="nk-block ">
        <div class="row g-gs">
            <div class="col-sm-12">
                @if (session('trash'))
                    <div class="alert alert-pro alert-success">
                        <div class="alert-text">
                            <h6>
                                <em class="icon ni ni-check" style="font-size: 18px"></em>
                                &nbsp; Moved to Trash Successfully.
                            </h6>
                            <p>
                                The post <i>{{ session('trash') }}</i> have been move to trash. You can check to
                                trash bin.
                            </p>
                        </div>
                    </div>
                @endif
                <div class="card h-100">
                    <div class="card-inner">
                        @php
                            $names = ['John Doe', 'Jane Smith', 'Michael Brown', 'Lisa Johnson', 'David Lee'];
                            $statuses = ['Paid', 'Unpaid', 'Late'];
                            $num_rows = 10; // Number of rows to generate
                        @endphp

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
                                        ->join('t_post', 'post_id', 'product_id')->join('users', 'users.email', 'applications.email')
                                        ->get();
                                @endphp
                                @foreach ($payment as $index => $data)
                                    <tr style="cursor: pointer;" >
                                        <td onclick="go_to('online/unit/{{ $data->id}}')" class="mt-2">{{ $index + 1 }}.</td>
                                        <td onclick="go_to('online/unit/{{ $data->id}}')" class="mt-2">{{ $data->name }}</td>
                                        <td onclick="go_to('online/unit/{{ $data->id}}')" class="mt-2">{{ $data->post_title }}</td>
                                        <td onclick="go_to('online/unit/{{ $data->id}}')" class="mt-2">₱ {{ number_format($data->amount, 2) }}</td>                                       
                                        <td onclick="go_to('online/unit/{{ $data->id}}')" class="mt-2">{{ $data->mode_of_payment }}</td>
                                        <td onclick="go_to('online/unit/{{ $data->id}}')" class="mt-2">{{ date_format($data->created_at, 'D, F d, Y') }}</td>
                                        <td><a href="/storage/{{$data->proof_of_payment}}" class="btn btn-sm btn-light bg-white text-dark btn-block" target="_blank">View Attachment</a></td>
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
