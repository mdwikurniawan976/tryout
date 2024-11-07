<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Data - Jawara BOOKSTORE</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card border shadow-sm rounded">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('storage/cover/' . $book->cover) }}" alt="">
                            <hr>
                        </div>
                        <h3 class="font-weight-bold">{{ $book->judul }}</h3>
                        <p class="tmt-3">
                            {{ $book->sinopsis }}
                        </p>
                        <a href="{{ route('books.index') }}" class="btn btn-warning">Kembali</a>
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
