<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data - Jawara BOOKSTORE</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card border shadow-sm rounded">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('books.update', $book->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" class="form-control" name="judul" value="{{ $book->judul }}">
                            </div>
                            <div class="form-group">
                                <label for="">Sinopsis</label>
                                <textarea name="sinopsis" rows="5" class="form-control" placeholder="Masukkan sinopsis">{{ $book->sinopsis }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Cover</label>
                                <input type="file" class="form-control" name="cover">
                            </div>
                            <a href="{{ route('books.index') }}" class="btn btn-warning">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
</body>

</html>
