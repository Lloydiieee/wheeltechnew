<x-app-layout>
    <x-slot name="back"></x-slot>
    <x-slot name="header">{{ __('Application Status') }}</x-slot>
    <x-slot name="subHeader">{{ __('You can check the application status') }}</x-slot>
    <x-slot name="btn"></x-slot>

    <div class="nk-block">
        <div class="card">
            <div class="card-aside-wrap">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head nk-block-head-lg pb-3">
                        <div class="nk-block-betweenx">
                            <div class="nk-block-head-contentx">
                                <center>
                                <h4 class="nk-block-titlex text-2xl fw-bold">Application Status</h4>
                                <div class="nk-block-desx">
                                    <p>Here's the Status of your application</p>
                                </div>
                            </center>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-data data-list">
                            <hr><br><br><br><br>
                            <center>
                                <em class="icon ni ni-check-circle text-success" style="font-size: 128px;"></em><br><br>
                                <p class="text-dark text-2xl"><i>Congrats! Your Applicaiton has been approved. <br> Please visit the branch to sign the contract. Have a nice day!</i></p>
                            </center>
                          
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