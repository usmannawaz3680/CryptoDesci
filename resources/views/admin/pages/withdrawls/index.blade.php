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
                    <input type="text" id="searchInput" placeholder="Search by UID or TXID..." class="w-1/3 pl-5 pr-4 py-3 rounded-lg focus:outline-none border-gray-800 bg-neutral-900 placeholder:text-gray-400">
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
                                            <span class="text-crypto-primary font-semibold">Pending</span>
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
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-gray-500">No withdrawal requests found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="actionModal" tabindex="-1" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-screen bg-black bg-opacity-50">
        <div class="relative w-full max-w-md mx-auto mt-24">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <div class="px-6 py-4 border-b rounded-t dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white" id="modalTitle"></h3>
                </div>
                <div class="p-6 space-y-4">
                    <input type="text" id="trxId" placeholder="Enter TRX ID" required class="w-full rounded-lg p-3 bg-gray-900 text-white border border-gray-700">
                    <textarea id="adminNote" rows="4" class="w-full rounded-lg p-3 bg-gray-900 text-white border border-gray-700" placeholder="Enter admin note (optional)"></textarea>
                </div>
                <div class="flex justify-end px-6 py-4 border-t border-gray-200 rounded-b dark:border-gray-700">
                    <button onclick="submitWithdrawAction()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.getElementById("searchInput").addEventListener("keyup", function() {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll("#withdrawalsTable tbody tr");
            rows.forEach(row => {
                const text = row.innerText.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        });
    </script>
    <script>
        let currentWithdrawId = null;
        let currentAction = null;

        function handleWithdrawAction(id, action) {
            currentWithdrawId = id;
            currentAction = action;
            document.getElementById('adminNote').value = '';
            document.getElementById('modalTitle').textContent = `Confirm ${action.charAt(0).toUpperCase() + action.slice(1)} Withdrawal`;
            document.getElementById('actionModal').classList.remove('hidden');
        }

        function submitWithdrawAction() {
            const note = document.getElementById('adminNote').value;
            const trxId = document.getElementById('trxId').value;

            fetch(`/admin/withdrawals/${currentWithdrawId}/${currentAction}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        admin_note: note,
                        trx_id: trxId
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert(data.error || 'Something went wrong');
                    }
                })
                .catch(err => {
                    alert('An error occurred');
                    console.error(err);
                });

            document.getElementById('actionModal').classList.add('hidden');
        }
    </script>
@endpush
