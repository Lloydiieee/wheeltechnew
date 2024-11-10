@php
    use App\Models\PaymentLog;
    use App\Models\categoryModel;
    use Carbon\Carbon;
@endphp
@php
    use App\Models\Application;
    $app = Application::join('t_post', 'post_id', 'product_id')
        ->select('t_post.*', 'applications.updated_at as app_updated_at', 'applications.*')
        ->where('email', Auth::user()->email)
        ->where('status', 1)
        ->first();
    if (Auth::user()->account_type == 'Recipient') {
    }
@endphp
<x-app-layout>
    <x-slot name="back"></x-slot>
    <x-slot name="header">{{ __('My Active Loans / ') }} <strong
            class="text-primary small">{{ $app->post_title }}</strong></x-slot>
    <x-slot name="subHeader">{{ __('You can manage your loans and update loans here.') }}</x-slot>
    <x-slot name="btn"></x-slot>

    <div class="nk-block ">
        <div class="row g-gs">

            @php
                $bikes = ['item-1-638573979682788476-uy8m6n.jpeg', 'item-1-638578133463908171-nqjonh.jpeg'];
                $names = ['Yamaha Mio I125 BB39', 'Yamaha YZF-R3 BVJD'];
                $percent = ['39', '80'];
                $month = ['14', '27'];
            @endphp

            @for ($i = 2; $i <= 2; $i++)
                <div class="col-sm-6 col-lg-5 col-xxl-4">
                    <div class="card h-100">
                        <div class="card-inner">
                            <div class="project">
                                <div class="product-thumb p-5 pt-0 pb-0">
                                    <a href="#">
                                        <img class="card-img-top" src="/{{ $app->post_thumbnail }}" alt="">
                                    </a>
                                </div>
                                <br>
                                <div class="project-head">
                                    <a href="#" class="project-title">
                                        <div class="project-info">
                                            <h6 class="title">{{ $app->post_title }}</h6>
                                            <p>
                                                Best Price in Philippines
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="project-details">
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
                                </div>
                                <div class="project-progress">
                                    <div class="project-progress-details">
                                        <div class="project-progress-task"><em
                                                class="icon ni ni-check-round-cut"></em><span>Installment</span></div>
                                        <div class="project-progress-percent"> 1 / <b>36</b></div>
                                    </div>
                                    <div class="progress progress-pill progress-md bg-light">
                                        <div class="progress-bar  bg-danger" data-progress="{{ 10 }}"
                                            style="width: {{ 10 }}%;"></div>
                                    </div>
                                </div>
                                <button class="btn btn-danger btn-block" data-bs-toggle="modal"
                                    data-bs-target="#payment">Upload Payment Receipt</button>
                                <br><br>
                                <center>
                                    You can pay via E-Wallet or Bank Transfer.
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
            <div class="col-sm-6 col-lg-7 col-xxl-8">
                <div class="card h-100">
                    <div class="card-inner">
                        <div class="project">
                            <div class="project-head">
                                <a href="#" class="project-title">
                                    <div class="project-info">
                                        <h6 class="title"></h6>
                                        <p>
                                            Best Price in Philippines
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="project-details">
                                @php
                                    $currentDate = new DateTime();
                                    $num = 1;
                                    $startDate = Carbon::parse($app->updated_at)->addMonth(); // Start from the next month
                                    $terms = 36;
                                    $dueDates = [];

                                    for ($i = 0; $i < $terms; $i++) {
                                        $dueDate = $startDate->copy()->addMonths($i);
                                        $dueDates[] = $dueDate->format('Y-m-d'); // Store the due date in 'Y-m-d' format
                                    }

                                    $rebates = 0;


                                @endphp
                                <table class="datatable-init table nowrap">
                                    <thead>
                                        <tr>
                                            <th width="50">#</th>
                                            <th>Months</th>
                                            <th>Amount</th>
                                            <th>Rebates</th>
                                            <th>Penalty</th>
                                            <th>Total</th>
                                            <th>Payment</th>
                                            <th>Validated</th>
                                            <th width="100">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dueDates as $key => $dueDate)
                                            @php
                                                if ($key <= 12) {
                                                    $rebates = 500;
                                                } else {
                                                    $rebates = 200;
                                                }

                                                $currentDate = date('Y-m-d');

                                                $dueDateTimestamp = strtotime($dueDate);
                                                $currentDateTimestamp = strtotime($currentDate);

                                                // Calculate the difference in seconds
                                                $diffInSeconds = $currentDateTimestamp - $dueDateTimestamp;

                                                // Calculate the difference in days
                                                $daysPassed = floor($diffInSeconds / (60 * 60 * 24)); // 60 seconds * 60 minutes * 24 hours

                                                if ($daysPassed > 0) {
                                                    $penalty = 100 * $daysPassed;
                                                    $rebates = 0;
                                                } elseif ($daysPassed == 0) {
                                                    $penalty = 100;
                                                    $rebates = 0;
                                                } else {
                                                    $penalty = 0;
                                                }

                                                $payment = PaymentLog::join('users', 'users.id', 'validated_by')
                                                    ->where('date_payment', $dueDate)
                                                    ->where('unit_id', Auth::user()->id)
                                                    ->first();

                                            @endphp
                                            <tr>
                                                <td class="pt-2">{{ $key + 1 }}.</td>
                                                <td class="pt-2">
                                                    {{ date_format(date_create($dueDate), 'D, M. d, Y') }}</td>
                                                <td class="pt-2">₱ {{ $monthly }}</td>
                                                <td class="pt-2">₱ {{ Number_format($rebates, 2) }}</td>
                                                <td class="pt-2">₱ {{ number_format($penalty, 2) }}</td>
                                                <td class="pt-2">₱
                                                    {{ Number_format(($app->post_install - $app->downpayment) / $app->terms - $rebates + $penalty, 2) }}
                                                </td>
                                                <td class="pt-2">{{ $payment->mode_of_payment ?? '-' }}</td>
                                                <td class="pt-2">{{ $payment->name ?? '-' }}</td>
                                                <td>
                                                    @if ($payment)
                                                        <span
                                                            class="w-full badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex">
                                                            Paid
                                                        </span>
                                                    @else
                                                        @if ($daysPassed > 0)
                                                            <span
                                                                class="w-full badge badge-sm badge-dot has-bg bg-danger d-none d-sm-inline-flex">
                                                                Overdue {{ $daysPassed }} Day(s)
                                                            </span>
                                                        @elseif($daysPassed == 0)
                                                            <span
                                                                class="w-full badge badge-sm badge-dot has-bg bg-info d-none d-sm-inline-flex">
                                                                Due Today
                                                            </span>
                                                        @else
                                                            <span
                                                                class="w-full badge badge-sm badge-dot has-bg bg-warning d-none d-sm-inline-flex">
                                                                Pending
                                                            </span>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="payment">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body">
                    <h1 class="nk-block-title page-title text-2xl">
                        Payment Methods
                    </h1>
                    <p>You can submit the proof of payment here.</p>
                    <hr class="mt-2 mb-2">
                    <div class="row px-3">
                        <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Mode of Payment -->
                            <div class="row mt-2 align-center">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-label" for="mode_of_payment">Mode of Payment <b
                                                class="text-danger">*</b></label>
                                        <span class="form-note">Select the payment method.</span>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="hidden" name="unit_id" value="{{ $id }}">
                                            <select class="form-control" id="mode_of_payment" name="mode_of_payment"
                                                required>
                                                <option value="">Select Payment Mode</option>
                                                <option value="CASH">Cash</option>
                                                <option value="GCASH">GCash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Proof of Payment -->
                            <div class="row mt-2 align-center">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-label" for="proof_of_payment">Proof of Payment <b
                                                class="text-danger">*</b></label>
                                        <span class="form-note">Upload a receipt or payment proof.</span>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="file" class="form-control" id="proof_of_payment"
                                                name="proof_of_payment" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Amount -->
                            <div class="row mt-2 align-center">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-label" for="amount">Amount <b
                                                class="text-danger">*</b></label>
                                        <span class="form-note">Enter the payment amount.</span>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" id="amount" name="amount"
                                                step="0.01" placeholder="Enter amount" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit and Reset Buttons -->
                            <div class="col-lg-2"></div>
                            <div class="col-lg-10 justify-end" style="float: right">
                                <hr>
                                <div class="form-group mt-2 mb-2 justify-end">
                                    <button type="reset" class="btn btn-light bg-white mx-3">
                                        <em class="icon ni ni-repeat"></em> &ensp;Reset
                                    </button>
                                    <button type="submit" class="btn btn-light bg-white">
                                        <em class="icon ni ni-save"></em> &ensp;Submit Payment
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
