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
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 {{ url()->current() == route('admin.dashboard') ? 'bg-crypto-primary/20' : '' }} py-3 rounded rounded-e-xl hover:bg-crypto-primary/20 transition">
                        <i class="fas fa-home w-5 text-center text-crypto-primary"></i>
                        <span class="text-sm">Dashboard</span>
                    </a>
                    <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-4 {{ url()->current() == route('admin.users') ? 'bg-crypto-primary/20' : '' }} py-3 rounded rounded-e-xl hover:bg-crypto-primary/20 transition">
                        <i class="fas fa-user-group w-5 text-center text-crypto-primary"></i>
                        <span class="text-sm">Users</span>
                    </a>
                    <a href="{{ route('admin.deposits') }}" class="flex items-center gap-3 px-4 {{ url()->current() == route('admin.deposits') ? 'bg-crypto-primary/20' : '' }} py-3 rounded rounded-e-xl hover:bg-crypto-primary/20 transition">
                        <i class="fas fa-money-bill-wave w-5 text-center text-crypto-primary"></i>
                        <span class="text-sm">Deposits</span>
                    </a>
                    <a href="{{ route('withdrawals.index') }}" class="flex items-center gap-3 px-4 {{ url()->current() == route('withdrawals.index') ? 'bg-crypto-primary/20' : '' }} py-3 rounded rounded-e-xl hover:bg-crypto-primary/20 transition">
                        <i class="fas fa-money-bill-wave w-5 text-center text-crypto-primary"></i>
                        <span class="text-sm">Withdrawals</span>
                    </a>
                    <!-- Crypto Data Dropdown -->
                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center gap-3 px-4 py-3 rounded rounded-e-xl hover:bg-crypto-primary/20 transition text-left">
                            <i class="fas fa-coins w-5 text-center text-crypto-primary"></i>
                            <span class="text-sm flex-1">Exchange Data</span>
                            <i :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-xs"></i>
                        </button>
                        <div x-show="open" x-collapse class="mt-1 space-y-1 pl-9">
                            <a href="{{ route('admin.exchanges.index') }}" class="block text-sm py-2 px-2 rounded hover:bg-crypto-primary/20 {{ request()->routeIs('admin.exchanges.*') ? 'bg-crypto-primary/20' : '' }}">
                                All Exchanges
                            </a>
                            <a href="{{ route('admin.pairs.index') }}" class="block text-sm py-2 px-2 rounded hover:bg-crypto-primary/20 {{ request()->routeIs('admin.pairs.*') ? 'bg-crypto-primary/20' : '' }}">
                                All Trading Pairs
                            </a>
                        </div>
                    </div>
                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center gap-3 px-4 py-3 rounded rounded-e-xl hover:bg-crypto-primary/20 transition text-left">
                            <i class="fas fa-coins w-5 text-center text-crypto-primary"></i>
                            <span class="text-sm flex-1">Arbitrage Bots</span>
                            <i :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-xs"></i>
                        </button>
                        <div x-show="open" x-collapse class="mt-1 space-y-1 pl-9">
                            <a href="{{ route('admin.arbitrage.create') }}" class="block text-sm py-2 px-2 rounded hover:bg-crypto-primary/20 {{ request()->routeIs('admin.arbitrage.create') ? 'bg-crypto-primary/20' : '' }}">
                                Create
                            </a>
                            <a href="{{ route('admin.arbitrage.index') }}" class="block text-sm py-2 px-2 rounded hover:bg-crypto-primary/20 {{ request()->routeIs('admin.arbitrage.index') ? 'bg-crypto-primary/20' : '' }}">
                                View
                            </a>
                            <a href="{{ route('admin.arbitrage.subscriptions') }}" class="block text-sm py-2 px-2 rounded hover:bg-crypto-primary/20 {{ request()->routeIs('admin.arbitrage.subscriptions') ? 'bg-crypto-primary/20' : '' }}">
                                Subscriptions
                            </a>
                        </div>
                    </div>
                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center gap-3 px-4 py-3 rounded rounded-e-xl hover:bg-crypto-primary/20 transition text-left">
                            <i class="fas fa-coins w-5 text-center text-crypto-primary"></i>
                            <span class="text-sm flex-1">Copy Traders</span>
                            <i :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-xs"></i>
                        </button>
                        <div x-show="open" x-collapse class="mt-1 space-y-1 pl-9">
                            <a href="{{ route('admin.copy-trader.create') }}" class="block text-sm py-2 px-2 rounded hover:bg-crypto-primary/20 {{ request()->routeIs('admin.copy-trader.create') ? 'bg-crypto-primary/20' : '' }}">
                                Create
                            </a>
                            <a href="#" class="block text-sm py-2 px-2 rounded hover:bg-crypto-primary/20 {{ request()->routeIs('admin.arbitrage.index') ? 'bg-crypto-primary/20' : '' }}">
                                View
                            </a>
                            <a href="#" class="block text-sm py-2 px-2 rounded hover:bg-crypto-primary/20 {{ request()->routeIs('admin.arbitrage.subscriptions') ? 'bg-crypto-primary/20' : '' }}">
                                Subscriptions
                            </a>
                        </div>
                    </div>
                    </a>
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
