<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Kursus</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Kursus</h1>

        <!-- Button to Open the Modal to Add a New Kursus -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addKursusModal">
            Tambah Kursus +
        </button>

        <!-- Kursus List -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Durasi (Jam)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($kursuses as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->Judul }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->durasi }}</td>
                    <td>
                        <!-- Edit Button -->
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editKursusModal{{ $item->id }}">
                            Edit
                        </button>

                        <!-- Delete Button -->
                        <form action="{{ route('kursus.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kursus ini?')">Hapus</button>
                        </form>

                        <!-- Materi Button -->
                        <a href="{{ route('materi', ['kursus_id' => $item->id]) }}" class="btn btn-info btn-sm">
                            Materi Kursus
                        </a>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editKursusModal{{ $item->id }}" tabindex="-1" aria-labelledby="editKursusLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editKursusLabel{{ $item->id }}">Edit Kursus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('kursus.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input id="judul" type="text" name="Judul" class="form-control" value="{{ $item->judul }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" required>{{ $item->deskripsi }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="durasi" class="form-label">Durasi (Jam)</label>
                                        <input id="durasi" type="number" name="durasi" class="form-control" value="{{ $item->durasi }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>

        <!-- Add Modal -->
        <div class="modal fade" id="addKursusModal" tabindex="-1" aria-labelledby="addKursusLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addKursusLabel">Tambah Kursus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('kursus.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input id="judul" type="text" name="AddJudul" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea id="deskripsi" name="Adddeskripsi" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="durasi" class="form-label">Durasi (Jam)</label>
                                <input id="durasi" type="number" name="Adddurasi" class="form-control" required>
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
