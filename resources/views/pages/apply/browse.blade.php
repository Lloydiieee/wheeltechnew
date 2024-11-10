@php
    use App\Models\Application;
    $app = Application::join('t_post', 'post_id', 'product_id')->where('email', Auth::user()->email)->where('status', 0)->get();
    if (Auth::user()->account_type == 'Recipient'){}
@endphp
<x-app-layout>
    <x-slot name="back"></x-slot>
    <x-slot name="header">{{ __('Browse Products') }}</x-slot>
    <x-slot name="subHeader">{{ __('You can view the motorcycle and appy here.') }}</x-slot>
    <x-slot name="btn"></x-slot>

    <div class="nk-block">
        <div class="row g-gs">
            @php
                $bikes = [
                    'item-1-638568701981732698-bn7efa.jpeg',
                    'item-1-638573979682788476-uy8m6n.jpeg',
                    'item-1-638574886123649010-9y1e3g.jpeg',
                    'item-1-638574877713280732-kgankb.jpeg',
                    'eee.jpeg',
                    'item-1-638578131641082710-njf4wz.jpeg',
                    'item-1-638578133463908171-nqjonh.jpeg',
                    'item-1-638568873323604401-0alma9.jpeg',
                    'item-1-638574889904291684-oytqa0.jpeg',
                    'item-1-638568915300639097-pt59ok.jpeg',
                    'item-1-638574884082385004-wellzx.jpeg',
                    'item-1-638574878000000749-cbi13l.jpeg',
                ];

                $names = [
                    'Kawasaki CT100B',
                    'Honda XR150LEKP',
                    'Yamaha WR155R B3MB',
                    'Yamaha SZ BE94',
                    'Yamaha Mio Gear S BJN5',
                    'Skygo KPV 150',
                    'Skygo Stallion 150',
                    'Yamaha Mio I125 BB39',
                    'Yamaha YZF-R3 BVJD',
                    'Yamaha Mio Aerox BRW6',
                    'Yamaha Mio I125 BB39',
                    'Yamaha Mio I 125S',
                ];

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
                                    <td> <b class="text-danger">₱ {{ number_format(($data->post_install - $data->downpayment) / $data->terms , 2) }}</b></td>
                                </tr>
                            </table>
                            <a href="/apply/application" class="btn btn-success mt-2 btn-block">
                                Continue Application
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <script>
        function dev() {
            Swal.fire({
                icon: 'warning',
                title: 'Under Development',
                text: 'Opps! Please try again later. thank you.',
                confirmButtonText: 'OK'
            });
        }
    </script>
</x-app-layout>
