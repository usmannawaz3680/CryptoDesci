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
                                <th>
                                    Wallet ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Balance
                                </th>
                                <th>
                                    Holdings
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
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->user_uid }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($user->wallets->isNotEmpty())
                                            @foreach ($user->wallets as $wallet)
                                                <span class="block bg-slate-900/30">{{ $wallet->wallet_uid . '(' . $wallet->coin->name . ')' }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-gray-500">No wallet</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($user->wallets->isNotEmpty())
                                            ${{ number_format($user->wallets->sum('balance'), 8) }}
                                        @else
                                            <span class="text-gray-500">No balance</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($user->wallets->isNotEmpty())
                                            @foreach ($user->wallets as $wallet)
                                                <span class="block bg-slate-900/30">{{ $wallet->coin->name . ': ' . number_format($wallet->balance, 8) }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-gray-500">No holdings</span>
                                        @endif
                                    </td>
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
                                        <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal">
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
                    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Terms of Service
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5 space-y-4">
                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                        With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                                    </p>
                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that
                                        could personally affect them.
                                    </p>
                                </div>
                                <!-- Modal footer -->
                                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button data-modal-hide="default-modal" type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                                    <button data-modal-hide="default-modal" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
