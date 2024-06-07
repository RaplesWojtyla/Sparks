<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Page</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="https://kit.fontawesome.com/51c2d06633.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Report</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswa as $mhs)
                    <tr>
                        <td>1</td>
                        <td>username</td>
                        <td>nama</td>
                        <td>email</td>
                        <td>laporan</td>
                        <td>
                            <a href="{{ route('delete', $mhs->id_mahasiswa) }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
