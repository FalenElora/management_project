<!DOCTYPE html>  
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Sistem Sekolah')</title>
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- NAVBAR -->
  <nav class="bg-gradient-to-r from-teal-500 to-teal-600 shadow-md">
    <div class="container mx-auto flex justify-between items-center py-3 px-6">
      <!-- Logo / Brand -->
      <a href="{{ url('/') }}" class="text-white text-xl font-bold tracking-wide">
        management proyek
      </a>

      <!-- Menu -->
      <ul class="flex space-x-6">
        <li>
          <a href="{{ route('customer.index') }}" 
             class="text-teal-50 font-medium hover:bg-white/20 px-4 py-2 rounded transition">
            customer
          </a>
        </li>
        <li>
          <a href="{{ route('proyek.index') }}" 
             class="text-teal-50 font-medium hover:bg-white/20 px-4 py-2 rounded transition">
            proyek
          </a>
        </li>
        <li>
          <a href="{{ route('proyek_invoice.index') }}" 
             class="text-teal-50 font-medium hover:bg-white/20 px-4 py-2 rounded transition">
            invoice
          </a>
        </li>
        <li>
          <a href="{{ route('proyek_kwitansi.index') }}" 
             class="text-teal-50 font-medium hover:bg-white/20 px-4 py-2 rounded transition">
            kwitansi
          </a>
        </li>
      </ul>

     
    </div>
  </nav>

  <!-- CONTENT -->
  <div class="container mx-auto mt-6 px-6">
    @yield('content')
  </div>

</body>
</html>
