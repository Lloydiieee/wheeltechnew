
<div class="py-12 pt-4">

    <table class="datatable-init nowrap table">
        <thead>
        <tr>
                <th>#</th>
                <th>Name</th>
                <th>Alias</th>
                <th>Date of Birth</th>
                <th>Place of Birth</th>
                <th>Civil Status</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th>Tel. No.</th>
                <th>License</th>
                <th>Present Address</th>
                <th>Present Length of Service</th>
                <th>Present Zip Code</th>
                <th>Previous Address</th>
                <th>Previous Length of Service</th>
                <th>Previous Zip Code</th>
                <th>Provincial Address</th>
                <th>Provincial Length of Service</th>
                <th>Provincial Zip Code</th>
                <th>Relative Name</th>
                <th>Relative Address</th>
                <th>Relationship</th>
                <th>Phone Number</th>

                <th width="100" class="text-center"> Action </th>
            </tr>

        </thead>
        <tbody>
            @foreach ($apply as $value)
        @csrf
            <tr>
                <td>{{$value['id']}}</td>
                <td>{{$value['applicant_last_name'] . ', ' . $value['applicant_first_name'] . ' ' . $value['applicant_middle_name']}}</td>
                <td>{{$value['applicant_alias']}}</td>
                <td>{{$value['applicant_birthdate']}}</td>
                <td>{{$value['applicant_birthplace']}}</td>
                <td>{{$value['applicant_civil_status']}}</td>
                <td>{{$value['applicant_gender']}}</td>
                <td>{{$value['applicant_phone_number']}}</td>
                <td>{{$value['applicant_telephone_number']}}</td>
                <td>{{$value['applicant_license']}}</td>
                <td>{{$value['applicant_present_add_region'] . ', ' . $value['applicant_present_add_province'] . ',' . $value['applicant_present_add_municipal'] . ','. $value['applicant_present_add_barangay'] . ', ' . $value['applicant_present_add_house_number'] }} </td>
                <td>{{$value['applicant_present_add_length_service']}}</td>
                <td>{{$value['applicant_present_add_zip_code']}}</td>
                <td>{{$value['applicant_previous_add_region'] . ', ' . $value['applicant_previous_add_province'] . ',' . $value['applicant_previous_add_municipal'] . ','. $value['applicant_previous_add_barangay'] . ', ' . $value['applicant_previous_house_number'] }} </td>
                <td>{{$value['applicant_previous_add_length_service']}}</td>
                <td>{{$value['applicant_previous_add_zip_code']}}</td>
                <td>{{$value['applicant_provincial_add_region'] . ', ' . $value['applicant_provincial_add_province'] . ',' . $value['applicant_provincial_add_municipal'] . ','. $value['applicant_provincial_add_barangay'] . ', ' . $value['applicant_provincial_house_number'] }} </td>
                <td>{{$value['applicant_provincial_add_length_service']}}</td>
                <td>{{$value['applicant_provincial_add_zip_code']}}</td>
                <td>{{$value['applicant_relative_name']}}</td>
                <td>{{$value['applicant_relative_address']}}</td>
                <td>{{$value['applicant_relative_relationship']}}</td>
                <td>{{$value['applicant_relative_phone_number']}}</td>

            <td>

                    <button class="btn btn-xs btn-light}">
                        <em class="icon ni ni-edit"> </em>
                    </button>
                        <button type="submit" class="btn btn-xs btn-danger text-white">
                            <em class="icon ni ni-trash"></em>
                        </button>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
