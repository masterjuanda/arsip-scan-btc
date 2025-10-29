<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Scan BTC Akhir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>📋 Daftar Scan BTC Akhir</h2>
            <a href="{{ route('reports.create') }}" class="btn btn-success">+ Upload Baru</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            @forelse ($reports as $report)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('storage/' . $report->image_path) }}" class="card-img-top"
                            alt="{{ $report->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $report->title }}</h5>
                            <p class="card-text">
                                <small class="text-muted">Uploaded:
                                    {{ $report->created_at->format('d M Y, H:i') }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Belum ada laporan yang di-upload.</p>
            @endforelse
        </div>
    </div>

</body>

</html>
