@extends('web.layout.app')
@section('title', 'Deposit')

@section('sidebar')
    {{-- @include('web.pages.UserDashboard.partials.sidebar') --}}
    @include('components.user-sidebar')
@endsection

@section('content')
    <div class="container mx-auto px-4 py-5 mb-3 max-w-4xl text-gray-100">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-2 text-white">Deposit Cryptocurrency</h1>
            <p class="text-gray-400">Follow the steps below to complete your deposit</p>
        </div>

        <!-- Progress Steps -->
        <div class="flex justify-start overflow-x-auto lg:justify-center mb-4 pb-4">
            <div class="flex items-center space-x-4 text-sm font-medium">
                <div class="flex items-center">
                    <div id="step-1-indicator" class="step-indicator w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold border-2 bg-crypto-primary border-crypto-primary text-crypto-accent">
                        1
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-200">Currency</span>
                </div>
                <div class="w-12 h-0.5 bg-neutral-700"></div>
                <div class="flex items-center">
                    <div id="step-2-indicator" class="step-indicator w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold border-2 bg-neutral-900 border-neutral-700 text-gray-300">
                        2
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-200">Network</span>
                </div>
                <div class="w-12 h-0.5 bg-neutral-700"></div>
                <div class="flex items-center">
                    <div id="step-3-indicator" class="step-indicator w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold border-2 bg-neutral-900 border-neutral-700 text-gray-300">
                        3
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-200">Address</span>
                </div>
                <div class="w-12 h-0.5 bg-neutral-700"></div>
                <div class="flex items-center">
                    <div id="step-4-indicator" class="step-indicator w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold border-2 bg-neutral-900 border-neutral-700 text-gray-300">
                        4
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-200">Confirm</span>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="bg-crypto-accent border border-neutral-800 rounded-xl p-6 md:p-8 shadow-md">
            <form id="depositForm" action="{{ route('user.deposit.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Step 1: Currency Selection -->
                <div class="step-content" id="step-1">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold mb-2 text-white">Select Cryptocurrency</h2>
                        <p class="text-gray-400">Choose the cryptocurrency you want to deposit</p>
                    </div>

                    <div class="max-w-md mx-auto">
                        <label for="currency" class="block text-sm font-medium mb-2 text-gray-200">Cryptocurrency</label>
                        <select id="currency" name="coin" class="w-full px-4 py-3 rounded-lg bg-neutral-900 border border-neutral-700 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-crypto-primary focus:ring-1 focus:ring-crypto-primary" required>
                            <option value="" selected>Select a cryptocurrency</option>
                            @foreach ($assets as $asset)
                                <option value="{{ $asset->id }}" data-networks='["Tron (TRC20)"]'>
                                    {{ $asset->name }} ({{ $asset->symbol }})
                                </option>
                            @endforeach
                        </select>
                        @error('coin')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-center mt-8">
                        <button type="button" id="currency-next" disabled class="px-8 py-3 rounded-lg bg-crypto-primary text-crypto-accent font-semibold inline-flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed hover:bg-lime-200 transition-colors" onclick="nextStep(1)">
                            Continue <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 2: Network Selection -->
                <div class="step-content hidden" id="step-2">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold mb-2 text-white">Select Network</h2>
                        <p class="text-gray-400">Choose the network for your deposit</p>
                    </div>

                    <div class="max-w-md mx-auto">
                        <label for="network" class="block text-sm font-medium mb-2 text-gray-200">Network</label>
                        <select id="network" name="network" class="w-full px-4 py-3 rounded-lg bg-neutral-900 border border-neutral-700 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-crypto-primary focus:ring-1 focus:ring-crypto-primary" required>
                            <option value="">Select a network</option>
                        </select>
                        @error('network')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <div class="mt-4 rounded-lg p-4 bg-amber-500/10 border border-amber-500/40">
                            <div class="flex items-start">
                                <i class="fas fa-exclamation-triangle text-crypto-primary mt-1 mr-3"></i>
                                <div>
                                    <p class="font-medium text-crypto-primary mb-1">Important Notice</p>
                                    <p class="text-sm text-gray-300">
                                        Make sure to select the correct network. Sending funds to the wrong network may result in permanent loss.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center space-x-4 mt-8">
                        <button type="button" class="px-6 py-3 rounded-lg bg-transparent border border-crypto-primary text-crypto-primary font-semibold inline-flex items-center justify-center hover:bg-crypto-primary hover:text-crypto-accent transition-colors" onclick="prevStep(2)">
                            <i class="fas fa-arrow-left mr-2 text-xs"></i> Back
                        </button>
                        <button type="button" id="network-next" disabled class="px-8 py-3 rounded-lg bg-crypto-primary text-crypto-accent font-semibold inline-flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed hover:bg-lime-200 transition-colors" onclick="nextStep(2)">
                            Continue <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 3: Deposit Information -->
                <div class="step-content hidden" id="step-3">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold mb-2 text-white">Deposit Information</h2>
                        <p class="text-gray-400">Use the information below to complete your deposit</p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- QR Code Section -->
                        <div class="text-center">
                            <h3 class="text-lg font-semibold mb-4 text-white">QR Code</h3>
                            <div class="mx-auto inline-block rounded-xl p-5 bg-gradient-to-br from-crypto-primary to-yellow-500">
                                <img src="{{ asset('assets/images/placeholder.svg') }}" alt="Deposit QR Code" class="w-48 h-48 bg-white rounded-lg object-contain" id="qr-code">
                            </div>
                            <p class="text-sm text-gray-400 mt-2">Scan with your wallet app</p>
                        </div>

                        <!-- Address Section -->
                        <div>
                            <h3 class="text-lg font-semibold mb-4 text-white">Deposit Address</h3>
                            <div class="mb-4 rounded-lg border border-dashed border-crypto-primary bg-neutral-900 p-4 font-mono break-all">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="text-sm" id="deposit-address">
                                        1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa
                                    </span>
                                    <button type="button" class="ml-2 text-crypto-primary hover:text-lime-200 transition-colors" onclick="copyAddress(event)">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-4">
                                <span id="selected-network-badge" class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-crypto-primary text-crypto-accent">
                                    Bitcoin
                                </span>
                            </div>

                            <div class="mb-4">
                                <label for="deposit_amount" class="block text-sm font-medium mb-2 text-gray-200">
                                    Amount to Deposit
                                </label>
                                <input type="number" id="deposit_amount" name="amount" step="0.00000001"
                                    class="w-full px-4 py-3 rounded-lg bg-neutral-900 border border-neutral-700 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-crypto-primary focus:ring-1 focus:ring-crypto-primary" placeholder="Enter amount" required>
                                @error('amount')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="rounded-lg p-4 bg-sky-500/10 border border-sky-500/40">
                                <div class="flex items-start">
                                    <i class="fas fa-info-circle text-sky-400 mt-1 mr-3"></i>
                                    <div>
                                        <p class="font-medium text-sky-400 mb-1">Deposit Instructions</p>
                                        <ul class="text-sm text-gray-300 space-y-1">
                                            <li>• Minimum deposit: 0.001 <span id="currency-symbol">BTC</span></li>
                                            <li>• Network confirmations required: <span id="confirmations">3</span></li>
                                            <li>• Estimated arrival time: <span id="arrival-time">30-60 minutes</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center space-x-4 mt-8">
                        <button type="button" class="px-6 py-3 rounded-lg bg-transparent border border-crypto-primary text-crypto-primary font-semibold inline-flex items-center justify-center hover:bg-crypto-primary hover:text-crypto-accent transition-colors" onclick="prevStep(3)">
                            <i class="fas fa-arrow-left mr-2 text-xs"></i> Back
                        </button>
                        <button type="button" id="address-next" disabled class="px-8 py-3 rounded-lg bg-crypto-primary text-crypto-accent font-semibold inline-flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed hover:bg-lime-200 transition-colors" onclick="nextStep(3)">
                            I've Made the Deposit <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 4: Transaction Details -->
                <div class="step-content hidden" id="step-4">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold mb-2 text-white">Transaction Details</h2>
                        <p class="text-gray-400">Provide your transaction details for verification</p>
                    </div>

                    <div class="max-w-2xl mx-auto space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="actual_amount" class="block text-sm font-medium mb-2 text-gray-200">
                                    Amount Deposited *
                                </label>
                                <input type="number" id="actual_amount" name="actual_amount" step="0.00000001"
                                    class="w-full px-4 py-3 rounded-lg bg-neutral-900 border border-neutral-700 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-crypto-primary focus:ring-1 focus:ring-crypto-primary" placeholder="0.00000000" required>
                                @error('actual_amount')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="transaction_id" class="block text-sm font-medium mb-2 text-gray-200">
                                    Transaction ID (Hash) *
                                </label>
                                <input type="text" id="transaction_id" name="transaction_id" class="w-full px-4 py-3 rounded-lg bg-neutral-900 border border-neutral-700 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-crypto-primary focus:ring-1 focus:ring-crypto-primary"
                                    placeholder="Enter transaction hash" required>
                                @error('transaction_id')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="from_address" class="block text-sm font-medium mb-2 text-gray-200">
                                    From Address: (optional)
                                </label>
                                <input type="text" id="from_address" name="from_address" class="w-full px-4 py-3 rounded-lg bg-neutral-900 border border-neutral-700 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-crypto-primary focus:ring-1 focus:ring-crypto-primary"
                                    placeholder="Enter from address">
                                @error('from_address')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="receipt_image" class="block text-sm font-medium mb-2 text-gray-200">
                                Receipt/Screenshot (Optional)
                            </label>
                            <div id="file-upload-area" class="file-upload-area rounded-lg border-2 border-dashed border-crypto-primary bg-crypto-accent/40 px-6 py-10 text-center cursor-pointer transition-colors">
                                <input type="file" id="receipt_image" name="receipt_image" accept="image/*" class="hidden">
                                <div id="upload-content">
                                    <i class="fas fa-cloud-upload-alt text-4xl text-crypto-primary mb-4"></i>
                                    <p class="text-lg font-medium mb-2">
                                        Drop your image here or
                                        <span class="text-crypto-primary cursor-pointer underline">browse</span>
                                    </p>
                                    <p class="text-sm text-gray-400">PNG, JPG, JPEG up to 10MB</p>
                                </div>
                                <div id="file-preview" class="hidden">
                                    <img id="preview-image" class="max-w-full max-h-48 mx-auto rounded-lg mb-2 object-contain">
                                    <p id="file-name" class="text-sm text-gray-300"></p>
                                    <button type="button" class="text-red-500 text-sm mt-2 hover:text-red-400" onclick="removeFile()">
                                        Remove
                                    </button>
                                </div>
                            </div>
                            @error('receipt_image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="rounded-lg p-4 bg-emerald-500/10 border border-emerald-500/40">
                            <div class="flex items-start">
                                <i class="fas fa-shield-alt text-emerald-400 mt-1 mr-3"></i>
                                <div>
                                    <p class="font-medium text-emerald-400 mb-1">Security Notice</p>
                                    <p class="text-sm text-gray-300">
                                        Your deposit will be processed after network confirmation. You can track the status in your deposit history.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center space-x-4 mt-8">
                        <button type="button" class="px-6 py-3 rounded-lg bg-transparent border border-crypto-primary text-crypto-primary font-semibold inline-flex items-center justify-center hover:bg-crypto-primary hover:text-crypto-accent transition-colors" onclick="prevStep(4)">
                            <i class="fas fa-arrow-left mr-2 text-xs"></i> Back
                        </button>
                        <button type="submit" id="submit-btn" class="px-8 py-3 rounded-lg bg-crypto-primary text-crypto-accent font-semibold inline-flex items-center justify-center hover:bg-lime-200 transition-colors">
                            <i class="fas fa-check mr-2 text-xs"></i> Submit Deposit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        let currentStep = 1;
        const totalSteps = 4;

        // Network configurations
        const networkConfig = {
            1: {
                'Tron (TRC20)': {
                    address: 'TG3XXyExBkPp9nzdajDZsozEu4BkaSJozs',
                    confirmations: 20,
                    arrivalTime: '2-5 minutes',
                    minDeposit: '10',
                    value: 'TRC20'
                },
            },
            2: {
                'Tron (TRC20)': {
                    address: 'TG3XXyExBkPp9nzdajDZsozEu4BkaSJozs',
                    confirmations: 20,
                    arrivalTime: '2-5 minutes',
                    minDeposit: '10',
                    value: 'TRC20'
                },
            }
        };

        document.addEventListener('DOMContentLoaded', function() {
            setupEventListeners();
        });

        function setupEventListeners() {
            // Currency selection
            document.getElementById('currency').addEventListener('change', function() {
                const currency = this.value;
                const networks = JSON.parse(this.options[this.selectedIndex].dataset.networks || '[]');
                updateNetworkOptions(networks);
                document.getElementById('currency-next').disabled = !currency;
            });

            // Network selection
            document.getElementById('network').addEventListener('change', function() {
                const network = this.value;
                document.getElementById('network-next').disabled = !network;
                if (network) {
                    updateDepositInfo();
                }
            });

            // Deposit amount
            document.getElementById('deposit_amount').addEventListener('input', function() {
                const amount = this.value;
                document.getElementById('address-next').disabled = !amount || parseFloat(amount) <= 0;
            });

            // File upload
            setupFileUpload();
        }

        function updateNetworkOptions(networks) {
            const networkSelect = document.getElementById('network');
            networkSelect.innerHTML = '<option value="">Select a network</option>';

            const currency = document.getElementById('currency').value;

            networks.forEach(networkName => {
                const config = networkConfig[currency]?.[networkName];
                if (config) {
                    const option = document.createElement('option');
                    option.value = config.value;
                    option.textContent = networkName;
                    option.dataset.label = networkName;
                    networkSelect.appendChild(option);
                }
            });

            document.getElementById('network-next').disabled = true;
        }

        function updateDepositInfo() {
            const currency = document.getElementById('currency').value;
            const networkSelect = document.getElementById('network');
            const selectedValue = networkSelect.value;
            const selectedLabel = networkSelect.options[networkSelect.selectedIndex]?.dataset.label;

            if (currency && selectedValue && selectedLabel && networkConfig[currency][selectedLabel]) {
                const config = networkConfig[currency][selectedLabel];

                document.getElementById('deposit-address').textContent = config.address;
                document.getElementById('selected-network-badge').textContent = selectedLabel;
                document.getElementById('currency-symbol').textContent = currency;
                document.getElementById('confirmations').textContent = config.confirmations;
                document.getElementById('arrival-time').textContent = config.arrivalTime;
                document.getElementById('deposit_amount').placeholder = `Min: ${config.minDeposit} ${currency}`;
                document.getElementById('deposit_amount').min = config.minDeposit;
            }
        }

        function nextStep(step) {
            if (step < totalSteps) {
                // Hide current step
                document.getElementById(`step-${step}`).classList.add('hidden');

                // Update current step indicator to "completed"
                const currentIndicator = document.getElementById(`step-${step}-indicator`);
                currentIndicator.classList.remove('bg-crypto-primary', 'border-crypto-primary', 'text-crypto-accent');
                currentIndicator.classList.remove('bg-neutral-900', 'border-neutral-700', 'text-gray-300');
                currentIndicator.classList.add('bg-emerald-500', 'border-emerald-500', 'text-white');
                currentIndicator.innerHTML = '<i class="fas fa-check text-xs"></i>';

                // Show next step
                const nextStep = step + 1;
                document.getElementById(`step-${nextStep}`).classList.remove('hidden');

                const nextIndicator = document.getElementById(`step-${nextStep}-indicator`);
                nextIndicator.classList.remove('bg-neutral-900', 'border-neutral-700', 'text-gray-300');
                nextIndicator.classList.add('bg-crypto-primary', 'border-crypto-primary', 'text-crypto-accent');

                currentStep = nextStep;
            }
        }

        function prevStep(step) {
            if (step > 1) {
                // Hide current step
                document.getElementById(`step-${step}`).classList.add('hidden');

                const currentIndicator = document.getElementById(`step-${step}-indicator`);
                currentIndicator.classList.remove('bg-crypto-primary', 'border-crypto-primary', 'text-crypto-accent');
                currentIndicator.classList.remove('bg-emerald-500', 'border-emerald-500', 'text-white');
                currentIndicator.classList.add('bg-neutral-900', 'border-neutral-700', 'text-gray-300');
                currentIndicator.textContent = step;

                const prevStep = step - 1;
                document.getElementById(`step-${prevStep}`).classList.remove('hidden');

                const prevIndicator = document.getElementById(`step-${prevStep}-indicator`);
                prevIndicator.classList.remove('bg-neutral-900', 'border-neutral-700', 'text-gray-300');
                prevIndicator.classList.add('bg-crypto-primary', 'border-crypto-primary', 'text-crypto-accent');
                prevIndicator.textContent = prevStep;

                currentStep = prevStep;
            }
        }

        function copyAddress(event) {
            const address = document.getElementById('deposit-address').textContent;
            navigator.clipboard.writeText(address).then(() => {
                const button = event.target.closest('button');
                const originalHTML = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check text-green-500"></i>';
                setTimeout(() => {
                    button.innerHTML = originalHTML;
                }, 2000);
            });
        }

        function setupFileUpload() {
            const fileInput = document.getElementById('receipt_image');
            const uploadArea = document.getElementById('file-upload-area');

            // Click to upload
            uploadArea.addEventListener('click', () => fileInput.click());

            // Drag and drop
            uploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadArea.classList.add('bg-amber-500/10');
            });

            uploadArea.addEventListener('dragleave', () => {
                uploadArea.classList.remove('bg-amber-500/10');
            });

            uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.classList.remove('bg-amber-500/10');
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    handleFileSelect(files[0]);
                }
            });

            fileInput.addEventListener('change', (e) => {
                if (e.target.files.length > 0) {
                    handleFileSelect(e.target.files[0]);
                }
            });
        }

        function handleFileSelect(file) {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    document.getElementById('preview-image').src = e.target.result;
                    document.getElementById('file-name').textContent = file.name;
                    document.getElementById('upload-content').classList.add('hidden');
                    document.getElementById('file-preview').classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        function removeFile() {
            document.getElementById('receipt_image').value = '';
            document.getElementById('upload-content').classList.remove('hidden');
            document.getElementById('file-preview').classList.add('hidden');
        }

        document.getElementById('depositForm').addEventListener('submit', function() {
            const submitBtn = document.getElementById('submit-btn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2 text-xs"></i> Processing...';
        });
    </script>
@endpush
