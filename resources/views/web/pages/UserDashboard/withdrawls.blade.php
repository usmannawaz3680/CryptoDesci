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
            <h1 class="text-3xl font-bold mb-2">Withdraw Cryptocurrency</h1>
            <p class="text-gray-400">Follow the steps below to complete your withdraw process</p>
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
                        <p class="text-gray-400">Choose the cryptocurrency you want to withdraw</p>
                    </div>

                    <div class="max-w-md mx-auto">
                        <label for="currency" class="block text-sm font-medium mb-2">Cryptocurrency</label>
                        <select id="currency" name="coin" class="binance-input w-full px-4 py-3 rounded-lg focus:outline-none" required>
                            <option value="" selected>Select a cryptocurrency</option>
                            @foreach ($coins as $asset)
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
                                <i class="fas fa-exclamation-triangle text-yellow-500 mt-1 mr-3"></i>
                                <div>
                                    <p class="font-medium text-yellow-500 mb-1">Important Notice</p>
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
                        <h2 class="text-2xl font-bold mb-2">Destination Wallet Information</h2>
                        <p class="text-gray-400">Use the information below to complete your withdraw</p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">

                        <!-- Address Section -->
                        <div class="col-span-2">
                            <h3 class="text-lg font-semibold mb-4">Destination Wallet Address(Binance) *</h3>
                            <div class="deposit-address mb-4">
                                <div class="flex items-center justify-between">
                                    <input type="text" name="address" class="binance-input w-full px-4 py-3 rounded-lg focus:outline-none" placeholder="Enter address" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <span class="network-badge" id="selected-network-badge">Bitcoin</span>
                            </div>

                            <div class="mb-4">
                                <label for="withdraw_amount" class="block text-sm font-medium mb-2">Amount to Withdraw</label>
                                <input type="number" id="withdraw_amount" name="amount" step="0.00000001" class="binance-input w-full px-4 py-3 rounded-lg focus:outline-none" placeholder="Enter amount" required>
                                <div class="text-sm text-gray-400 mt-2" id="available-balance-text">
                                    Available Balance: <span id="available-balance">0.00000000</span>
                                </div>


                                @error('amount')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="warning-box">
                                <div class="flex items-start">
                                    <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                                    <div>
                                        <p class="font-medium text-blue-500 mb-1">Withdrawl Instructions</p>
                                        <ul class="text-sm text-gray-300 space-y-1">
                                            <li>• Please enter a valid and active address.</li>
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
                        <button type="button" class="binance-btn-primary px-8 py-3 rounded-lg" type="submit" id="address-next" disabled>
                            Confirm Request <i class="fas fa-arrow-right ml-2"></i>
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

    const userWallets = @json($wallets); // { coin_id: balance }

    document.addEventListener('DOMContentLoaded', function () {
        setupEventListeners();
    });

    function setupEventListeners() {
        document.getElementById('currency').addEventListener('change', function () {
            const currency = this.value;
            const option = this.options[this.selectedIndex];
            const networks = JSON.parse(option.dataset.networks || '[]');
            updateNetworkOptions(networks);
            document.getElementById('currency-next').disabled = !currency;

            // Set balance & update amount input
            const balance = parseFloat(userWallets[currency] || 0);
            const amountInput = document.getElementById('withdraw_amount');
            amountInput.max = balance;
            amountInput.setAttribute('data-max', balance.toFixed(8));

            // 👇 Show balance in UI
            document.getElementById('available-balance').textContent = balance.toFixed(8);

            updateAmountStyle(); // Trigger once on change
        });

        document.getElementById('network').addEventListener('change', function () {
            document.getElementById('network-next').disabled = !this.value;
        });

        document.getElementById('withdraw_amount').addEventListener('input', updateAmountStyle);
    }

    function updateNetworkOptions(networks) {
        const networkSelect = document.getElementById('network');
        networkSelect.innerHTML = '<option value="">Select a network</option>';
        networks.forEach(network => {
            const option = document.createElement('option');
            option.value = network;
            option.textContent = network;
            networkSelect.appendChild(option);
        });
        document.getElementById('network-next').disabled = true;
    }

    function updateAmountStyle() {
        const input = document.getElementById('withdraw_amount');
        const value = parseFloat(input.value);
        const max = parseFloat(input.getAttribute('data-max') || 0);
        const button = document.getElementById('address-next');

        if (!isNaN(value) && value > 0 && value <= max) {
            input.classList.remove('border-red-500', 'text-red-500');
            input.classList.add('border-green-500', 'text-green-500');
            button.disabled = false;
        } else {
            input.classList.remove('border-green-500', 'text-green-500');
            input.classList.add('border-red-500', 'text-red-500');
            button.disabled = true;
        }
    }

    function nextStep(step) {
        if (step < totalSteps) {
            document.getElementById(`step-${step}`).classList.remove('active');
            document.getElementById(`step-${step}-indicator`).classList.remove('active');
            document.getElementById(`step-${step}-indicator`).classList.add('completed');
            document.getElementById(`step-${step}-indicator`).innerHTML = '<i class="fas fa-check"></i>';

            const nextStep = step + 1;
            document.getElementById(`step-${nextStep}`).classList.add('active');
            document.getElementById(`step-${nextStep}-indicator`).classList.add('active');

            currentStep = nextStep;
        }
    }

    function prevStep(step) {
        if (step > 1) {
            document.getElementById(`step-${step}`).classList.remove('active');
            document.getElementById(`step-${step}-indicator`).classList.remove('active');

            const prevStep = step - 1;
            document.getElementById(`step-${prevStep}`).classList.add('active');
            document.getElementById(`step-${prevStep}-indicator`).classList.remove('completed');
            document.getElementById(`step-${prevStep}-indicator`).classList.add('active');
            document.getElementById(`step-${prevStep}-indicator`).textContent = prevStep;

            currentStep = prevStep;
        }
    }
</script>
@endpush
