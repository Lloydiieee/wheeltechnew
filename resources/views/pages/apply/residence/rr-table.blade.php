<tbody>
    @if ($info)
        @foreach ($info as $data)
            <tr style="cursor: pointer">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->rr_reference1_name }}</td>
                <td>{{ $data->rr_reference1_relation }}</td>
                <td>{{ $data->rr_reference1_mobile }}</td>
                <td>{{ $data->rr_reference2_name }}</td>
                <td>{{ $data->rr_reference2_relation }}</td>
                <td>{{ $data->rr_reference2_mobile }}</td>
                <td class="d-flex justify-content-center align-items-center">
                    <!-- Edit Button -->
                    <button class="btn btn-xs btn-lightbg-white text-dark me-3">
                        <em class="icon ni ni-edit"></em>
                    </button>
                    <button type="submit" class="btn btn-xs btn-block btn-danger">
                        <em class="icon ni ni-trash"></em>
                    </button>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="8" class="text-center">No data available</td>
        </tr>
    @endif
</tbody>
