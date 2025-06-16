        {{-- <aside id="sidebar" class="sidebar fixed md:static z-5 w-72 bg-dark-sidebar max-h-[calc(100vh-3.5rem)] flex flex-col md:overflow-hidden">
            <div class="relative w-full">
                <button id="menu-toggle" class="text-white absolute top-2 bg-crypto-primary/40 hover:bg-crypto-primary/60 p-2 rounded-full -right-10 md:right-2" aria-label="Toggle menu">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="flex-1 overflow-y-auto custom-scrollbar">
                <!-- Dashboard Link -->
                <a href="" class="sidebar-item flex items-center gap-3 px-4 py-4 bg-dark-lighter">
                    <i class="fas fa-home w-5 text-center text-crypto-primary"></i>
                    <span class="font-medium sidebar-text">Dashboard</span>
                </a>

                <!-- Assets Link with Dropdown -->
                <div class="sidebar-nav-item">
                    <button class="sidebar-item w-full flex items-center justify-between px-4 py-4 text-left" aria-expanded="false">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-wallet w-5 text-center text-crypto-primary"></i>
                            <span class="sidebar-text">Assets</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs dropdown-chevron"></i>
                    </button>
                    <div class="sidebar-dropdown bg-dark-hover pl-6 pr-4">
                        <a href="#" class="sidebar-item block py-3 ps-3 text-gray-300 hover:text-white">Overview</a>
                        <a href="#" class="sidebar-item block py-3 ps-3 text-gray-300 hover:text-white">Deposit</a>
                        <a href="#" class="sidebar-item block py-3 ps-3 text-gray-300 hover:text-white">Withdraw</a>
                        <a href="#" class="sidebar-item block py-3 ps-3 text-gray-300 hover:text-white">Transaction History</a>
                    </div>
                </div>

                <!-- Orders Link with Dropdown -->
                <div class="sidebar-nav-item">
                    <button class="sidebar-item w-full flex items-center justify-between px-4 py-4 text-left" aria-expanded="false">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-file-invoice w-5 text-center text-crypto-primary"></i>
                            <span class="sidebar-text">Orders</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs dropdown-chevron"></i>
                    </button>
                    <div class="sidebar-dropdown bg-dark-hover pl-6 pr-4">
                        <a href="#" class="sidebar-item block py-3 ps-3 text-gray-300 hover:text-white">Open Orders</a>
                        <a href="#" class="sidebar-item block py-3 ps-3 text-gray-300 hover:text-white">Order History</a>
                        <a href="#" class="sidebar-item block py-3 ps-3 text-gray-300 hover:text-white">Trade History</a>
                    </div>
                </div>

                <!-- Rewards Hub Link -->
                <a href="#" class="sidebar-item flex items-center gap-3 px-4 py-4">
                    <i class="fas fa-gift w-5 text-center text-crypto-primary"></i>
                    <span class="sidebar-text">Rewards Hub</span>
                </a>

                <!-- Referral Link -->
                <a href="#" class="sidebar-item flex items-center gap-3 px-4 py-4">
                    <i class="fas fa-user-plus w-5 text-center text-crypto-primary"></i>
                    <span class="sidebar-text">Referral</span>
                </a>

                <!-- Account Link with Dropdown -->
                <div class="sidebar-nav-item">
                    <button class="sidebar-item w-full flex items-center justify-between px-4 py-4 text-left" aria-expanded="false">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-user w-5 text-center text-crypto-primary"></i>
                            <span class="sidebar-text">Account</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs dropdown-chevron"></i>
                    </button>
                    <div class="sidebar-dropdown bg-dark-hover pl-6 pr-4">
                        <a href="#" class="sidebar-item block py-3 ps-3 text-gray-300 hover:text-white">Profile</a>
                        <a href="#" class="sidebar-item block py-3 ps-3 text-gray-300 hover:text-white">Security</a>
                        <a href="#" class="sidebar-item block py-3 ps-3 text-gray-300 hover:text-white">Verification</a>
                        <a href="#" class="sidebar-item block py-3 ps-3 text-gray-300 hover:text-white">API Management</a>
                    </div>
                </div>

                <!-- Sub Accounts Link -->
                <a href="#" class="sidebar-item flex items-center gap-3 px-4 py-4">
                    <i class="fas fa-users w-5 text-center text-crypto-primary"></i>
                    <span class="sidebar-text">Sub Accounts</span>
                </a>

                <!-- Settings Link -->
                <a href="#" class="sidebar-item flex items-center gap-3 px-4 py-4">
                    <i class="fas fa-cog w-5 text-center text-crypto-primary"></i>
                    <span class="sidebar-text">Settings</span>
                </a>
            </div>

            <!-- Sidebar Footer -->
            <div class="p-4 border-t border-dark-border mt-auto">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img src="assets/images/placeholder.svg" alt="User Avatar" class="w-8 h-8 rounded-full" />
                        <span class="ml-3 text-sm sidebar-text">User-d6270</span>
                    </div>
                    <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </div>
            </div>
        </aside> --}}
        <aside id="sidebar" class="fixed top-15 z-30 h-[calc(100vh-3.5rem)] w-72 bg-crypto-accent/90 text-white border-r border-gray-800 transition-transform -translate-x-full md:translate-x-0 md:static md:flex-shrink-0">
            <!-- Mobile Toggle Button -->
            <div class="md:hidden flex justify-end p-2">
                <button id="closeSidebar" class="text-white hover:text-gray-300">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <nav class="flex flex-col h-full pt-4">
                <!-- Menu Button (visible on desktop to collapse sidebar if needed) -->
                {{-- <div class="hidden relative md:flex justify-end p-2">
                    <button id="toggleSidebar" class="text-white absolute top-5 end-4 p-1 hover:text-gray-300">
                        <i class="fas fa-bars"></i>
                    </button>
                </div> --}}

                <div class="flex-1 overflow-y-auto px-2 space-y-1 custom-scrollbar">
                    <!-- Dashboard -->
                    <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 px-4 {{ url()->current() == route('user.dashboard') ? 'bg-crypto-primary/20 font-semibold' : '' }} py-3 rounded rounded-e-xl hover:bg-crypto-primary/20 transition">
                        <i class="fas fa-home w-5 text-center text-crypto-primary"></i>
                        <span class="text-sm">Dashboard</span>
                    </a>
                    <a href="{{ route('web.markets') }}" class="flex items-center gap-3 px-4 {{ url()->current() == route('web.markets') ? 'bg-crypto-primary/20 font-semibold' : '' }} py-3 rounded rounded-e-xl hover:bg-crypto-primary/20 transition">
                        <i class="fas fa-shop w-5 text-center text-crypto-primary"></i>
                        <span class="text-sm">Markets</span>
                    </a>

                    <div class="space-y-1">
                        <button data-collapse-toggle="earn-dropdown" class="w-full flex items-center justify-between px-4 py-3 rounded rounded-e-xl hover:bg-crypto-primary/20 transition {{ Route::is('web.earn.*') ? 'bg-crypto-primary/20 font-semibold' : '' }}">
                            <span class="flex items-center gap-3">
                                <i class="fas fa-dollar w-5 text-center text-crypto-primary"></i>
                                <span class="text-sm">Earn</span>
                            </span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div id="earn-dropdown" class="pl-10 {{ Route::is('web.earn.*') ? '' : 'hidden' }}">
                            <a href="{{ route('web.earn.overview') }}" class="block py-2 text-sm hover:text-white  {{ Route::is('web.earn.overview') ? 'text-crypto-primary font-semibold' : 'text-gray-400' }}">Overview</a>
                        </div>
                    </div>

                    {{-- 
                    <!-- Dropdown Menu -->
                    <div class="space-y-1">
                        <button data-collapse-toggle="assets-dropdown" class="w-full flex items-center justify-between px-4 py-3 rounded rounded-e-xl hover:bg-crypto-primary/20 transition">
                            <span class="flex items-center gap-3">
                                <i class="fas fa-wallet w-5 text-center text-crypto-primary"></i>
                                <span class="text-sm">Assets</span>
                            </span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div id="assets-dropdown" class="pl-10 hidden">
                            <a href="#" class="block py-2 text-sm hover:text-white text-gray-400">Overview</a>
                            <a href="#" class="block py-2 text-sm hover:text-white text-gray-400">Deposit</a>
                            <a href="#" class="block py-2 text-sm hover:text-white text-gray-400">Withdraw</a>
                            <a href="#" class="block py-2 text-sm hover:text-white text-gray-400">Transactions</a>
                        </div>
                    </div>

                    <!-- More Menus -->
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded rounded-e-xl hover:bg-crypto-primary/20 transition">
                        <i class="fas fa-gift w-5 text-center text-crypto-primary"></i>
                        <span class="text-sm">Rewards Hub</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded rounded-e-xl hover:bg-crypto-primary/20 transition">
                        <i class="fas fa-user-plus w-5 text-center text-crypto-primary"></i>
                        <span class="text-sm">Referral</span>
                    </a>

                    <!-- Another Dropdown -->
                    <div class="space-y-1 overflow-hidden">
                        <button data-collapse-toggle="account-dropdown" class="w-full flex items-center justify-between px-4 py-3 rounded rounded-e-xl hover:bg-crypto-primary/20 transition">
                            <span class="flex items-center gap-3">
                                <i class="fas fa-user w-5 text-center text-crypto-primary"></i>
                                <span class="text-sm">Account</span>
                            </span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div id="account-dropdown" class="dropdown-menu pl-10 hidden">
                            <a href="#" class="block py-2 text-sm hover:text-white text-gray-400">Profile</a>
                            <a href="#" class="block py-2 text-sm hover:text-white text-gray-400">Security</a>
                            <a href="#" class="block py-2 text-sm hover:text-white text-gray-400">Verification</a>
                            <a href="#" class="block py-2 text-sm hover:text-white text-gray-400">API Management</a>
                        </div>
                    </div> --}}
                </div>

                <!-- Footer -->
                <div class="p-4 border-t border-gray-800 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="/assets/images/placeholder.svg" alt="User" class="w-8 h-8 rounded-full">
                        <span class="text-sm">{{ auth()->user()->name }}</span>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-400 hover:text-white">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Mobile Toggle Trigger -->
        <button id="openSidebar" class="md:hidden fixed top-20 left-[4px] z-40 text-white bg-crypto-accent/90 p-2 rounded-full shadow-lg">
            <i class="fas fa-bars"></i>
        </button>

        <script>
            // Sidebar open/close logic for mobile
            document.getElementById('openSidebar')?.addEventListener('click', () => {
                document.getElementById('sidebar')?.classList.remove('-translate-x-full');
                document.getElementById('openSidebar')?.classList.remove('z-40');
            });

            document.getElementById('closeSidebar')?.addEventListener('click', () => {
                document.getElementById('sidebar')?.classList.add('-translate-x-full');
                document.getElementById('openSidebar')?.classList.add('z-40');
            });

            // Toggle dropdowns
            document.querySelectorAll('[data-collapse-toggle]').forEach(btn => {
                btn.addEventListener('click', () => {
                    const target = document.getElementById(btn.getAttribute('data-collapse-toggle'));
                    target.classList.toggle('show');
                });
            });
        </script>
