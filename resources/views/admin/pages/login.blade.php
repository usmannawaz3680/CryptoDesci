<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form method="POST" action="{{ route('admin.login.submit') }}" class="bg-white p-8 rounded shadow-md w-full max-w-md">
        @csrf
        <h2 class="text-2xl font-bold mb-6 text-center">Admin Login</h2>

        @error('email')
            <div class="text-red-500 mb-4 text-sm">{{ $message }}</div>
        @enderror

        <input type="email" name="email" placeholder="Email" required class="w-full p-2 mb-4 border rounded" />
        <input type="password" name="password" placeholder="Password" required class="w-full p-2 mb-4 border rounded" />
        <label class="inline-flex items-center mb-4">
            <input type="checkbox" name="remember" class="mr-2"> Remember me
        </label>
        <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Login</button>
    </form>
</body>
</html>
