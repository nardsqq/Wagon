<table id="dataTable" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Order</th>
        <th class="text-center">Date of Mobilization</th>
        <th class="text-center">Date of De-Mobilization</th>
        <th class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($schedules as $schedule)
        <tr>
            <td>{{ $schedule->service_order->int_so_order_id_fk }}</td>
            <td class="text-center">{{ $schedule->dat_start }}</td>
            <td class="text-center">{{ $schedule->dat_end }}</td>
            <td class="text-center">
                <button id="btn-assign" class="btn btn-primary btn-sm" @click="assignPersonnelModal({{ $schedule->int_sched_id }})"><i class='fa fa-user-circle-o'></i>&nbsp; Assign
                    Personnel
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>