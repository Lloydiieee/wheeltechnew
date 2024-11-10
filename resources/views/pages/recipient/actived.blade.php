@php
    use App\Models\categoryModel;
@endphp
@php
    use App\Models\Application;
    $app = Application::join('t_post', 'post_id', 'product_id')
        ->where('email', Auth::user()->email)
        ->where('status', 1)
        ->get();
    if (Auth::user()->account_type == 'Recipient') {
    }
@endphp
<x-app-layout>
    <x-slot name="back"></x-slot>
    <x-slot name="header">{{ __('My Active Loans') }}</x-slot>
    <x-slot name="subHeader">{{ __('You can manage your loans and update loans here.') }}</x-slot>
    <x-slot name="btn"></x-slot>

    <div class="nk-block ">
        <div class="row g-gs">

            <div class="card alert-pro alert-success">
                <div class="card-body">
                    <h1 class="text-xl"><b>Your Application has been  approved.</b> Congratulation! 🎉  Please visit our branch to sign a contracts. Present the submitted Requirements. Thank you.</h1>
                </div>
            </div>
            @php
                $bikes = ['item-1-638573979682788476-uy8m6n.jpeg', 'item-1-638578133463908171-nqjonh.jpeg'];
                $names = ['Yamaha Mio I125 BB39', 'Yamaha YZF-R3 BVJD'];
                $percent = ['39', '80'];
                $month = ['14', '27'];
            @endphp

            @foreach ($app as $data)
                <div class="col-xxl-3 col-lg-3 col-sm-6">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb p-5 pb-0">
                            <a href="#">
                                <img class="card-img-top" src="/{{ $data->post_thumbnail }}" alt="">
                            </a>
                        </div>
                        <div class="card-inner">
                            <hr class="mb-3 ">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="120" class="text-end">Total Price : </td>
                                    <td>₱ {{ number_format($data->post_install, 2) }}</td>
                                </tr>
                                <tr>
                                    <td width="150" class="text-end">Down Payment : </td>
                                    <td>₱ <b>{{ number_format($data->downpayment, 2) }}</b></td>
                                </tr>
                                <tr>
                                    <td width="150" class="text-end">Terms (Months) : </td>
                                    <td>x <b>{{ $data->terms }} Months</b></td>
                                </tr>
                                <tr>
                                    <td width="160" class="text-end">Monthly Payment : </td>
                                    <td> <b class="text-danger">₱
                                            {{ number_format(($data->post_install - $data->downpayment) / $data->terms, 2) }}</b>
                                    </td>
                                </tr>
                            </table>
                            <div class="project-progress mt-2">
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
                            <a href="/active/loans/payment/{{ $data->id }}"
                                class="btn btn-light bg-white mt-1 btn-block">
                                <em class="icon ni ni-coins"></em>&ensp;
                                Submit Payment
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
