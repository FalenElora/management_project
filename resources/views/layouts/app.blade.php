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
     
      <a href="{{ url('/') }}" class="text-white text-xl font-bold tracking-wide">
        management proyek
      </a>

              <ul class="flex space-x-4 items-center text-sm leading-none"> <!-- Tambah leading-none -->
          <li>
            <a href="{{ route('customer.index') }}" 
              class="text-teal-50 font-medium hover:bg-white/20 px-3 py-1 rounded transition">
              customer
            </a>
          </li>
          <li>
            <a href="{{ route('proyek.index') }}" 
              class="text-teal-50 font-medium hover:bg-white/20 px-3 py-1 rounded transition">
              proyek
            </a>
          </li>
          <li>
            <a href="{{ route('proyek_invoice.index') }}" 
              class="text-teal-50 font-medium hover:bg-white/20 px-3 py-1 rounded transition">
              invoice
            </a>
          </li>
          <li>
            <a href="{{ route('proyek_kwitansi.index') }}" 
              class="text-teal-50 font-medium hover:bg-white/20 px-3 py-1 rounded transition">
              kwitansi
            </a>
          </li>
          <li>
            <a href="{{ route('proyek_fitur.index') }}" 
              class="text-teal-50 font-medium hover:bg-white/20 px-3 py-1 rounded transition">
              fitur
            </a>
          </li>
          <li>
            <a href="{{ route('proyek_fitur_user.index') }}" 
              class="text-teal-50 font-medium hover:bg-white/20 px-3 py-1 rounded transition">
             fitur user
            </a>
          </li>
          <li>
            <a href="{{ route('proyek_catatan_pekerjaan.index') }}" 
              class="text-teal-50 font-medium hover:bg-white/20 px-3 py-1 rounded transition">
              catatan pekerjaan
            </a>
          </li>
          <li>
            <a href="{{ route('proyek_file.index') }}" 
              class="text-teal-50 font-medium hover:bg-white/20 px-3 py-1 rounded transition">
              proyek file
            </a>
          </li>
          <li>
            <a href="{{ route('proyek_user.index') }}" 
              class="text-teal-50 font-medium hover:bg-white/20 px-3 py-1 rounded transition">
              proyek user
            </a>
          </li>
        </ul>


       <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" 
            class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-lg shadow transition">
            Logout
          </button>
        </form>
    </div>
  </nav>

  <!-- CONTENT -->
  <div class="container mx-auto mt-6 px-6">
    @yield('content')
  </div>

</body>
</html>
