@extends('admin.layout.app')

@section('sidebar')
    @include('admin.layout.partials.sidebar')
@endsection

@section('content')
<div class="w-full overflow-x-hidden custom-scrollbar">
    <div class="content-area page-transition m-4 md:m-6">
        <div class="p-4 md:p-6 bg-crypto-accent rounded-xl text-white">
            <h2 class="text-2xl font-semibold mb-4 text-crypto-primary">Copy Trading Package Templates</h2>

            @if(session('success'))
                <div class="mb-4 text-sm text-emerald-300">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 text-sm text-red-400">
                    {{ $errors->first() }}
                </div>
            @endif

            @if($packages->count())
                <div class="bg-zinc-800 rounded-lg p-4 border border-gray-700 mb-6">
                    <div class="grid grid-cols-5 gap-4 mb-2 font-medium text-sm">
                        <div>Name</div>
                        <div>Key</div>
                        <div>Duration</div>
                        <div>Status</div>
                        <div>Actions</div>
                    </div>
                    @foreach($packages as $package)
                        <div class="grid grid-cols-5 gap-4 py-2 border-t border-gray-700 text-sm items-center">
                            <div>{{ $package->name }}</div>
                            <div>{{ $package->key }}</div>
                            <div>{{ $package->duration_days }} days</div>
                            <div>
                                @if($package->is_active)
                                    <span class="px-2 py-1 text-xs rounded bg-emerald-700/40 text-emerald-300">Active</span>
                                @else
                                    <span class="px-2 py-1 text-xs rounded bg-gray-700 text-gray-300">Inactive</span>
                                @endif
                            </div>
                            <div>
                                <form action="{{ route('admin.copy-trading-packages.destroy', $package) }}" method="POST"
                                      onsubmit="return confirm('Delete this package template?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 text-xs">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('admin.copy-trading-packages.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                    <div>
                        <label class="block mb-1 text-sm font-medium text-white">Name</label>
                        <input type="text" name="name" class="bg-zinc-900 border border-gray-700 rounded-lg px-3 py-2 text-sm w-full">
                    </div>
                    <div>
                        <label class="block mb-1 text-sm font-medium text-white">Key</label>
                        <input type="text" name="key" class="bg-zinc-900 border border-gray-700 rounded-lg px-3 py-2 text-sm w-full" placeholder="e.g. 3d, 7d">
                    </div>
                    <div>
                        <label class="block mb-1 text-sm font-medium text-white">Duration (days)</label>
                        <input type="number" min="1" name="duration_days" class="bg-zinc-900 border border-gray-700 rounded-lg px-3 py-2 text-sm w-full">
                    </div>
                    <div>
                        <label class="block mb-1 text-sm font-medium text-white">Active</label>
                        <input type="checkbox" name="is_active" value="1" checked
                               class="bg-zinc-800 rounded border-gray-600">
                    </div>
                </div>
                <button type="submit"
                        class="mt-3 bg-crypto-primary text-black font-medium py-2 px-6 rounded hover:brightness-110 transition">
                    Add Template
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
