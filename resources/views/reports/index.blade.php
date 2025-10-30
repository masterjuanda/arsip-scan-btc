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
                        <img src="{{ asset('storage/' . $report->file_path) }}" class="card-img-top"
                            alt="{{ $report->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $report->title }}</h5>
                            <p class="card-text">
                                <small class="text-muted">Uploaded:
                                    {{ $report->created_at->format('d M Y, H:i') }}</small>
                            </p>

                            <!-- Tombol Hapus -->
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $report->id }}">
                                Hapus
                            </button>
                        </div>

                        <!-- Modal Konfirmasi Hapus -->
                        <div class="modal fade" id="deleteModal{{ $report->id }}" tabindex="-1"
                            aria-labelledby="deleteModalLabel{{ $report->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $report->id }}">Konfirmasi
                                            Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah kamu yakin ingin menghapus laporan
                                        <strong>{{ $report->title }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
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
