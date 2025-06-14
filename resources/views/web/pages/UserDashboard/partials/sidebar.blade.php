        <aside id="sidebar" class="sidebar fixed md:static z-5 w-72 bg-dark-sidebar max-h-[calc(100vh-3.5rem)] flex flex-col md:overflow-hidden">
            <div class="relative w-full">
                <button id="menu-toggle" class="text-white absolute top-2 bg-crypto-primary/40 hover:bg-crypto-primary/60 p-2 rounded-full -right-10 md:right-2" aria-label="Toggle menu">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="flex-1 overflow-y-auto custom-scrollbar">
                <!-- Dashboard Link -->
                <a href="" class="sidebar-item flex items-center gap-3 px-4 py-4 bg-dark-lighter">
                    <i class="fas fa-home w-5 text-center"></i>
                    <span class="font-medium sidebar-text">Dashboard</span>
                </a>

                <!-- Assets Link with Dropdown -->
                <div class="sidebar-nav-item">
                    <button class="sidebar-item w-full flex items-center justify-between px-4 py-4 text-left" aria-expanded="false">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-wallet w-5 text-center"></i>
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
                            <i class="fas fa-file-invoice w-5 text-center"></i>
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
                    <i class="fas fa-gift w-5 text-center"></i>
                    <span class="sidebar-text">Rewards Hub</span>
                </a>

                <!-- Referral Link -->
                <a href="#" class="sidebar-item flex items-center gap-3 px-4 py-4">
                    <i class="fas fa-user-plus w-5 text-center"></i>
                    <span class="sidebar-text">Referral</span>
                </a>

                <!-- Account Link with Dropdown -->
                <div class="sidebar-nav-item">
                    <button class="sidebar-item w-full flex items-center justify-between px-4 py-4 text-left" aria-expanded="false">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-user w-5 text-center"></i>
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
                    <i class="fas fa-users w-5 text-center"></i>
                    <span class="sidebar-text">Sub Accounts</span>
                </a>

                <!-- Settings Link -->
                <a href="#" class="sidebar-item flex items-center gap-3 px-4 py-4">
                    <i class="fas fa-cog w-5 text-center"></i>
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
        </aside>
