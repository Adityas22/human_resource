<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Management Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f6f8fb;
            transition: all 0.3s ease;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, #007bff, #6610f2);
        }

        .navbar-brand {
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            transition: 0.2s;
        }

        .nav-link:hover {
            color: #fff !important;
            transform: scale(1.05);
        }

        /* Sidebar (Responsive Collapse) */
        .sidebar {
            background: #ffffff;
            border-right: 1px solid #dee2e6;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 230px;
            padding-top: 70px;
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        .sidebar a {
            display: block;
            padding: 10px 20px;
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
            border-radius: 8px;
            margin: 4px 8px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #007bff;
            color: white;
        }

        /* Main Content */
        .main-content {
            margin-left: 240px;
            padding: 90px 40px 40px;
            transition: all 0.3s ease;
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            background: none;
            border-bottom: 1px solid #e9ecef;
            font-weight: 600;
        }

        /* Footer */
        footer {
            position: relative;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 10;
        }


        /* Dark Mode */
        .dark-mode {
            background-color: #1e1e2f;
            color: #f1f1f1;
        }

        .dark-mode .card {
            background-color: #2b2b3d;
            color: #fff;
        }

        .dark-mode .sidebar {
            background-color: #2c2c3b;
            border-right: none;
        }

        .dark-mode .sidebar a {
            color: #ddd;
        }

        .dark-mode .sidebar a:hover {
            background-color: #6610f2;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .sidebar {
                position: fixed;
                left: -240px;
            }

            .sidebar.active {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top">
        <div class="container-fluid">
            <button class="btn btn-outline-light me-3 d-lg-none" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/dashboard') }}">
                <i class="bi bi-building"></i> HR Management
            </a>

            <div class="d-flex ms-auto">
                <button id="theme-toggle" class="btn btn-light btn-sm me-2">
                    <i class="bi bi-moon-fill"></i>
                </button>
                <a href="{{ url('/logout') }}" class="btn btn-danger btn-sm">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebarMenu">
        @if (session('role') === 'HR')
            <a href="{{ url('/dashboard') }}"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
            <a href="{{ url('/task') }}"><i class="bi bi-list-task me-2"></i> Task</a>
            <a href="{{ url('/karyawan') }}"><i class="bi bi-people me-2"></i> Karyawan</a>
            <a href="{{ url('/departemen') }}"><i class="bi bi-diagram-3 me-2"></i> Departemen</a>
            <a href="{{ url('/role') }}"><i class="bi bi-shield-lock me-2"></i> Roles</a>
            <a href="{{ url('/kehadiran') }}"><i class="bi bi-calendar-check me-2"></i> Kehadiran</a>
            <a href="{{ url('/payroll') }}"><i class="bi bi-wallet2 me-2"></i> Payroll</a>
            <a href="{{ url('/cuti') }}"><i class="bi bi-calendar-heart me-2"></i> Cuti</a>
        @elseif(in_array(session('role'), ['IT', 'Keuangan']))
            <a href="{{ url('/task') }}"><i class="bi bi-list-task me-2"></i> Task</a>
            <a href="{{ url('/kehadiran') }}"><i class="bi bi-calendar-check me-2"></i> Kehadiran</a>
            <a href="{{ url('/payroll') }}"><i class="bi bi-wallet2 me-2"></i> Payroll</a>
            <a href="{{ url('/cuti') }}"><i class="bi bi-calendar-heart me-2"></i> Cuti</a>
        @endif
    </div>

    <!-- Main Content -->
    <div class="main-content d-flex flex-column min-vh-100">
        <div class="flex-grow-1">
            @yield('content')
        </div>

        <!-- Footer Sticky -->
        <footer class="text-center py-3 mt-auto shadow-sm bg-white border-top">
            <small class="text-muted">
                © {{ date('Y') }} HR Management System
            </small>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        // Sidebar Toggle
        const sidebar = document.getElementById('sidebarMenu');
        document.getElementById('sidebarToggle').addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        // Dark Mode
        const themeToggle = document.getElementById('theme-toggle');
        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            themeToggle.innerHTML = document.body.classList.contains('dark-mode') ?
                '<i class="bi bi-sun-fill"></i>' :
                '<i class="bi bi-moon-fill"></i>';
        });
    </script>
</body>

</html>
