<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Smart Bin Monitor</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#10B981', // Emerald 500 (Green)
                        secondary: '#3B82F6', // Blue 500
                        background: '#F3F4F6', // Gray 100
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #d1d5db; /* Gray background to make the mobile container stand out on desktop */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .mobile-container {
            width: 100%;
            max-width: 375px; /* Mobile width */
            background-color: #fafafa;
            height: 100vh;
            max-height: 100vh;
            position: relative;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        @media (min-width: 376px) {
            .mobile-container {
                height: 812px; /* Fixed height simulating iPhone X */
                border-radius: 40px;
                border: 8px solid #1f2937; /* Simulating phone bezels */
            }
        }
        .content-area {
            flex: 1;
            padding-bottom: 70px; /* Space for bottom nav */
            overflow-y: auto;
            overflow-x: hidden;
            -webkit-overflow-scrolling: touch;
        }
        /* Hide scrollbar for a cleaner mobile look */
        .content-area::-webkit-scrollbar {
            display: none;
        }
        .content-area {
            -ms-overflow-style: none; /* IE and Edge */
            scrollbar-width: none; /* Firefox */
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-800">

    <div class="mobile-container">
        <!-- Content Area -->
        <main class="content-area">
            @yield('content')
        </main>

        @auth
        <!-- Bottom Navigation -->
        <nav class="absolute bottom-0 w-full bg-white rounded-t-3xl shadow-[0_-10px_40px_rgba(0,0,0,0.08)] border-t border-gray-50 z-50">
            <div class="flex justify-around items-center px-2 py-3 pb-safe">
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-center w-16 h-12 {{ request()->routeIs('dashboard') ? 'text-primary' : 'text-gray-400 hover:text-gray-600' }}">
                    <i class="fa-solid fa-house mb-1 text-xl transition-transform {{ request()->routeIs('dashboard') ? 'scale-110' : '' }}"></i>
                    <span class="text-[9px] font-bold">Home</span>
                </a>
                <a href="{{ route('statistics') }}" class="flex flex-col items-center justify-center w-16 h-12 {{ request()->routeIs('statistics') ? 'text-primary' : 'text-gray-400 hover:text-gray-600' }}">
                    <i class="fa-solid fa-chart-simple mb-1 text-xl transition-transform {{ request()->routeIs('statistics') ? 'scale-110' : '' }}"></i>
                    <span class="text-[9px] font-bold">Stats</span>
                </a>
                
                <!-- Center FAB style button for History/Scan if needed, but requested normally -->
                <a href="{{ route('history') }}" class="flex flex-col items-center justify-center w-16 h-12 {{ request()->routeIs('history') ? 'text-primary' : 'text-gray-400 hover:text-gray-600' }}">
                    <i class="fa-solid fa-clock-rotate-left mb-1 text-xl transition-transform {{ request()->routeIs('history') ? 'scale-110' : '' }}"></i>
                    <span class="text-[9px] font-bold">History</span>
                </a>
                
                <a href="{{ route('notifications') }}" class="flex flex-col items-center justify-center w-16 h-12 relative {{ request()->routeIs('notifications') ? 'text-primary' : 'text-gray-400 hover:text-gray-600' }}">
                    <i class="fa-regular fa-bell mb-1 text-xl transition-transform {{ request()->routeIs('notifications') ? 'scale-110 fa-solid' : '' }} relative">
                        <span class="absolute -top-0.5 -right-0.5 flex h-2.5 w-2.5">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-red-500 border-2 border-white"></span>
                        </span>
                    </i>
                    <span class="text-[9px] font-bold">Notifs</span>
                </a>
                <a href="{{ route('profile') }}" class="flex flex-col items-center justify-center w-16 h-12 {{ request()->routeIs('profile') ? 'text-primary' : 'text-gray-400 hover:text-gray-600' }}">
                    <i class="fa-solid fa-user mb-1 text-xl transition-transform {{ request()->routeIs('profile') ? 'scale-110' : '' }}"></i>
                    <span class="text-[9px] font-bold">Profile</span>
                </a>
            </div>
        </nav>
        @endauth
    </div>

    @yield('scripts')
</body>
</html>
