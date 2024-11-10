@php
    use App\Models\categoryModel;
    use App\Models\Application;

    $pending = Application::join('users', 'users.email', 'applications.email')
        ->join('t_post', 'post_id', 'product_id')
        ->where('status', 1)
        ->get();
@endphp
<x-app-layout>
    <x-slot name="back"></x-slot>
    <x-slot name="header">{{ __('Approved Loans Application') }}</x-slot>
    <x-slot name="subHeader">{{ __('You can manage the Approved loans and update loans here.') }}</x-slot>
    <x-slot name="btn"></x-slot>

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
                            $units = ['Yamaha NMAX', 'Honda PCX', 'Suzuki Raider', 'Kawasaki Rouser', 'Vespa Sprint'];
                            $statuses = ['Pending', 'Approved', 'Rejected'];
                            $num_rows = 5; // Number of rows to generate
                        @endphp
                        <table class="datatable-init table table-hover text-dark">
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
