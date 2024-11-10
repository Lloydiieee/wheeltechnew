
<x-app-layout>
    <x-slot name="back"></x-slot>
    <x-slot name="header">{{ __('Manage User Accounts') }}</x-slot>
    <x-slot name="subHeader">{{ __('You can manage your user accounts and register user account here.') }}</x-slot>
    <x-slot name="btn">
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                        class="icon ni ni-menu-alt-r"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li class="nk-block-tools-opt d-none d-sm-block">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#registration" class="btn btn-primary">
                                <em class="icon ni ni-plus"></em>
                                <span>Add New</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </x-slot>

    <div class= "nk-block">
        <div class="row g-gs">
            <div class= "col-md-12">
                <div class= "card">
                    <div class= "card-inner">
                        <table class="datatable-init table table-hover">
                            <thead>
                                <tr>
                                    <th width="80">#</th>
                                    <th>Complete Name</th>
                                    <th width="200">Email Address</th>
                                    <th width="180">Account Type</th>
                                    <th width="180" style="font-size: 13px;">
                                        <center>Actions</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @foreach ($accounts as $user)
                                <tr>
                                    <td class="pt-2">{{ $num++ }}.</td>
                                    <td class="pt-2">{{ $user->name }}</td>
                                    <td class="pt-2">{{ $user->email }}</td>
                                    <td class="pt-2">{{ $user->account_type ?? 'Applicant' }}</td>
                                    <td>
                                        <center>
                                            <a href="/storage/"
                                                class="btn btn-sm btn-light bg-white text-dark">
                                                <em class="icon ni ni-info"></em> &nbsp; View Details
                                            </a>
                                        </center>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="registration">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body">
                    <h1 class="nk-block-title page-title text-2xl">
                        Register New Account
                    </h1>
                    <p>You can create new account to monitor your people.</p>
                    <hr class="mt-2 mb-2">

                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <!-- Name Input -->
                        <div class="form-group">
                            <label for="name">Complete Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name here.." value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                
                        <!-- Email Input -->
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email address here.." value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                
                        <!-- Password Input -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password here..">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                
                        <!-- Confirm Password Input -->
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm your password here..">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Account Type</label>
                            <select required name="account_type" id="account_type" class="form-select">
                                <option value="" selected disabled>-</option>
                                <option value="Administrator">Administrator</option>
                                <option value="">Applicant</option>
                                <option value="Recipient">Loan Recipient</option>
                                <option value="Lender">Lender (In-Charge)</option>
                            </select>
                            @error('account_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary mt-3">Register</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
