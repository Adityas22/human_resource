@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Simple Datatable</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Graiden</td>
                            <td>vehicula.aliquet@semconsequat.co.uk</td>
                            <td>076 4820 8838</td>
                            <td>Offenburg</td>
                            <td><span class="badge bg-success">Active</span></td>
                        </tr>
                        <tr>
                            <td>Nathaniel</td>
                            <td>mi.Duis@diam.edu</td>
                            <td>(012165) 76278</td>
                            <td>Grumo Appula</td>
                            <td><span class="badge bg-danger">Inactive</span></td>
                        </tr>
                        <tr>
                            <td>Oleg</td>
                            <td>rhoncus.id@Aliquamauctorvelit.net</td>
                            <td>0500 441046</td>
                            <td>Rossignol</td>
                            <td><span class="badge bg-success">Active</span></td>
                        </tr>
                        <tr>
                            <td>Ferdinand</td>
                            <td>gravida.molestie@tinciduntadipiscing.org</td>
                            <td>(016977) 4107</td>
                            <td>Marlborough</td>
                            <td><span class="badge bg-danger">Inactive</span></td>
                        </tr>
                        <tr>
                            <td>Bruno</td>
                            <td>elit.Etiam.laoreet@luctuslobortisClass.edu</td>
                            <td>07624 869434</td>
                            <td>Rocca d'Arce</td>
                            <td><span class="badge bg-success">Active</span></td>
                        </tr>
                        <tr>
                            <td>Hamilton</td>
                            <td>mauris@diam.org</td>
                            <td>0800 256 8788</td>
                            <td>Sanzeno</td>
                            <td><span class="badge bg-success">Active</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

<!-- jQuery (harus sebelum DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
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
@endsection
