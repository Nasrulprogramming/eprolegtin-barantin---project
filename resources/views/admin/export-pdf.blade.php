<!DOCTYPE html>
<html>

<head>
    <title>Export PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 6px;
        }
    </style>
</head>

<body>
    <h2>Data Submissions</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Judul</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($submissions as $s)
            <tr>
                <td>{{ $s->id }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->email }}</td>
                <td>{{ $s->judul }}</td>
                <td>{{ $s->created_at->format('d-m-Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>