@extends('web.layout.app')
@section('title', 'Deposit')

@section('sidebar')
    {{-- @include('web.pages.UserDashboard.partials.sidebar') --}}
    @include('components.user-sidebar')
@endsection
@push('style')
    <style>
        :root {
            --binance-yellow: #F0B90B;
            --binance-dark: #0B0E11;
            --binance-gray: #1E2329;
            --binance-light-gray: #2B3139;
            --binance-text: #EAECEF;
            --binance-text-secondary: #848E9C;
        }

        .binance-card {
            background-color: var(--binance-gray);
            border: 1px solid var(--binance-light-gray);
            border-radius: 8px;
        }

        .binance-input {
            background-color: var(--binance-light-gray);
            border: 1px solid #3C4043;
            color: var(--binance-text);
        }

        .binance-input:focus {
            border-color: var(--binance-yellow);
            box-shadow: 0 0 0 1px var(--binance-yellow);
        }

        .binance-btn-primary {
            background-color: var(--binance-yellow);
            color: var(--binance-dark);
            font-weight: 600;
        }

        .binance-btn-primary:hover {
            background-color: #D4A017;
        }

        .binance-btn-secondary {
            background-color: transparent;
            border: 1px solid var(--binance-yellow);
            color: var(--binance-yellow);
        }

        .binance-btn-secondary:hover {
            background-color: var(--binance-yellow);
            color: var(--binance-dark);
        }

        .step-indicator {
            background-color: var(--binance-light-gray);
            border: 2px solid #3C4043;
        }

        .step-indicator.active {
            background-color: var(--binance-yellow);
            border-color: var(--binance-yellow);
            color: var(--binance-dark);
        }

        .step-indicator.completed {
            background-color: #02C076;
            border-color: #02C076;
            color: white;
        }

        .qr-code-container {
            background: linear-gradient(135deg, #F0B90B 0%, #D4A017 100%);
            padding: 20px;
            border-radius: 12px;
            display: inline-block;
        }

        .deposit-address {
            background-color: var(--binance-light-gray);
            border: 1px dashed var(--binance-yellow);
            padding: 16px;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            word-break: break-all;
        }

        .network-badge {
            background-color: var(--binance-yellow);
            color: var(--binance-dark);
            padding: 4px 12px;
            border-radius: 16px;
            font-size: 12px;
            font-weight: 600;
        }

        .warning-box {
            background-color: rgba(255, 193, 7, 0.1);
            border: 1px solid rgba(255, 193, 7, 0.3);
            border-radius: 8px;
            padding: 16px;
        }

        .step-content {
            display: none;
        }

        .step-content.active {
            display: block;
        }

        .file-upload-area {
            border: 2px dashed var(--binance-yellow);
            border-radius: 8px;
            padding: 40px;
            text-align: center;
            background-color: rgba(240, 185, 11, 0.05);
            transition: all 0.3s ease;
        }

        .file-upload-area:hover {
            background-color: rgba(240, 185, 11, 0.1);
        }

        .file-upload-area.dragover {
            background-color: rgba(240, 185, 11, 0.15);
            border-color: #D4A017;
        }
    </style>
@endpush
@section('content')
    <div class="container mx-auto px-4 py-5 mb-3 max-w-4xl">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-2">Deposit Cryptocurrency</h1>
            <p class="text-gray-400">Follow the steps below to complete your deposit</p>
        </div>

        <!-- Progress Steps -->
        <div class="flex justify-center mb-8">
            <div class="flex items-center space-x-4">
                <div class="flex items-center">
                    <div class="step-indicator active w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold" id="step-1-indicator">1</div>
                    <span class="ml-2 text-sm font-medium">Currency</span>
                </div>
                <div class="w-12 h-0.5 bg-gray-600"></div>
                <div class="flex items-center">
                    <div class="step-indicator w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold" id="step-2-indicator">2</div>
                    <span class="ml-2 text-sm font-medium">Network</span>
                </div>
                <div class="w-12 h-0.5 bg-gray-600"></div>
                <div class="flex items-center">
                    <div class="step-indicator w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold" id="step-3-indicator">3</div>
                    <span class="ml-2 text-sm font-medium">Address</span>
                </div>
                <div class="w-12 h-0.5 bg-gray-600"></div>
                <div class="flex items-center">
                    <div class="step-indicator w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold" id="step-4-indicator">4</div>
                    <span class="ml-2 text-sm font-medium">Confirm</span>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="binance-card p-8">
            <form id="depositForm" action="{{ route('user.deposit.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Step 1: Currency Selection -->
                <div class="step-content active" id="step-1">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold mb-2">Select Cryptocurrency</h2>
                        <p class="text-gray-400">Choose the cryptocurrency you want to deposit</p>
                    </div>

                    <div class="max-w-md mx-auto">
                        <label for="currency" class="block text-sm font-medium mb-2">Cryptocurrency</label>
                        <select id="currency" name="coin" class="binance-input w-full px-4 py-3 rounded-lg focus:outline-none" required>
                            <option value="" selected>Select a cryptocurrency</option>
                            @foreach ($assets as $asset)
                                <option value="{{ $asset->id }}" data-networks='["Tron (TRC20)"]'>
                                    {{ $asset->name }} ({{ $asset->symbol }})
                                </option>
                            @endforeach
                            {{-- <option value="USDT" data-networks='["Ethereum (ERC20)", "Tron (TRC20)", "Binance Smart Chain (BEP20)"]'>Tether (USDT)</option>
                            <option value="BNB" data-networks='["Binance Smart Chain (BEP20)", "Binance Chain (BEP2)"]'>Binance Coin (BNB)</option>
                            <option value="ADA" data-networks='["Cardano"]'>Cardano (ADA)</option>
                            <option value="DOT" data-networks='["Polkadot"]'>Polkadot (DOT)</option> --}}
                        </select>
                        @error('coin')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-center mt-8">
                        <button type="button" class="binance-btn-primary px-8 py-3 rounded-lg" onclick="nextStep(1)" id="currency-next" disabled>
                            Continue <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 2: Network Selection -->
                <div class="step-content" id="step-2">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold mb-2">Select Network</h2>
                        <p class="text-gray-400">Choose the network for your deposit</p>
                    </div>

                    <div class="max-w-md mx-auto">
                        <label for="network" class="block text-sm font-medium mb-2">Network</label>
                        <select id="network" name="network" class="binance-input w-full px-4 py-3 rounded-lg focus:outline-none" required>
                            <option value="">Select a network</option>
                        </select>
                        @error('network')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <div class="warning-box mt-4">
                            <div class="flex items-start">
                                <i class="fas fa-exclamation-triangle text-crypto-primary mt-1 mr-3"></i>
                                <div>
                                    <p class="font-medium text-crypto-primary mb-1">Important Notice</p>
                                    <p class="text-sm text-gray-300">Make sure to select the correct network. Sending funds to the wrong network may result in permanent loss.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center space-x-4 mt-8">
                        <button type="button" class="binance-btn-secondary px-6 py-3 rounded-lg" onclick="prevStep(2)">
                            <i class="fas fa-arrow-left mr-2"></i> Back
                        </button>
                        <button type="button" class="binance-btn-primary px-8 py-3 rounded-lg" onclick="nextStep(2)" id="network-next" disabled>
                            Continue <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 3: Deposit Information -->
                <div class="step-content" id="step-3">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold mb-2">Deposit Information</h2>
                        <p class="text-gray-400">Use the information below to complete your deposit</p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- QR Code Section -->
                        <div class="text-center">
                            <h3 class="text-lg font-semibold mb-4">QR Code</h3>
                            <div class="qr-code-container mx-auto">
                                <img src="{{ asset('assets/images/placeholder.svg') }}" alt="Deposit QR Code" class="w-48 h-48 bg-white rounded-lg" id="qr-code">
                            </div>
                            <p class="text-sm text-gray-400 mt-2">Scan with your wallet app</p>
                        </div>

                        <!-- Address Section -->
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Deposit Address</h3>
                            <div class="deposit-address mb-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm" id="deposit-address">1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa</span>
                                    <button type="button" class="text-crypto-primary hover:text-crypto-primary ml-2" onclick="copyAddress()">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-4">
                                <span class="network-badge" id="selected-network-badge">Bitcoin</span>
                            </div>

                            <div class="mb-4">
                                <label for="deposit_amount" class="block text-sm font-medium mb-2">Amount to Deposit</label>
                                <input type="number" id="deposit_amount" name="amount" step="0.00000001" class="binance-input w-full px-4 py-3 rounded-lg focus:outline-none" placeholder="Enter amount" required>
                                @error('amount')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="warning-box">
                                <div class="flex items-start">
                                    <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                                    <div>
                                        <p class="font-medium text-blue-500 mb-1">Deposit Instructions</p>
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
                        <button type="button" class="binance-btn-secondary px-6 py-3 rounded-lg" onclick="prevStep(3)">
                            <i class="fas fa-arrow-left mr-2"></i> Back
                        </button>
                        <button type="button" class="binance-btn-primary px-8 py-3 rounded-lg" onclick="nextStep(3)" id="address-next" disabled>
                            I've Made the Deposit <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 4: Transaction Details -->
                <div class="step-content" id="step-4">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold mb-2">Transaction Details</h2>
                        <p class="text-gray-400">Provide your transaction details for verification</p>
                    </div>

                    <div class="max-w-2xl mx-auto space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="actual_amount" class="block text-sm font-medium mb-2">Amount Deposited *</label>
                                <input type="number" id="actual_amount" name="actual_amount" step="0.00000001" class="binance-input w-full px-4 py-3 rounded-lg focus:outline-none" placeholder="0.00000000" required>
                                @error('actual_amount')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="transaction_id" class="block text-sm font-medium mb-2">Transaction ID (Hash) *</label>
                                <input type="text" id="transaction_id" name="transaction_id" class="binance-input w-full px-4 py-3 rounded-lg focus:outline-none" placeholder="Enter transaction hash" required>
                                @error('transaction_id')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="from_address" class="block text-sm font-medium mb-2">From Address: (optional)</label>
                                <input type="text" id="from_address" name="from_address" class="binance-input w-full px-4 py-3 rounded-lg focus:outline-none" placeholder="Enter from address">
                                @error('from_address')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="receipt_image" class="block text-sm font-medium mb-2">Receipt/Screenshot (Optional)</label>
                            <div class="file-upload-area" id="file-upload-area">
                                <input type="file" id="receipt_image" name="receipt_image" accept="image/*" class="hidden">
                                <div id="upload-content">
                                    <i class="fas fa-cloud-upload-alt text-4xl text-crypto-primary mb-4"></i>
                                    <p class="text-lg font-medium mb-2">Drop your image here or <span class="text-crypto-primary cursor-pointer">browse</span></p>
                                    <p class="text-sm text-gray-400">PNG, JPG, JPEG up to 10MB</p>
                                </div>
                                <div id="file-preview" class="hidden">
                                    <img id="preview-image" class="max-w-full max-h-48 mx-auto rounded-lg mb-2">
                                    <p id="file-name" class="text-sm text-gray-300"></p>
                                    <button type="button" class="text-red-500 text-sm mt-2" onclick="removeFile()">Remove</button>
                                </div>
                            </div>
                            @error('receipt_image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="warning-box">
                            <div class="flex items-start">
                                <i class="fas fa-shield-alt text-green-500 mt-1 mr-3"></i>
                                <div>
                                    <p class="font-medium text-green-500 mb-1">Security Notice</p>
                                    <p class="text-sm text-gray-300">Your deposit will be processed after network confirmation. You can track the status in your deposit history.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center space-x-4 mt-8">
                        <button type="button" class="binance-btn-secondary px-6 py-3 rounded-lg" onclick="prevStep(4)">
                            <i class="fas fa-arrow-left mr-2"></i> Back
                        </button>
                        <button type="submit" class="binance-btn-primary px-8 py-3 rounded-lg" id="submit-btn">
                            <i class="fas fa-check mr-2"></i> Submit Deposit
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

        // Initialize form
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
                    option.value = config.value; // e.g., 'TRC20'
                    option.textContent = networkName; // Display full name
                    option.dataset.label = networkName; // Store original label for later use
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
                document.getElementById(`step-${step}`).classList.remove('active');

                // Update step indicator
                document.getElementById(`step-${step}-indicator`).classList.remove('active');
                document.getElementById(`step-${step}-indicator`).classList.add('completed');
                document.getElementById(`step-${step}-indicator`).innerHTML = '<i class="fas fa-check"></i>';

                // Show next step
                const nextStep = step + 1;
                document.getElementById(`step-${nextStep}`).classList.add('active');
                document.getElementById(`step-${nextStep}-indicator`).classList.add('active');

                currentStep = nextStep;
            }
        }

        function prevStep(step) {
            if (step > 1) {
                // Hide current step
                document.getElementById(`step-${step}`).classList.remove('active');
                document.getElementById(`step-${step}-indicator`).classList.remove('active');

                // Show previous step
                const prevStep = step - 1;
                document.getElementById(`step-${prevStep}`).classList.add('active');

                // Update previous step indicator
                document.getElementById(`step-${prevStep}-indicator`).classList.remove('completed');
                document.getElementById(`step-${prevStep}-indicator`).classList.add('active');
                document.getElementById(`step-${prevStep}-indicator`).textContent = prevStep;

                currentStep = prevStep;
            }
        }

        function copyAddress() {
            const address = document.getElementById('deposit-address').textContent;
            navigator.clipboard.writeText(address).then(() => {
                // Show success message
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
            const uploadContent = document.getElementById('upload-content');
            const filePreview = document.getElementById('file-preview');

            // Click to upload
            uploadArea.addEventListener('click', () => fileInput.click());

            // Drag and drop
            uploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadArea.classList.add('dragover');
            });

            uploadArea.addEventListener('dragleave', () => {
                uploadArea.classList.remove('dragover');
            });

            uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.classList.remove('dragover');
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

        // Form submission
        document.getElementById('depositForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submit-btn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Processing...';
        });
    </script>
@endPush
