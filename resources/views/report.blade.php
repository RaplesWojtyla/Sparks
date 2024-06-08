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
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Report</th>
                        <th>Reporter</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
                    <tr>
                        <td>{{ $report->userReported->name }}</td>
                        <td>{{ $report->userReported->username }}</td>
                        <td>{{ $report->userReported->email }}</td>
                        <td>{{ $report->userReported->report }}</td>
                        <td>{{ $report->user->username }}</td>
                        <td>
                            @if ($user->status == 'not banned')
                                <form method="post" action="{{ route('user.banned', $report->id_users_reported) }}" class="p-6">
                                    @csrf
                                    @method('patch')

                                    <button class="btn btn-danger">Banned Account</button>
                                </form>
                            @else
                                <form method="post" action="{{ route('user.unbanned', $report->id_users_reported) }}" class="p-6">
                                    @csrf
                                    @method('patch')

                                    <button class="btn btn-danger">Unbanned Account</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
