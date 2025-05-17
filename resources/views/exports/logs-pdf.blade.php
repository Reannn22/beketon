<!DOCTYPE html>
<html>
<head>
    <title>Activity Logs</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { margin-bottom: 20px; }
        .header h2 { margin: 0; color: #333; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Activity Logs</h2>
        <p>Generated on: {{ now()->format('d/m/Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>User</th>
                <th>Barang</th>
                <th>Aksi</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $index => $log)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $log->user->name }}</td>
                    <td>{{ $log->item->name }}</td>
                    <td>{{ ucfirst($log->action) }}</td>
                    <td>{{ $log->amount }}</td>
                    <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
