<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Scan BTC Akhir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <h2 class="mb-4 text-center">Upload Scan BTC Akhir</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="location" class="form-label">Lokasi</label>
                        <input type="text" name="location" id="location" class="form-control"
                            placeholder="Contoh: Metro 1" required>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">File Scan (PNG/JPG)</label>
                        <input type="file" name="file" id="file" class="form-control"
                            accept=".png,.jpg,.jpeg" required>
                    </div>

                    <div class="mb-3">
                        <label for="note" class="form-label">Catatan (Opsional)</label>
                        <textarea name="note" id="note" class="form-control" rows="3" placeholder="Keterangan tambahan..."></textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>
