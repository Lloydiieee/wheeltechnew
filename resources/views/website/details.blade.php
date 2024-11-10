<!DOCTYPE html>
<html lang="en">

@include('website.header')

<style>
    /* Basic Input Styling */
    input[type="text"],
    input[type="email"],
    input[type="password"],
    textarea {
        width: 100%;
        padding: 12px 15px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
        outline: none;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    /* Hover and Focus Effects */
    input[type="text"]:hover,
    input[type="email"]:hover,
    input[type="password"]:hover,
    textarea:hover {
        border-color: #888;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus,
    textarea:focus {
        border-color: #6200ea;
        /* Purple shade */
        box-shadow: 0 0 5px rgba(98, 0, 234, 0.3);
    }

    /* Placeholder Styling */
    input[type="text"]::placeholder,
    input[type="email"]::placeholder,
    input[type="password"]::placeholder,
    textarea::placeholder {
        color: #999;
        font-style: italic;
    }

    /* Disabled Input Styling */
    input[type="text"]:disabled,
    input[type="email"]:disabled,
    input[type="password"]:disabled,
    textarea:disabled {
        background-color: #f9f9f9;
        cursor: not-allowed;
    }

    /* Custom styles for dark mode */
    .dark-mode input[type="text"],
    .dark-mode input[type="email"],
    .dark-mode input[type="password"],
    .dark-mode textarea {
        background-color: #333;
        color: #f2f2f2;
        border-color: #555;
    }

    .dark-mode input[type="text"]::placeholder,
    .dark-mode input[type="email"]::placeholder,
    .dark-mode input[type="password"]::placeholder,
    .dark-mode textarea::placeholder {
        color: #aaa;
    }

    /* Basic Select Styling */
    select {
        width: 100%;
        padding: 12px 15px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
        font-size: 16px;
        outline: none;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        appearance: none;
        /* Removes default arrow */
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="%236200ea" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg>');
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 15px;
    }

    /* Hover Effect */
    select:hover {
        border-color: #888;
    }

    /* Focus Effect */
    select:focus {
        border-color: #6200ea;
        /* Purple shade */
        box-shadow: 0 0 5px rgba(98, 0, 234, 0.3);
    }

    /* Disabled Select Styling */
    select:disabled {
        background-color: #f9f9f9;
        cursor: not-allowed;
        border-color: #ddd;
    }

    /* Custom styles for dark mode */
    .dark-mode select {
        background-color: #333;
        color: #f2f2f2;
        border-color: #555;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="%23aaa" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg>');
    }

    .dark-mode select:hover {
        border-color: #888;
    }

    .dark-mode select:focus {
        border-color: #bb86fc;
        box-shadow: 0 0 5px rgba(187, 134, 252, 0.3);
    }

    /* Modal background */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
        /* Black background with opacity */
    }

    /* Modal content box */
    .modal-content {
        background-color: #fff;
        margin: 10% auto;
        padding: 20px;
        border-radius: 8px;
        width: 100%;
        max-width: 800px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        position: relative;
    }

    /* Close button */
    .close-btn {
        color: #aaa;
        font-size: 24px;
        font-weight: bold;
        position: absolute;
        right: 15px;
        top: 10px;
        cursor: pointer;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">

    <!--Nav-->
    @include('website.navbar')


    <section class="bg-white py-8 ">
        <center>
            <h1 class="text-center text-2xl"><b style="color: #000;">Are you looking for affordable Installment ? Your
                    in
                    the right place!</b></h1>
            <br>
            <hr>
        </center>

        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

            @php
                use App\Models\postModel;
                $data = postModel::where('post_id', $id)->first();
            @endphp

            <div class="w-5/12 flex items-center justify-center border-gray-800">
                <center>
                    <img class="hover:grow " src="/{{ $data->post_thumbnail }}">
                </center>
            </div>
            <!-- col-9: Text Content Section -->
            <div class="w-7/12 pl-6">
                <p class="text-xl font-bold text-black text-3xl">{{ $data->post_title }}</p>
                <hr class="my-2">
                <h1 class=" mt-5">From <b class="text-red-500">₱ {{ number_format($data->post_price, 2) }} - ₱
                        {{ number_format($data->post_install, 2) }}</b></h1>
                <p>As low as <b class="text-red-500">₱ {{ number_format($data->post_install / 36, 2) }} x 36 Months</b>
                </p>

                <hr class="my-2">
                <b for="">Down Payment : ₱&nbsp;</b>
                <input type="text" id="downpayment" placeholder="0.00" style="width: 25%" value="25000"
                    oninput="calculate()">
                &emsp;
                <b for="">Installment Terms : </b>
                <select name="" id="terms" style="width: 25%" onchange="calculate()">
                    <option value="0" disabled selected>-</option>
                    <option value="12">12 Months</option>
                    <option value="24">24 Months</option>
                    <option value="36">36 Months</option>
                </select>
                <hr class="my-2">
                <p style="font-size: 18px">Monthly Install As low as <b class="text-green-500">₱ <span id="calculate"
                            style="font-size: 45px">0.00</span></b></p>
                <hr class="my-2">
                <br>
                <a href="#" id="openModalBtn" class="round bg-red-900 button p-3"
                    style="padding: 15px; background-color: #49B773; width: 100%">
                    <span class="relative text-white font-normal text-primary dark:text-white">
                        Buy in Installment →
                    </span>
                </a>

            </div>

            <span class=" mt-6 row" style="width: 100%">
                {!! html_entity_decode($data->post_content) !!}
            </span>

            <script>
                function calculate() {
                    const total = parseFloat('{{ $data->post_install }}');
                    const downpayment = parseFloat(document.getElementById('downpayment').value);
                    const terms = parseInt(document.getElementById('terms').value, 10);

                    if (isNaN(downpayment) || isNaN(terms)) {
                        alert("Please enter valid numbers for downpayment and terms.");
                        return;
                    }

                    // Format downpayment with commas and two decimal places
                    const formattedDownpayment = new Intl.NumberFormat('en-US', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }).format((total - downpayment) / terms);

                    // Display result with formatted downpayment and terms
                    document.getElementById('calculate').innerHTML = `${formattedDownpayment} x ${terms} Months`;

                    document.getElementById('downpayment_e').value = downpayment;
                    document.getElementById('terms_e').value = terms;
                }
            </script>


            {{-- <table class="min-w-full border-collapse block md:table mt-6">
                <thead class="block md:table-header-group">
                    <tr
                        class="border border-gray-300 block md:table-row absolute -top-full md:relative md:top-auto md:sticky md:top-0">
                        <th
                            class="bg-gray-200 p-2 text-left font-bold md:border md:border-gray-300 block md:table-cell">
                            Specification</th>
                        <th
                            class="bg-gray-200 p-2 text-left font-bold md:border md:border-gray-300 block md:table-cell">
                            Details</th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group">
                    <tr class="bg-gray-100 border border-gray-300 block md:table-row">
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">Model</td>
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">Honda Click 160i</td>
                    </tr>
                    <tr class="bg-white border border-gray-300 block md:table-row">
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">Engine Type</td>
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">4-Stroke, Single Overhead Cam
                            (SOHC)</td>
                    </tr>
                    <tr class="bg-gray-100 border border-gray-300 block md:table-row">
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">Displacement</td>
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">160cc</td>
                    </tr>
                    <tr class="bg-white border border-gray-300 block md:table-row">
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">Transmission</td>
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">Automatic (CVT)</td>
                    </tr>
                    <tr class="bg-gray-100 border border-gray-300 block md:table-row">
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">Fuel System</td>
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">Fuel Injection (FI)</td>
                    </tr>
                    <tr class="bg-white border border-gray-300 block md:table-row">
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">Brakes (Front/Rear)</td>
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">Disc / Drum</td>
                    </tr>
                    <tr class="bg-gray-100 border border-gray-300 block md:table-row">
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">Tire Type (Front/Rear)</td>
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">80/90 - 14 (Front), 100/80 - 14
                            (Rear)</td>
                    </tr>
                    <tr class="bg-white border border-gray-300 block md:table-row">
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">Fuel Capacity</td>
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">5.5 Liters</td>
                    </tr>
                    <tr class="bg-gray-100 border border-gray-300 block md:table-row">
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">Weight</td>
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">116 kg</td>
                    </tr>
                    <tr class="bg-white border border-gray-300 block md:table-row">
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">Seat Height</td>
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">778 mm</td>
                    </tr>
                    <tr class="bg-gray-100 border border-gray-300 block md:table-row">
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">Ground Clearance</td>
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">138 mm</td>
                    </tr>
                    <tr class="bg-white border border-gray-300 block md:table-row">
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">Price Range</td>
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">₱ 64,000.00 - ₱ 75,645.00</td>
                    </tr>
                    <tr class="bg-gray-100 border border-gray-300 block md:table-row">
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">Monthly Installment</td>
                        <td class="p-2 md:border md:border-gray-300 block md:table-cell">₱ 2,000.00 x 36 Months</td>
                    </tr>
                </tbody>
            </table> --}}


        </div>

        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
                        href="#">
                        Other Products
                    </a>

                    <div class="flex items-center" id="store-nav-content">

                        <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                            </svg>
                        </a>

                    </div>
                </div>
            </nav>


            @include('website.products')

        </div>

        <center>
            <a href="#" class="round bg-red-900 button">
                <span class="relative text-white font-normal text-primary dark:text-white">
                    Load More
                </span>
            </a>
        </center>

    </section>

    <!-- Modal Structure -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h1 class="nk-block-title page-title text-2xl">
               <b> Register New Account to Apply</b>
            </h1>
            <p>You can create new account to monitor your application.</p>
            <hr class="mb-4 mt-4">
            <form action="{{ route('register.apply') }}" method="POST">
                @csrf
                <!-- Name Input -->
                <div class="form-group">
                    <label for="name">Complete Name</label>
                    <input type="text" name="name" class="form-control" id="name"
                        placeholder="Enter your name here.." value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Input -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control" id="email"
                        placeholder="Enter your email address here.." value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password"
                        placeholder="Enter your password here..">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password Input -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        id="password_confirmation" placeholder="Confirm your password here..">
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

               <input type="hidden" value="" name="account_type">
               <input type="hidden" value="{{ $id }}" name="product_id">
               <input type="hidden" value="25000" name="downpayment_e" id="downpayment_e">
               <input type="hidden" value="0" name="terms_e" id="terms_e">
                <hr class="mb-4 mt-4">
                <!-- Submit Button -->
                <button type="submit" class="round bg-red-900 button p-3"
                style="padding: 15px; background-color: #49B773; width: 100%">Submit Application</button>
            </form>

        </div>
    </div>


    <script>
        // Get modal and trigger elements
        const modal = document.getElementById("myModal");
        const openModalBtn = document.getElementById("openModalBtn");
        const closeBtn = document.querySelector(".close-btn");

        // Open modal when button is clicked
        openModalBtn.onclick = function() {
            modal.style.display = "block";
        }

        // Close modal when 'x' button is clicked
        closeBtn.onclick = function() {
            modal.style.display = "none";
        }

        // Close modal when clicking outside the modal content
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>

    @include('website.footer')

</body>

</html>
