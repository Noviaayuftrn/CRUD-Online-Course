<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Materi</h1>
        
        
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMateriModal">
            Tambah Materi +
        </button>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Materi List -->
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Link Materi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($materis as $materi)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $materi->Judul }}</td>
                        <td>{{ $materi->deskripsi }}</td>
                        <td><a href="{{ $materi->link_embed }}" target="_blank">Lihat Materi</a></td>
                        <td>
                            <!-- Edit Button -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editMateriModal{{ $materi->id }}">
                                Edit
                            </button>

                            <!-- Delete Button -->
                            <form action="{{ route('materi.destroy', $materi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus materi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editMateriModal{{ $materi->id }}" tabindex="-1" aria-labelledby="editMateriLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editMateriLabel">Edit Materi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('materi.update', $materi->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul</label>
                                            <input type="text" name="Judul" class="form-control" value="{{ $materi->judul }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" rows="3" required>{{ $materi->deskripsi }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="link_embed" class="form-label">Link Embed</label>
                                            <input type="url" name="link_embed" class="form-control" value="{{ $materi->link_embed }}" required>
                                        </div>
                                        <input type="hidden" name="kursus_id" value="{{ $materi->kursus_id }}">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>

        <!-- Tambahkan tombol kembali di sini -->
        <div class="container">
            <a href="{{ route('kursus') }}" class="btn btn-dark mt-3">Kembali ke Halaman Kursus</a>
        </div>

        <!-- Add Modal -->
        <div class="modal fade" id="addMateriModal" tabindex="-1" aria-labelledby="addMateriLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMateriLabel">Tambah Materi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('materi.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="kursus_id" value="{{ $kursus_id }}">
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="Judul" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="link_embed" class="form-label">Link Embed</label>
                                <input type="url" name="link_embed" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
