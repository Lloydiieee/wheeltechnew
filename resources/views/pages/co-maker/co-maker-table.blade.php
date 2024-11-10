<div class="py-12 pt-4">
    <span style="float: right">
        <button class="btn btn-light " data-bs-toggle="modal" data-bs-target="#registration">
            <em class="icon ni ni-plus-circle"></em>&ensp;
            Register New
        </button>
    </span>
    <table class="datatable-init table table-hover">
        <thead>
            <tr>
                <th width="10">#</th>
                <th>Name</th>
                <th>Barangay</th>
                <th>Town City</th>
                <th>Province</th>
                <th>Zip Code</th>
                <th width="100" class="text-center"> Action </th>
        </thead>
        <tbody>
            @foreach ($comaker as $index => $value)
                <tr>
                    <td>{{ $index + 1 }}.</td>
                    <td>
                        {{ $value['comaker_last_name'] . ', ' . $value['comaker_first_name'] . ' ' . $value['comaker_middle_name'] }}
                    </td>
                    <td>{{ $value['comaker_barangay'] }}</td>
                    <td>{{ $value['comaker_town'] }}</td>
                    <td>{{ $value['comaker_province'] }}</td>
                    <td>{{ $value['comaker_zip_code'] }}</td>
                    <td>
                        <button class="btn btn-xs btn-warning text-dark">
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
