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
                        <label for="title" class="form-label">Judul Laporan</label>
                        <input type="text" name="title" id="title" class="form-control"
                            placeholder="Contoh: BTC Akhir Metro 1 - Selasa 28 Oktober" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">File Scan (PNG/JPG)</label>
                        <input type="file" name="image" id="image" class="form-control"
                            accept=".png,.jpg,.jpeg" required>
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
