@php
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
                            <div class="row">
                                <div class="col-sm-6 col-lg-7 col-xxl-7">
                                    <div class="cardx h-100">
                                        <div class="card-innerx">
                                            <div class="project">
                                                <div class="project-head">
                                                    <a href="#" class="project-title">
                                                        <div class="project-info">
                                                        </div>
                                                    </a>
                                                </div>
                                                <br>
                                                <div class="project-details">
                                                    @php
                                                        $currentDate = new DateTime();
                                                        $num = 1;
                                                        $startDate = Carbon::parse(date('Y-m-d'))->addMonth(); // Start from the next month
                                                        $terms = 36;
                                                        $dueDates = [];

                                                        for ($i = 0; $i < $terms; $i++) {
                                                            $dueDate = $startDate->copy()->addMonths($i);
                                                            $dueDates[] = $dueDate->format('Y-m-d'); // Store the due date in 'Y-m-d' format
                                                        }

                                                        $rebates = 0;
                                                    @endphp
                                                    @php
                                                        $monthly = number_format(
                                                            ($app->post_install - $app->downpayment) / $app->terms,
                                                            2,
                                                        );
                                                    @endphp
                                                    <table class="datatable-init table nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th width="50">#</th>
                                                                <th>Months</th>
                                                                <th width="150">Amount</th>
                                                                <th width="150">Rebates</th>
                                                                <th width="150">Total</th>
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
                                                                    $diffInSeconds =
                                                                        $currentDateTimestamp - $dueDateTimestamp;

                                                                    // Calculate the difference in days
                                                                    $daysPassed = floor(
                                                                        $diffInSeconds / (60 * 60 * 24),
                                                                    ); // 60 seconds * 60 minutes * 24 hours

                                                                    if ($daysPassed > 0) {
                                                                        $penalty = 100 * $daysPassed;
                                                                        $rebates = 0;
                                                                    } elseif ($daysPassed == 0) {
                                                                        $penalty = 100;
                                                                        $rebates = 0;
                                                                    } else {
                                                                        $penalty = 0;
                                                                    }
                                                                @endphp
                                                                <tr>
                                                                    <td class="pt-2">{{ $key + 1 }}.</td>
                                                                    <td class="pt-2">
                                                                        {{ date_format(date_create($dueDate), 'D, M. d, Y') }}
                                                                    </td>
                                                                    <td class="pt-2">₱ {{ $monthly }}</td>
                                                                    <td class="pt-2">₱
                                                                        {{ Number_format($rebates, 2) }}</td>
                                                                    <td class="pt-2">₱
                                                                        {{ Number_format(($app->post_install - $app->downpayment) / $app->terms - $rebates + $penalty, 2) }}
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

                                <div class="col-sm-6 col-lg-5 col-xxl-5">
                                    <div class="cardx h-100">
                                        <div class="card-innerx">
                                            <div class="project">
                                                <br><br>
                                                <div class="product-thumb p-5 pt-0 pb-0">
                                                    <a href="#">
                                                        <img class="card-img-top" src="/{{ $app->post_thumbnail }}"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <br>
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

                                                            <td width="100" class="text-end">Monthly :</td>
                                                            <td>₱ {{ $monthly }} x {{ $app->terms }}
                                                                Months</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


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
