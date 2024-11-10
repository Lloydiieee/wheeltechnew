<div class="simplebar-offset" style="right: 0px; bottom: 0px;">
    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
        style="height: auto; overflow: hidden;">
        <div class="simplebar-content" style="padding: 0px;">
            <div class="card-inner">
                <div class="user-card">
                    <div class="user-avatar bg-primary">
                        <span>AB</span>
                    </div>
                    @php
                        use App\Models\Application;
                        use App\Models\FamilyModel;
                        use App\Models\SpouseModel;
                        use App\Models\BroSisModel;
                        use App\Models\ComakerModel;
                        use App\Models\ComakerIncomeModel;
                        use App\Models\ResidenceReferenceModel;
                        use App\Models\ApplicantModel;

                        if ($info) {
                            $id = $info->id;
                            $name = '';
                            $email = '';
                        } else {
                            $id = Auth::user()->id;
                            $name = Auth::user()->name;
                            $email = Auth::user()->email;
                        }

                    @endphp
                    <div class="user-info">
                        <span class="lead-text">{{ $name }}</span>
                        <span class="sub-text">{{ $email }}</span>
                    </div>
                    <div class="user-action">
                        <div class="dropdown">
                            <a class="btn btn-icon btn-trigger me-n2" data-bs-toggle="dropdown" href="#"><em
                                    class="icon ni ni-more-v"></em></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <ul class="link-list-opt no-bdr">
                                    <li><a href="#"><em class="icon ni ni-camera-fill"></em><span>Change
                                                Photo</span></a></li>
                                    <li><a href="#"><em class="icon ni ni-edit-fill"></em><span>Update
                                                Profile</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-inner p-0">
                <ul class="link-list-menu">
                    <li>
                        @if (Auth::user()->account_type == 'Administrator' || Auth::user()->account_type == 'Lender')
                            {{-- @php
                                $app_id = Application::where('email', $email)->where('status', 0)->first();
                            @endphp --}}
                            @if (Application::where('email', $email)->where('status', 0)->count() != 0)
                                {{-- <center>
                                    <button onclick="status_unit('Accepted', {{ $app_id }})"
                                        class="btn btn-success"><em class="icon ni ni-check"></em>&ensp;
                                        Approve</button>
                                    <button onclick="status_unit('Declined', {{ $app_id }})"
                                        class="btn
                                        btn-danger"><em
                                            class="icon ni ni-cross"></em>&ensp;
                                        Decline</button>
                                </center> --}}
                            @else
                    <li>
                        <a href="/units/apply/{{ $id }}">
                            <em class="icon ni ni-files"></em>
                            <span>Loan Product Units</span>
                        </a>
                    </li>
                    <li>
                        <a href="/billing/unit/{{ $id }}">
                            <em class="icon ni ni-coins"></em>
                            <span>Loan Due Payments</span>
                        </a>
                    </li>
                    <li>
                        <a href="/online/unit/{{ $id }}">
                            <em class="icon ni ni-globe"></em>
                            <span>Online Payment Logs</span>
                        </a>
                    </li>
                    @endif
                    @endif
                    @php
                        $pending_status = Application::where('email', Auth::user()->email)->first();
                    @endphp
                    @if ($pending_status)
                        @if ($pending_status->status == 0)
                            <div class="p-3">
                                <div class="card alert-pro alert-warning">
                                    <div class="card-body">
                                        <b><em class="icon ni ni-clock text-warning text-2xl"
                                                style="position: relative; top: 5px"></em> Your Application is still
                                            pending. </b> <br><br> Please complete the information or
                                        requirements for fast approval. Thank you.
                                    </div>
                                </div>
                            </div>
                        @elseif($pending_status->status == 1)
                            <div class="p-3">
                                <div class="card alert-pro alert-success">
                                    <div class="card-body">
                                        <b><em class="icon ni ni-check text-success text-2xl"
                                                style="position: relative; top: 5px"></em> Your Application has been
                                            approved. </b> <br><br> Congratulations! 🎉 Please visit our branch to
                                        sign
                                        a contracts. Present the submitted Requirements. Thank you.
                                    </div>
                                </div>
                            </div>
                        @elseif($pending_status->status == 2)
                            <div class="p-3">
                                <div class="card alert-pro alert-danger">
                                    <div class="card-body">
                                        <b><em class="icon ni ni-cross text-danger text-2xl"
                                                style="position: relative; top: 5px"></em> Your Application has been
                                            denied. </b> <br><br> Sorry! We can't approve your application. For
                                        Clarification visit our branch. Thank you.
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    </li>
                    <li>
                        <hr class="mt-2">
                    </li>
                    <li>
                        <a href="/view/application/{{ Auth::user()->account_type == null ? '' : $id }}">
                            <em
                                class="icon ni ni-{{ ApplicantModel::where('user_id', $id)->count() == 0 ? 'user' : 'check text-success' }}"></em>
                            <span
                                class="{{ ApplicantModel::where('user_id', $id)->count() == 0 ? '' : 'text-success' }}">Applicant
                                Information</span>
                        </a>
                    </li>
                    <li>
                        <a href="/view/spouse-information/{{ Auth::user()->account_type == null ? '' : $id }}">
                            <em
                                class="icon ni ni-{{ SpouseModel::where('user_id', $id)->count() == 0 ? 'users' : 'users xtext-success' }}"></em>
                            <span
                                class="{{ SpouseModel::where('user_id', $id)->count() == 0 ? '' : 'xtext-success' }}">Spouse
                                Information (Optional)</span>
                        </a>
                    </li>
                    <li>
                        <a href="/view/family-background/{{ Auth::user()->account_type == null ? '' : $id }}">
                            <em
                                class="icon ni ni-{{ FamilyModel::where('user_id', $id)->count() == 0 ? 'info' : 'check text-success' }}"></em>
                            <span
                                class="{{ FamilyModel::where('user_id', $id)->count() == 0 ? '' : 'text-success' }}">Family
                                Background</span>
                        </a>
                    </li>
                    <li>
                        <a href="/view/siblings/{{ Auth::user()->account_type == null ? '' : $id }}">
                            <em
                                class="icon ni ni-{{ BroSisModel::where('user_id', $id)->count() == 0 ? 'info' : 'check text-success' }}"></em>
                            <span
                                class="{{ BroSisModel::where('user_id', $id)->count() == 0 ? '' : 'text-success' }}">Siblings
                                Information</span>
                        </a>
                    </li>
                    <li>
                        <hr>
                    </li>
                    <li>
                        <a href="/view/residence/{{ Auth::user()->account_type == null ? '' : $id }}">
                            <em
                                class="icon ni ni-{{ ResidenceReferenceModel::where('user_id', $id)->count() == 0 ? 'location' : 'check text-success' }}"></em>
                            <span
                                class="{{ ResidenceReferenceModel::where('user_id', $id)->count() == 0 ? '' : 'text-success' }}">Residence
                                Type & References</span>
                        </a>
                    </li>
                    <li>
                        <a href="/view/revenue/{{ Auth::user()->account_type == null ? '' : $id }}">
                            <em class="icon ni ni-coins"></em>
                            <span>Source of Income / Revenue</span> 
                        </a>
                    </li>
                    <li>
                        <a href="/view/dependent/{{ Auth::user()->account_type == null ? '' : $id }}">
                            <em class="icon ni ni-file-docs"></em>
                            <span>Dependents Information</span>
                        </a>
                    </li>
                    <li>
                        <hr>
                    </li>
                    <li>
                        <a href="/view/co-maker/{{ Auth::user()->account_type == null ? '' : $id }}">
                            <em
                                class="icon ni ni-{{ ComakerModel::where('user_id', $id)->count() == 0 ? 'users' : 'check text-success' }}"></em>
                            <span
                                class="{{ ComakerModel::where('user_id', $id)->count() == 0 ? '' : 'text-success' }}">Co-Makers'
                                Information</span>
                        </a>
                    </li>
                    <li>
                        <a href="/view/co-maker-income/{{ Auth::user()->account_type == null ? '' : $id }}">
                            <em
                                class="icon ni ni-{{ ComakerIncomeModel::where('user_id', $id)->count() == 0 ? 'money' : 'check text-success' }}"></em>
                            <span
                                class="{{ ComakerIncomeModel::where('user_id', $id)->count() == 0 ? '' : 'text-success' }}">Co-Makers'
                                Source of Income</span>
                        </a>
                    </li>
                    <li>
                        <hr>
                    </li>
                    <li>
                        <a href="/view/requirement/{{ Auth::user()->account_type == null ? '' : $id }}">
                            <em class="icon ni ni-edit"></em>
                            <span>Following Requirements</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    function status_unit(type, id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, " + type + " it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/api/status',
                    type: 'POST',
                    data: {
                        id: id,
                        type: type,
                        uid: {{ $id }}
                    },
                    success: function() {
                        Swal.fire({
                            title: "Application " + type + "!",
                            text: "The application has been " + type,
                            icon: "success"
                        });
                        setInterval(() => {
                            window.location.reload();
                        }, 2000);
                    }
                })
            }
        });
    }
</script>
