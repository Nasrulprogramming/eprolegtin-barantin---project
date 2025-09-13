<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin - Data Submissions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
        }

        .container {
            width: 95%;
            margin: 30px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #eee;
        }

        a,
        button {
            font-size: 14px;
        }

        .btn-export {
            display: inline-block;
            margin: 10px 0;
            padding: 8px 14px;
            background: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn-export:hover {
            background: #218838;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Data Submissions</h2>
        <a href="{{ route('admin.submissions.export') }}" class="btn-export">Export Excel</a>

        <table>
            <tr>
                <th>ID</th>
                <th>Unit Kerja</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>File</th>
                <th>Download</th>
                <th>Aksi</th>
            </tr>
            @foreach($submissions as $s)
            <tr>
                <td>{{ $s->id }}</td>
                <td>{{ $s->unit_kerja }}</td>
                <td>{{ $s->usulan_judul }}</td>
                <td>{{ $s->created_at->format('d-m-Y H:i') }}</td>
                <td>{{ $s->file_original_name ?? '-' }}</td>
                <td>{{ $s->file_downloads }}</td>
                <td>
                    <a href="{{ route('admin.submissions.show', $s) }}">Lihat</a> |
                    @if($s->file_path)
                    <a href="{{ route('admin.submissions.download', $s) }}">Download</a> |
                    @endif
                    <form action="{{ route('admin.submissions.destroy', $s) }}" method="post" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        {{-- Pagination link --}}
        <div style="margin-top:15px;">
            {{ $submissions->links() }}
        </div>
    </div>
</body>

</html>