<div class="py-12 pt-4">
    <span style="float: right">
        <button class="btn btn-light " data-bs-toggle="modal" data-bs-target="#registration">
            <em class="icon ni ni-plus-circle"></em>&ensp;
            Register New
        </button>
    </span>
    <table class="datatable-init nowrap table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Complete Address</th>
                <th>Questions Asked</th>
                <th>Response</th>
                <th width="100" class="text-center"> Action </th>
        </thead>
        <tbody>
            @foreach ($informants as $value)
                <tr>
                    <td>{{ $value['id'] }}</td>
                    <td>{{ $value['informants_name'] }}</td>
                    <td>{{ $value['informants_address'] }}</td>
                    <td>{{ $value['informants_questions'] }}</td>
                    <td>{{ $value['informants_response'] }}</td>
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
