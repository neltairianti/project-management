<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Winnicode Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #111827;
            color: white;
            padding: 20px;
        }

        .sidebar a {
            color: #9ca3af;
            padding: 10px;
            display: block;
            border-radius: 8px;
            text-decoration: none;
            margin-bottom: 8px;
        }

        .sidebar a:hover,
        .active-menu {
            background: #1f2937;
            color: white !important;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        .navbar-custom {
            background: white;
            padding: 15px 20px;
            border-radius: 12px;
        }

        .card {
            border-radius: 12px;
        }
    </style>
</head>

<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h4 class="mb-4 text-center">Winnicode</h4>

        @php
            $role = auth()->user()->role;
        @endphp

        {{-- ================= ADMIN ================= --}}
        @if($role == 'admin')

            <a href="{{ route('admin.dashboard') }}"
               class="{{ request()->routeIs('admin.dashboard') ? 'active-menu' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="{{ request()->routeIs('admin.users.*') ? 'active-menu' : '' }}">
                <i class="bi bi-people"></i> User
            </a>

        @endif


        {{-- ================= MANAGER ================= --}}
        @if($role == 'manager')

            <a href="{{ route('manager.dashboard') }}"
               class="{{ request()->routeIs('manager.dashboard') ? 'active-menu' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            {{-- 🔥 TAMBAHAN PENTING --}}
            <a href="{{ route('manager.projects.index') }}"
               class="{{ request()->routeIs('manager.projects.*') ? 'active-menu' : '' }}">
                <i class="bi bi-folder"></i> Project
            </a>

        @endif


        {{-- ================= DEVELOPER ================= --}}
        @if($role == 'developer')

            <a href="{{ route('developer.dashboard') }}"
               class="{{ request()->routeIs('developer.dashboard') ? 'active-menu' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <a href="{{ route('developer.projects.index') }}"
               class="{{ request()->routeIs('developer.projects.*') ? 'active-menu' : '' }}">
                <i class="bi bi-folder"></i> Project
            </a>

            <a href="{{ route('developer.tasks.index') }}"
               class="{{ request()->routeIs('developer.tasks.*') ? 'active-menu' : '' }}">
                <i class="bi bi-list-check"></i> Task
            </a>

        @endif

    </div>


    <!-- MAIN -->
    <div class="content">

        <!-- NAVBAR -->
        <div class="navbar-custom d-flex justify-content-between align-items-center shadow-sm mb-4">

            <h5 class="mb-0">
                @yield('title', 'Dashboard')
            </h5>

            <div class="d-flex align-items-center gap-3">

                <!-- Search -->
                <input type="text" class="form-control" placeholder="Search..." style="width:200px;">

                <!-- Profile -->
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                       data-bs-toggle="dropdown">

                        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                             class="rounded-circle"
                             width="35" height="35">

                        <span class="ms-2">{{ auth()->user()->name }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="bi bi-person"></i> Profile
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

        <!-- CONTENT -->
        @yield('content')

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
