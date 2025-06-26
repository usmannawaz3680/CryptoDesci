@extends('admin.layout.app')
@section('title', 'Dashboard')

@section('sidebar')
    @include('admin.layout.partials.sidebar')
@endsection

@section('content')
    <div class="w-full overflow-x-hidden custom-scrollbar bg-neutral-900">
        <div class="content-area page-transition">
            <!-- User Profile Section -->
            <div class="p-4 md:p-6">
                <div class="flex flex-col md:flex-row md:items-center flex-wrap">
                    <!-- User Avatar and Name -->
                    <div class="flex items-center mb-4 md:mb-0">
                        <div class="relative">
                            <img src="{{ asset('assets/images/placeholder.svg')}}" alt="User Avatar" class="w-12 h-12 md:w-14 md:h-14 rounded-full bg-gray-700" />
                            <div class="absolute -bottom-1 -right-2 flex">
                                <span class="bg-green-500 w-5 h-5 flex items-center justify-center rounded-full text-xs">
                                    <i class="fas fa-check text-white"></i>
                                </span>
                                <span class="bg-blue-500 w-5 h-5 flex items-center justify-center rounded-full text-xs ml-1">
                                    <i class="fab fa-twitter text-white"></i>
                                </span>
                            </div>
                        </div>
                        <div class="ml-4">
                            @auth
                                    <h2 class="text-lg md:text-xl font-medium">{{ auth()->user()->name }}</h2>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
