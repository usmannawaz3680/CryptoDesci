@extends('admin.layout.app')

@section('sidebar')
    @include('admin.layout.partials.sidebar')
@endsection

@section('content')
    <div class="w-full overflow-x-hidden custom-scrollbar">
        <div class="content-area page-transition m-4 md:m-6">
            <div class="p-4 md:p-6 bg-crypto-accent rounded-xl">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold">Withdrawal Requests</h2>
                    <input type="text" id="searchInput" placeholder="Search by UID or TXID..." class="p-2 rounded border border-gray-300 w-64">
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="withdrawalsTable">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-neutral-800 dark:text-gray-200">
                            <tr>
                                <th class="px-6 py-3">User UID</th>
                                <th class="px-6 py-3">TX ID</th>
                                <th class="px-6 py-3">Amount</th>
                                <th class="px-6 py-3">Network</th>
                                <th class="px-6 py-3">Coin</th>
                                <th class="px-6 py-3">Status</th>
                                <th class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($withdrawals as $withdrawal)
                                <tr>
                                    <td class="px-6 py-4 font-medium">{{ $withdrawal->user->user_uid }}</td>
                                    <td class="px-6 py-4">{{ $withdrawal->trx_id }}</td>
                                    <td class="px-6 py-4">{{ $withdrawal->amount }}</td>
                                    <td class="px-6 py-4">{{ $withdrawal->network }}</td>
                                    <td class="px-6 py-4">{{ $withdrawal->coin->symbol }}</td>
                                    <td class="px-6 py-4">
                                        @if ($withdrawal->status == 'pending')
                                            <span class="text-yellow-500 font-semibold">Pending</span>
                                        @elseif ($withdrawal->status == 'completed')
                                            <span class="text-green-500 font-semibold">Completed</span>
                                        @elseif ($withdrawal->status == 'processing')
                                            <span class="text-blue-500 font-semibold">Processing</span>
                                        @else
                                            <span class="text-red-500 font-semibold">Rejected</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 space-x-2">
                                        @if ($withdrawal->status == 'pending')
                                            <button onclick="handleWithdrawAction('{{ $withdrawal->id }}', 'approve')" class="text-green-600 hover:underline">Approve</button>
                                            <button onclick="handleWithdrawAction('{{ $withdrawal->id }}', 'reject')" class="text-red-600 hover:underline">Reject</button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="7" class="text-center py-4 text-gray-500">No withdrawal requests found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
function handleWithdrawAction(id, action) {
    const confirmMsg = `Are you sure you want to ${action} this withdrawal?`;
    if (confirm(confirmMsg)) {
        fetch(`/admin/withdrawals/${id}/${action}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(() => location.reload())
        .catch(err => {
            alert('An error occurred');
            console.error(err);
        });
    }
}

document.getElementById("searchInput").addEventListener("keyup", function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll("#withdrawalsTable tbody tr");
    rows.forEach(row => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter) ? "" : "none";
    });
});
</script>
@endpush
