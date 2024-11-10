<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Mengatur gaya untuk seluruh form */
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: Arial, sans-serif;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        /* Mengatur gaya judul */
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        
        /* Gaya untuk label */
        label {
            font-size: 14px;
            color: #333;
            display: block;
            margin-bottom: 8px;
        }
        
        /* Mengatur gaya untuk input text */
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }
        
        /* Mengatur efek fokus pada input */
        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #5b9bd5;
            outline: none;
        }
        
        /* Mengatur gaya untuk tombol submit */
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #5b9bd5;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        /* Efek hover pada tombol */
        button[type="submit"]:hover {
            background-color: #4a8acb;
        }
        
        /* Mengatur gaya untuk link "Kembali" */
        a {
            display: inline-block;
            margin-top: 10px;
            text-align: center;
            color: #5b9bd5;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }
        
        /* Efek hover pada link */
        a:hover {
            color: #4a8acb;
        }
        
    </style>
</head>
<body>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Tambah data</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="forms-sample" method="POST" action="/tambahdama" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Budi"
                            name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="posisi">Posisi</label>
                        <input type="text" class="form-control" id="posisi" placeholder="data analist"
                            name="posisi" required>
                    </div>
                    <div class="form-group">
                        <label for="perusahaan">Perusahaan</label>
                        <input type="text" class="form-control" id="perusahaan" placeholder="toko oren" name="perusahaan"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="budi@example.com" name="email"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="telp">Telp</label>
                        <input type="number" class="form-control" id="telp" placeholder="6282123498907"
                            name="telp" required>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Tambah</button>
                    <a href="/datacustomer" class="btn btn-light">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

















    