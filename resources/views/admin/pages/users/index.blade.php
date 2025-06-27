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
                                    UID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Balance
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    KYC Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr class="odd:bg-white odd:dark:bg-neutral-800 even:bg-gray-50 even:dark:bg-neutral-700">
                                    <th scope="row" class="px-6 py-4 font-medium">
                                        {{ $user->user_uid }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->email }}
                                    </td>
                                    {{-- <td class="px-6 py-4">
                                        @if ($user->wallets->isNotEmpty())
                                            @foreach ($user->wallets as $wallet)
                                                <span class="block">{{ $wallet->wallet_uid . ' (' . $wallet->coin->symbol . ')' }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-gray-500">No wallet</span>
                                        @endif
                                    </td> --}}
                                    <td class="px-6 py-4">
                                        @if ($user->wallets->isNotEmpty())
                                            ${{ number_format($user->wallets->sum('balance'), 3) }}
                                        @else
                                            <span class="text-gray-500">No balance</span>
                                        @endif
                                    </td>
                                    {{-- <td class="px-6 py-4">
                                        @if ($user->wallets->isNotEmpty())
                                            @foreach ($user->wallets as $wallet)
                                                <span class="block">{{ $wallet->coin->symbol . ': $' . number_format($wallet->balance, 3) }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-gray-500">No holdings</span>
                                        @endif
                                    </td> --}}
                                    <td class="px-6 py-4">
                                        @if ($user->kyc_status === 'verified')
                                            <span class="text-green-500">Verified</span>
                                        @elseif ($user->kyc_status === 'pending')
                                            <span class="text-yellow-500">Pending</span>
                                        @else
                                            <span class="text-red-500">Not Verified</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <button type="button" data-modal-target="crud-modal{{ $user->id }}" data-modal-toggle="crud-modal{{ $user->id }}"  class="font-medium bg-crypto-primary px-3 py-2 rounded-lg text-crypto-accent hover:underline">Details</button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal">
                                    </td>
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
    @foreach ($users as $user)

    <div id="crud-modal{{ $user->id }}" role="dialog" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-zinc-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        User Details: {{ $user->name }}
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal{{ $user->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 disabled:opacity-50"
                                placeholder="John Doe" value="{{ $user->name }}" required="" readonly disabled>
                        </div>
                        <div class="col-span-2">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 disabled:opacity-50"
                                placeholder="email" value="{{ $user->email }}" disabled readonly required="">
                        </div>
                        <div class="col-span-2">
                            <label for="kycstatus" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KYC Status</label>
                            <select id="kycstatus"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected=true value=''>Select kycstatus</option>
                                <option value="pending" {{  $user->kyc_status == 'pending' ? 'selected' :''  }}>Pending</option>
                                <option value="verified" {{  $user->kyc_status == 'verified' ? 'selected' :''  }}>Verified</option>
                            </select>
                        </div>
                        {{-- Balances --}}
                        <div class="col-span-2">
                            <label for="balance" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Balance</label>
                            <input type="text" name="balance" id="balance"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 disabled:opacity-50"
                                placeholder="$0.00" value="{{ number_format($user->wallets->sum('balance'), 2) }}" readonly disabled>
                        </div>
                        <div class="col-span-2">
                            <label for="holdings" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Holdings</label>
                            <textarea id="holdings" rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 disabled:opacity-50" rows="1"
                                placeholder="User holdings" readonly disabled>{{ $user->wallets->map(function($wallet) { return $wallet->coin->symbol . ': $' . number_format($wallet->balance, 2); })->implode(', ') }}</textarea>
                        </div>
                        <div class="col-span-2">
                            <label for="wallets" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wallets</label>
                            <textarea id="wallets" rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 disabled:opacity-50" rows="1"
                                placeholder="User wallets" readonly disabled>{{ $user->wallets->pluck('wallet_uid')->implode(', ') }}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Update Status
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

@endsection
