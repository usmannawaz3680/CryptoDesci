@extends('admin.layout.app')

@section('sidebar')
    @include('admin.layout.partials.sidebar')
@endsection

@section('content')
<div class="w-full overflow-x-hidden custom-scrollbar">
    <div class="content-area page-transition m-4 md:m-6">
        <div class="p-4 md:p-6 bg-crypto-accent rounded-xl text-white">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-crypto-primary">Copy Traders</h2>
                <a href="{{ route('copy-traders.create') }}" class="bg-crypto-primary text-black px-4 py-2 rounded-lg hover:bg-yellow-400 transition-colors">
                    <i class="fas fa-plus mr-2"></i> Add New Trader
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-500/20 border border-green-500 text-green-400 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-300">
                    <thead class="text-xs uppercase bg-gray-800 text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Username</th>
                            <th scope="col" class="px-6 py-3">Risk Level</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Win Rate</th>
                            <th scope="col" class="px-6 py-3">ROI</th>
                            <th scope="col" class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($copyTraders ?? [] as $trader)
                            <tr class="border-b bg-gray-800/50 border-gray-700 hover:bg-gray-700">
                                <td class="px-6 py-4 font-medium whitespace-nowrap text-white">{{ $trader->name }}</td>
                                <td class="px-6 py-4">{{ $trader->username }}</td>
                                <td class="px-6 py-4">
                                    @if($trader->risk_level == 'low')
                                        <span class="bg-green-500/20 text-green-400 text-xs font-medium px-2.5 py-0.5 rounded">Low</span>
                                    @elseif($trader->risk_level == 'medium')
                                        <span class="bg-yellow-500/20 text-yellow-400 text-xs font-medium px-2.5 py-0.5 rounded">Medium</span>
                                    @else
                                        <span class="bg-red-500/20 text-red-400 text-xs font-medium px-2.5 py-0.5 rounded">High</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($trader->status == 'active')
                                        <span class="bg-green-500/20 text-green-400 text-xs font-medium px-2.5 py-0.5 rounded">Active</span>
                                    @elseif($trader->status == 'inactive')
                                        <span class="bg-gray-500/20 text-gray-400 text-xs font-medium px-2.5 py-0.5 rounded">Inactive</span>
                                    @elseif($trader->status == 'suspended')
                                        <span class="bg-red-500/20 text-red-400 text-xs font-medium px-2.5 py-0.5 rounded">Suspended</span>
                                    @else
                                        <span class="bg-blue-500/20 text-blue-400 text-xs font-medium px-2.5 py-0.5 rounded">Full</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $trader->win_rate }}%</td>
                                <td class="px-6 py-4">{{ $trader->roi }}%</td>
                                <td class="px-6 py-4 space-x-2">
                                    <a href="{{ route('copy-traders.edit', $trader->id) }}" class="text-blue-400 hover:text-blue-300">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('copy-traders.show', $trader->id) }}" class="text-green-400 hover:text-green-300">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('copy-traders.destroy', $trader->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300" onclick="return confirm('Are you sure you want to delete this trader?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-b bg-gray-800/50 border-gray-700">
                                <td colspan="7" class="px-6 py-4 text-center text-gray-400">No copy traders found. <a href="{{ route('copy-traders.create') }}" class="text-crypto-primary hover:underline">Create one</a>.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- @if(isset($copyTraders) && $copyTraders->hasPages())
                <div class="mt-4">
                    {{ $copyTraders->links() }}
                </div>
            @endif --}}
        </div>
    </div>
</div>
@endsection