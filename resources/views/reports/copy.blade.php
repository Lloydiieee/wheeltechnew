
<x-app-layout>
    <x-slot name="back"></x-slot>
    <x-slot name="header">{{ __('Generate Reports') }}</x-slot>
    <x-slot name="subHeader">{{ __('You can manage your project and register new project here.') }}</x-slot>
    <x-slot name="btn">
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                        class="icon ni ni-menu-alt-r"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li class="nk-block-tools-opt d-none d-sm-block">
                            <a href="/reports/print" target="_blank"
                                class="btn btn-primary">
                                <em class="icon ni ni-printer"></em>
                                <span>Print Report</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </x-slot>

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
                        <i> Opps! Under Development. Please try again later. thank you.</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
