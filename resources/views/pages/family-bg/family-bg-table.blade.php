
<div class="py-12 pt-4">

    <table class="datatable-init table-responsive">
        <thead>
        <tr>
                <th>#</th>
                <th>Father's Name</th>
                <th>Alias</th>
                <th>Age</th>
                <th>Date of Birth</th>
                <th>Father's Occupation</th>
                <th>Mother's Name</th>
                <th>Alias</th>
                <th>Age</th>
                <th>Date of Birth</th>
                <th>Marriage Status</th>
                <th>Mother's Occupation</th>
                <th>Present Address</th>
                <th>Zip Code</th>
                <th>Length of Service</th>
                <th>Years</th>
                <th>Months</th>
                <th>Provincial Address</th>
                <th>Zip Code</th>
                <th>Length of Service</th>
                <th>Years</th>
                <th>Months</th>

                <th width="100" class="text-center"> Action </th>
            </tr>

        </thead>
        <tbody>
            @foreach ($family as $value)
        @csrf
            <tr>
                <td>{{$value['id']}}</td>
                <td>{{$value['family_father_last_name'] . ', ' . $value['family_father_first_name'] . ' ' . $value['family_father_middle_name']}}</td>
                <td>{{$value['family_father_alias']}}</td>
                <td>{{$value['family_father_age']}}</td>
                <td>{{$value['family_father_birthdate']}}</td>
                <td>{{$value['family_father_work']}}</td>
                <td>{{$value['family_mother_last_name'] . ', ' . $value['family_mother_first_name'] . ' ' . $value['family_mother_middle_name']}}</td>
                <td>{{$value['family_mother_alias']}}</td>
                <td>{{$value['family_mother_age']}}</td>
                <td>{{$value['family_mother_birthdate']}}</td>
                <td>{{$value['family_marriage_status']}}</td>
                <td>{{$value['family_mother_work']}}</td>
                <td>{{$value['family_present_add_house_number'] . ', ' . $value['family_present_add_barangay'] . ', ' . $value['family_present_add_town'] . ', ' . $value['family_present_add_province']}} </td>
                <td>{{$value['family_present_add_zip_code']}}</td>
                <td>{{$value['family_present_add_length_service']}}</td>
                <td>{{$value['family_present_add_year']}}</td>
                <td>{{$value['family_present_add_month']}}</td>
                <td>{{$value['family_provincial_add_house_number'] . ', ' . $value['family_provincial_add_barangay'] . ', ' . $value['family_provincial_add_town'] . ', ' . $value['family_provincial_add_province']}} </td>
                <td>{{$value['family_provincial_add_zip_code']}}</td>
                <td>{{$value['family_provincial_add_length_service']}}</td>
                <td>{{$value['family_provincial_add_year']}}</td>
                <td>{{$value['family_provincial_add_month']}}</td>
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
