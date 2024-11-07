<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data - Jawara BOOKSTORE</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <style>
        .table-bordered, .table-bordered th, .table-bordered td {
            border-color: black !important;
        }
    </style>
</head>
<body>
    <div class="container mt-5" style="font-family: 'Poppins', sans-serif">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center mt-4">
                    <h3>JAWARA BOOKSTORE</h3>
                    <h3>Jl.Tongkol No. 3 Bangil - Kab. Pasuruan</h3>
                    <p class="font-italic">"Toko Buku Pilihan Anda"</p>
                </div>
                <a href="{{ route('books.create') }}" class="btn btn-success mb-3">Tambah POST</a>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Judul</th>
                            <th>Sinopsis</th>
                            <th>Cover</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $key => $b)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $b->judul }}</td>
                                <td>{!! $b->sinopsis !!}</td>
                                <td><img src="{{ asset('storage/cover/' . $b->cover) }}" style="width: 150px" alt=""></td>
                                <td>
                                    <form action="{{ route('books.destroy', $b->id) }}" method="POST"
                                        onsubmit="return confirm('apakah anda yakin akan menghapus data buku {{ $b->judul }}')">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('books.show', $b->id) }}"
                                            class="btn btn-dark form-control">SHOW</a>
                                        <a href="{{ route('books.edit', $b->id) }}"
                                            class="btn btn-primary mt-2 form-control">EDIT</a>
                                        <button type="submit" class="btn btn-danger mt-2 form-control">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Tidak ada data yang tersedia
                            </div>
                        @endforelse
                    </tbody>
                </table>
                {{ $books->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL');
        @endif
    </script>
</body>

</html>
