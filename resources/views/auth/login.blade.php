<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
    <h1 class="text-center text-xl font-semibold text-gray-800 mb-6">Form Login</h1>

    <form action="{{ route('loginProses') }}" method="POST" class="space-y-4">
      @csrf

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="text" name="email" id="email" placeholder="Masukkan email" 
               value="{{ old('email') }}" required
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400">
        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" name="password" id="password" placeholder="Masukkan password" required
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400">
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit" 
              class="w-full py-2 bg-gradient-to-r from-teal-500 to-teal-600 text-white font-medium rounded-md shadow hover:from-teal-600 hover:to-teal-700 transition">
        Login
      </button>
       <p class="text-sm text-center mt-4 text-gray-600">
      Belum punya akun? 
      <a href="{{ route('register') }}" class="text-teal-600 hover:underline">Register</a>
    </p>
    </form>
  </div>

</body>
</html>
