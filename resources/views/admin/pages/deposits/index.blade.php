@extends('admin.layout.app')
@section('sidebar')
    @include('admin.layout.partials.sidebar')
@endsection

@section('content')
    <div class="w-full overflow-x-hidden custom-scrollbar">
        <div class="content-area page-transition m-4 md:m-6">
            <div class="p-4 md:p-6 bg-crypto-accent rounded-xl">
                <h2 class="text-2xl font-semibold mb-4">Users</h2>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-neutral-800 dark:text-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    User UID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Transaction ID
                                </th>
                                <th class="px-6 py-3">
                                    Amount
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Network
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Coin
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($deposits as $deposit)
                                <tr class="odd:bg-white odd:dark:bg-neutral-800 even:bg-gray-50 even:dark:bg-neutral-700">
                                    <th scope="row" class="px-6 py-4 font-medium">
                                        {{ $deposit->user->user_uid }}
                                    </th>
                                    <th scope="row" class="px-6 py-4">
                                        {{ $deposit->trx_id }}
                                    </th>
                                    <th scope="row" class="px-6 py-4">
                                        {{ $deposit->amount }}
                                    </th>
                                    <th scope="row" class="px-6 py-4">
                                        {{ $deposit->network }}
                                    </th>
                                    <th scope="row" class="px-6 py-4">
                                        {{ $deposit->coin->symbol }}
                                    </th>
                                    <th scope="row" class="px-6 py-4">
                                        @if ($deposit->status == 'pending')
                                            <span class="text-crypto-primary font-semibold">Pending</span>
                                        @elseif ($deposit->status == 'approved')
                                            <span class="text-green-500 font-semibold">Approved</span>
                                        @else
                                            <span class="text-red-500 font-semibold">Rejected</span>
                                        @endif
                                    </th>
                                    <th>
                                        <div class="flex items-center justify-center space-x-2">
                                            <button type="button" class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:text-blue-400" data-modal-toggle="crud-modal{{ $deposit->id }}" data-modal-target="crud-modal{{ $deposit->id }}">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11H9v-2h2v2zm0-4H9V7h2v2z"></path>
                                                </svg>
                                            </button>
                                            {{-- Approve  / reject --}}
                                            @if ($deposit->status == 'pending')
                                                <button type="button" onclick="approveDeposit({{ $deposit->id }})" class="text-green-600 hover:text-green-900 dark:text-green-500 dark:hover:text-green-400">
                                                    Approve
                                                </button>
                                                <button type="button" onclick="rejectDeposit({{ $deposit->id }})" class="text-red-600 hover:text-red-900 dark:text-red-500 dark:hover:text-red-400">
                                                    Reject
                                            </button>
                                            @endif
                                        </div>

                                    </th>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <span class="text-gray-500">No users found.</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    @foreach ($deposits as $deposit)
        <div id="crud-modal{{ $deposit->id }}" role="dialog" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-zinc-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Deposit Details: {{ $deposit->user->name }}
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal{{ $deposit->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4">
                      <table class="min-w-full bg-white dark:bg-neutral-800 mx-auto">
                        <thead>
                          <tr>
                            <th class="px-4 py-2">Field</th>
                            <th class="px-4 py-2">Value</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="border px-4 py-2">User ID</td>
                            <td class="border px-4 py-2">{{ $deposit->user_id }}</td>
                          </tr>
                          <tr>
                            <td class="border px-4 py-2">Amount</td>
                            <td class="border px-4 py-2">{{ $deposit->amount }}</td>
                          </tr>
                          <tr>
                            <td class="border px-4 py-2">Status</td>
                            <td class="border px-4 py-2">{{ $deposit->status }}</td>
                          </tr>
                          <tr>
                            <td class="border px-4 py-2">Transaction ID</td>
                            <td class="border px-4 py-2">{{ $deposit->trx_id }}</td>
                          </tr>
                          <tr>
                            <td class="border px-4 py-2">From Address</td>
                            <td class="border px-4 py-2">{{ $deposit->from_address ?? 'N/A' }}</td>
                          </tr>
                          <tr>
                            <td class="border px-4 py-2">Network</td>
                            <td class="border px-4 py-2">{{ $deposit->network }}</td>
                          </tr>
                          <tr>
                            <td class="border px-4 py-2">Coin</td>
                            <td class="border px-4 py-2">{{ $deposit->coin->symbol }}</td>
                          </tr>
                          <tr>
                            <td class="border px-4 py-2">Receipt</td>
                            <td class="border px-4 py-2">
                              <img src="{{ $deposit->receipt ? asset('storage/deposits/' . $deposit->receipt) : asset('assets/images/placeholder.svg') }}" alt="Receipt" class="w-32 h-32 object-cover rounded">
                            </td>
                          </tr>
                          <tr>
                            <td class="border px-4 py-2">Created At</td>
                            <td class="border px-4 py-2">{{ $deposit->created_at }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection
@push('script')
<script>
function approveDeposit(id) {
    if (confirm('Are you sure you want to approve this deposit?')) {
        fetch(`/admin/deposits/${id}/approve`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            }
        })
        .then(() => location.reload())
        .catch(error => {
            alert('An error occurred.');
            console.error(error);
        });
    }
}

function rejectDeposit(id) {
    if (confirm('Are you sure you want to reject this deposit?')) {
        fetch(`/admin/deposits/${id}/reject`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            }
        })
        .then(() => location.reload())
        .catch(error => {
            alert('An error occurred.');
            console.error(error);
        });
    }
}
</script>

@endpush