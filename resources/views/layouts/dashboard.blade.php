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
  {{-- kalender --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> 

  <style>
    /* Tambahan kecil untuk hover tombol agar lebih jelas */
    #theme-toggle:hover {
      background-color: #0d6efd;
      color: white;
      border-color: #0d6efd;
    }

    #logout-link:hover {
      background-color: #bb2d3b;
      color: white;
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="{{ url('/dashboard') }}">HR Management</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          {{-- <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a></li> --}}
          <li class="nav-item"><a class="nav-link" href="{{ url('/task') }}">Task</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/karyawan') }}">Karyawan</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/departemen') }}">Departemen</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/role') }}">Roles</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/kehadiran') }}">Kehadiran</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/payrolls') }}">Payrolls</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/cuti') }}">Cuti</a></li>
        </ul>

        <!-- Dark Mode & Logout Buttons -->
        <button id="theme-toggle" class="btn btn-outline-light btn-sm me-2">
          <i class="bi bi-moon-fill me-1"></i> Dark Mode
        </button>
        <a href="#" id="logout-link" class="btn btn-danger btn-sm">
          <i class="bi bi-box-arrow-right me-1"></i> Logout
        </a>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="container flex-grow-1 mt-5 pt-4">
    <div class="py-5 text-center">
      @yield('content')
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-primary text-white text-center py-3 mt-auto">
    <small>© 2025 HR Management System. All rights reserved.</small>
  </footer>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

<!-- jQuery (harus sebelum DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  {{-- kalender --}}
<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#tenggat_waktu", {
        // enableTime: true,
        dateFormat: "Y-m-d H:i",
        // time_24hr: true,
        minDate: "today",
        locale: {
            firstDayOfWeek: 1
        }
    });
</script>


  <!-- Dark Mode Script -->
  <script>
    const toggleDarkMode = document.getElementById("theme-toggle");

    toggleDarkMode.addEventListener("click", () => {
      document.body.classList.toggle("bg-dark");
      document.body.classList.toggle("text-white");

      if (document.body.classList.contains("bg-dark")) {
        toggleDarkMode.innerHTML = '<i class="bi bi-sun-fill me-1"></i> Light Mode';
        toggleDarkMode.classList.replace("btn-outline-light", "btn-light");
      } else {
        toggleDarkMode.innerHTML = '<i class="bi bi-moon-fill me-1"></i> Dark Mode';
        toggleDarkMode.classList.replace("btn-light", "btn-outline-light");
      }
    });

    $(document).ready(function() {
        $('#dataTable').DataTable({
            "pageLength": 5,
            "lengthMenu": [5, 10, 20, 50],
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "→",
                    "previous": "←"
                },
                "zeroRecords": "Data tidak ditemukan"
            }
        });
    });
  </script>
</body>
</html>
