<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user table Page</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="https://kit.fontawesome.com/51c2d06633.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Aksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('profile.edit', $user) }}" class="btn btn-edit">Update</a>
                        </td>
                        <td>
                            @if ($user->status == 'not banned')
                                <form method="post" action="{{ route('user.banned', $user->id) }}" class="p-6">
                                    @csrf
                                    @method('patch')

                                    <button class="btn btn-danger">Banned Account</button>
                                </form>
                            @else
                                <form method="post" action="{{ route('user.unbanned', $user->id) }}" class="p-6">
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
