 <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
     <div class="nk-sidebar-element nk-sidebar-head">

         <div class="nk-menu-trigger me-n2">
             <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                     class="icon ni ni-arrow-left  text-light"></em></a>
             <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex text-light">
                 <em class="icon ni ni-info"></em>
             </a>
         </div>

         <div class="nk-sidebar-brand text-light">
             <span id="title-sidemenu">Wheeltek - Branch</span>
         </div>
     </div>

     <div class="nk-sidebar-element">
         <div class="nk-sidebar-content">
             <div class="nk-sidebar-menu" data-simplebar>
                 <ul class="nk-menu">
                     {{-- <li class="nk-menu-heading pt-0">
                         <h6 class="overline-title text-primary-alt">menu</h6>
                     </li>
                     <li class="nk-menu-item">
                         <a href="#" class="nk-menu-link">
                             <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                             <span class="nk-menu-text">Dashboard</span>
                         </a>
                     </li> --}}
                     @php
                         use App\Models\Application;
                         use App\Models\User;
                         use Carbon\Carbon;
                     @endphp
                     @if (Auth::user()->account_type == '')
                         <li class="nk-menu-heading pt-4">
                             <h6 class="overline-title text-primary-alt">Applicant</h6>
                         </li>
                         <li class="nk-menu-item">
                             <a href="/apply/browse" class="nk-menu-link">
                                 <span class="nk-menu-icon"><em class="icon ni ni-globe"></em></span>
                                 <span class="nk-menu-text">Apply Installment</span>
                             </a>
                         </li>
                         {{-- <li class="nk-menu-item">
                             <a href="/apply/status" class="nk-menu-link">
                                 <span class="nk-menu-icon"><em class="icon ni ni-edit"></em></span>
                                 <span class="nk-menu-text">Apply Installment</span>
                             </a>
                         </li> --}}
                     @endif
                     @if (Auth::user()->account_type == 'Recipient')
                         <li class="nk-menu-heading pt-4">
                             <h6 class="overline-title text-primary-alt">Loan Recipient</h6>
                         </li>
                         <li class="nk-menu-item">
                             <a href="/active/loans" class="nk-menu-link">
                                 <span class="nk-menu-icon"><em class="icon ni ni-regen-alt"></em></span>
                                 <span class="nk-menu-text">My Active Loans</span>
                             </a>
                         </li>
                         {{-- <li class="nk-menu-item">
                             <a href="/history/loans" class="nk-menu-link">
                                 <span class="nk-menu-icon"><em class="icon ni ni-history"></em></span>
                                 <span class="nk-menu-text">My Loan History</span>
                             </a>
                         </li> --}}
                     @endif
                     @if (Auth::user()->account_type == 'Lender')
                         @php
                             $app_pending = Application::join('t_post', 'post_id', 'product_id')
                                 ->select('t_post.*', 'applications.updated_at as app_updated_at', 'applications.*')
                                 ->where('status', 0)
                                 ->count();
                         @endphp
                         <li class="nk-menu-heading pt-4">
                             <h6 class="overline-title text-primary-alt">Lender Management</h6>
                         </li>
                         <li class="nk-menu-item">
                             <a href="/pending-loans" class="nk-menu-link">
                                 <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                 <span class="nk-menu-text">Pending Loan Application</span>
                                 @if ($app_pending != 0)
                                     <span class="badge bg-danger">{{ $app_pending }}</span>
                                 @endif
                             </a>
                         </li>
                         <li class="nk-menu-item">
                             <a href="/approved-loans" class="nk-menu-link">
                                 <span class="nk-menu-icon"><em class="icon ni ni-check-circle-cut"></em></span>
                                 <span class="nk-menu-text">Approved Loan Application</span>
                             </a>
                         </li>
                         <li class="nk-menu-item">
                             <a href="/payment-loans" class="nk-menu-link">
                                 <span class="nk-menu-icon"><em class="icon ni ni-money"></em></span>
                                 <span class="nk-menu-text">Manage Loan Payments</span>
                             </a>
                         </li>
                     @endif
                     @if (Auth::user()->account_type == 'Administrator')
                         <li class="nk-menu-heading pt-4">
                             <h6 class="overline-title text-primary-alt">Product Management</h6>
                         </li>
                         <li class="nk-menu-item">
                             <a href="/motorcycle" class="nk-menu-link">
                                 <span class="nk-menu-icon"><em class="icon ni ni-cart"></em></span>
                                 <span class="nk-menu-text">Motorcycle Products</span>
                             </a>
                         </li>
                         <li class="nk-menu-heading pt-4">
                             <h6 class="overline-title text-primary-alt">Administrator</h6>
                         </li>
                         <li class="nk-menu-item">
                             <a href="/accounts" class="nk-menu-link">
                                 <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                 <span class="nk-menu-text">Manage Accounts</span>
                             </a>
                         </li>
                         <li class="nk-menu-item">
                             <a href="/reports" class="nk-menu-link">
                                 <span class="nk-menu-icon"><em class="icon ni ni-download"></em></span>
                                 <span class="nk-menu-text">Generate Reports</span>
                             </a>
                         </li>
                     @endif
                 </ul>
             </div>
         </div>
     </div>
 </div>
