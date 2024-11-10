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
                <th>Employer's Name</th>
                <th>Cellpohne No.</th>
                <th>Income</th>
                <th>Other Source of Income</th>
                <th width="100" class="text-center"> Action </th>
        </thead>
        <tbody>
            @foreach ($comakerincome as $index => $value)
                @csrf
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $value['co_income_employer_name'] }}</td>
                    <td>{{ $value['co_income_cellphone_number'] }}</td>
                    <td>{{ $value['co_income_income'] }}</td>
                    <td>{{ $value['co_income_other_income'] }}</td>
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
