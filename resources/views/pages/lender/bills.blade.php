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
                                <table class="datatable-init table nowrap table-hover">
                                    <thead>
                                        <tr>
                                            <th width="50">#</th>
                                            <th>Months</th>
                                            <th width="150">Amount</th>
                                            <th width="150">Rebates</th>
                                            <th width="150">Penalty</th>
                                            <th width="150">Total</th>
                                            <th width="150">Payment</th>
                                            <th width="150">Validated</th>
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
                                                    ->where('unit_id', $id)
                                                    ->first();

                                            @endphp
                                            @if (!$payment)
                                                <tr style="cursor: pointer" data-bs-toggle="modal"
                                                    onclick="payment_i('{{ $dueDate }}', '{{ Number_format(($app->post_install - $app->downpayment) / $app->terms - $rebates + $penalty, 2) }}')"
                                                    data-bs-target="#billing">
                                                @else
                                                <tr>
                                            @endif
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

    <script>
        function payment_i(date, amount) {
            document.getElementById('date_payment').value = date;
            document.getElementById('total_amount').innerHTML = amount;
        }
    </script>

    <div class="modal fade" tabindex="-1" role="dialog" id="billing">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body">
                    <h1 class="nk-block-title page-title text-2xl">
                        Loan Payment
                    </h1>
                    <p>This form is for billing information.</p>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <hr class="mt-2 mb-2">
                    <div class="row px-3">
                        <form action="{{ route('billing.store') }}" method="POST">
                            @csrf

                            <!-- Unit ID -->
                            <div class="row mt-2 align-center">
                                <div class="col-lg-3" style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label" for="unit_id">Unit ID <b
                                                class="text-danger">*</b></label>
                                        <span class="form-note">Select the relevant unit.</span>
                                    </div>
                                </div>
                                <div class="col-lg-9" style="display: none;">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" name="unit_id" value="{{ $id }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Date of Payment -->
                            <div class="row mt-2 align-center">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-label" for="date_payment">Date of Payment <b
                                                class="text-danger">*</b></label>
                                        <span class="form-note">Select the payment date.</span>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="date" class="form-control" id="date_payment"
                                                name="date_payment" readonly required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Mode of Payment -->
                            <div class="row mt-2 align-center">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-label" for="mode_of_payment">Mode of Payment <b
                                                class="text-danger">*</b></label>
                                        <span class="form-note">Select the payment mode.</span>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <select class="form-control" id="mode_of_payment" name="mode_of_payment"
                                                required>
                                                <option value="" disabled selected>- SELECT -</option>
                                                <option value="CASH">Cash Payment</option>
                                                <option value="GCASH">GCash Payment</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Validated By -->
                            <div class="row mt-2 align-center" style="display: none;">
                                <div class="col-lg-5" style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label" for="validated_by">Validated By <b
                                                class="text-danger">*</b></label>
                                        <span class="form-note">Enter the name of the validator.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7" style="display: none;">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="validated_by"
                                                value="{{ Auth::user()->id }}" name="validated_by"
                                                placeholder="Enter name of validator" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2 align-center">
                                <div class="col-lg-3">
                                    -
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <h1 class="text-2xl fw-bolder">₱ <span id="total_amount">0.00</span></h1>
                                            <hr class="mt-3 mb-3">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit and Reset Buttons -->
                            <div class="col-lg-5"></div>
                            <div class="col-lg-7 justify-end" style="float: right">
                                <hr>
                                <div class="form-group mt-2 mb-2 justify-end">
                                    <button type="reset" class="btn btn-light bg-white mx-3">
                                        <em class="icon ni ni-repeat"></em> &ensp;Reset
                                    </button>
                                    <button type="submit" class="btn btn-light bg-white">
                                        <em class="icon ni ni-save"></em> &ensp;Submit Record
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
