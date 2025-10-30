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
                    <div class="card h-100 shadow-sm" style="min-height: 300px;">
                        <img src="{{ asset('storage/' . $report->file_path) }}" class="card-img-top"
                            style="height: 200px; object-fit: cover;" alt="Scan">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $report->location }}</h5>
                                <p class="card-text text-muted mb-1">
                                    <small>{{ \Carbon\Carbon::parse($report->date)->translatedFormat('d F Y') }}</small>
                                </p>
                                <p class="card-text small">{{ $report->note ?? '-' }}</p>
                            </div>
                            <div class="mt-3 text-end">
                                <form action="{{ route('reports.destroy', $report->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin mau hapus laporan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <p class="text-center text-muted">Belum ada laporan yang di-upload.</p>
            @endforelse
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
