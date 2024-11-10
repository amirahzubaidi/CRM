<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Customer</title>
    <style>
        /* Mengatur gaya untuk seluruh halaman */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }

        /* Mengatur gaya judul */
        h1 {
            text-align: center;
            color: #333;
        }

        /* Mengatur gaya deskripsi */
        p {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
        }

        /* Gaya untuk link "Tambah data" */
        a.tambah-data {
            display: inline-block;
            margin-bottom: 15px;
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        a.tambah-data:hover {
            color: #2980b9;
        }

        /* Mengatur gaya tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        /* Gaya untuk header tabel */
        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }

        /* Gaya untuk sel-sel tabel */
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        /* Warna latar sel secara bergantian */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Hover efek pada baris */
        tr:hover {
            background-color: #f1f1f1;
        }

        /* Mengatur gaya link aksi Edit dan Hapus */
        td a {
            color: #3498db;
            text-decoration: none;
            font-size: 14px;
            margin-right: 10px;
            transition: color 0.3s;
        }

        td a:hover {
            color: #2980b9;
        }

        /* Gaya untuk tombol Edit dan Hapus agar lebih terlihat seperti tombol */
        td a.edit {
            background-color: #5cb85c;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
        }

        td a.delete {
            background-color: #d9534f;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
        }

        /* Hover efek pada tombol Edit dan Hapus */
        td a.edit:hover {
            background-color: #4cae4c;
        }

        td a.delete:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Customer</h1>
    <p class="mb-4"><a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-4"></h6>

            {{-- new --}}

            <a href="/damatambah" class="btn-sm btn-primary text-decoration-none">Tambah data</a>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire(
                            'Sukses',
                            '{{ Session::get('success') }}',
                            'success'
                        );
                    });
                </script>
            @endif


        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Perusahaan</th>
                            <th>Email</th>
                            <th>Telp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Perusahaan</th>
                            <th>Email</th>
                            <th>Telp</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                   <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->posisi }}</td>
                                <td>{{ $item->perusahaan }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->telp }}</td>
                                <td><a href="/damaedit/{{ $item->id }}" 
                                    
                                    class="btn-sm btn-warning text-decoration-none">Edit</a> | <form onsubmit="return confirmHapus(event)" action="/damahapus/{{ $item->id }}" method="post" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn-sm btn-danger">Hapus</button>
                                </form></td>
                            </tr>
                        @endforeach
                   </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmHapus(event) {
        event.preventDefault(); // Menghentikan form dari pengiriman langsung

        Swal.fire({
            title: 'Yakin Hapus Data?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                event.target.submit(); // Melanjutkan pengiriman form
            } else {
                swal('Your imaginary file is safe!');
            }
        });
    }
</script>

</body>
</html>