<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bengkel Online - @yield('title')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Styles -->
    <style>
        .navbar-active {
            @apply text-blue-600 border-b-2 border-blue-600;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .form-input-custom {
            @apply w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150;
        }

        .btn-primary {
            @apply bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-150;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-50 font-sans antialiased">
    <!-- Header/Navigation -->
    <header class="bg-white shadow-sm">
        <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-car text-blue-600 text-2xl"></i>
                <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600">BENGKELKU</a>
            </div>

            <div class="hidden md:flex space-x-8">
                <a href="{{ url('/') }}"
                    class="hover:text-blue-600 {{ request()->is('/') ? 'navbar-active' : '' }}">Beranda</a>
                <a href="{{ route('booking.create') }}"
                    class="hover:text-blue-600 {{ request()->is('booking*') ? 'navbar-active' : '' }}">Booking</a>
                <a href="{{ route('history.index') }}"
                    class="hover:text-blue-600 {{ request()->is('booking*') ? 'navbar-active' : '' }}">History</a>

                {{-- <a href="{{ route('tracking') }}" class="hover:text-blue-600">Tracking</a>

                @auth
                <div class="relative dropdown">
                    <button class="flex items-center space-x-1 hover:text-blue-600">
                        <i class="fas fa-user-circle"></i>
                        <span>{{ Auth::user()->name }}</span>
                    </button>
                    <div class="dropdown-menu hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                        <a href="{{ route('filament.pages.dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2 hover:bg-gray-100">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>
                @endauth --}}
            </div>

            <button class="md:hidden" id="mobile-menu-button">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </nav>

        <!-- Mobile Menu -->
        <div class="md:hidden hidden bg-white py-2 px-4" id="mobile-menu">
            <a href="{{ url('/') }}" class="block py-2 hover:text-blue-600">Beranda</a>
            <a href="{{ route('booking.create') }}" class="block py-2 hover:text-blue-600">Booking</a>
            {{-- <a href="#" class="block py-2 hover:text-blue-600">Tracking</a> --}}
            {{-- @auth
                <a href="{{ route('filament.pages.dashboard') }}" class="block py-2 hover:text-blue-600">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="block py-2">
                    @csrf
                    <button type="submit" class="hover:text-blue-600">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block py-2 hover:text-blue-600">Login</a>
            @endauth --}}
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 min-h-[calc(100vh-150px)]">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">BENGKELKU</h3>
                    <p>Layanan bengkel online terpercaya untuk kendaraan Anda.</p>
                    <div class="mt-4 flex space-x-4">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Layanan</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-blue-400">Ganti Oli</a></li>
                        <li><a href="#" class="hover:text-blue-400">Service Rutin</a></li>
                        <li><a href="#" class="hover:text-blue-400">Perbaikan Mesin</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Kontak</h3>
                    <address>
                        <p><i class="fas fa-map-marker-alt mr-2"></i> Jl. Contoh No. 123, Kota</p>
                        <p><i class="fas fa-phone mr-2"></i> (021) 123-4567</p>
                        <p><i class="fas fa-envelope mr-2"></i> info@bengkelku.com</p>
                    </address>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-6 text-center">
                <p>&copy; {{ date('Y') }} BengkelKu. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobile-menu');
            const button = document.getElementById('mobile-menu-button');

            if (!menu.contains(event.target) && event.target !== button) {
                menu.classList.add('hidden');
            }
        });
    </script>

    @stack('scripts')
</body>

</html>
