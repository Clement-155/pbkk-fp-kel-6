<!DOCTYPE html>
<!-- Basis dasar kode & layout : https://santrikoding.com/tutorial-laravel-10-4-menampilkan-data-dari-database -->
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" pengertian="width=device-width, initial-scale=1.0">
    <title>Tambah data kata baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('PaketSoal.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">

                                <label class="font-weight-bold">bahasa</label>
                                <!-- <input type="text" class="form-control @error('bahasa') is-invalid @enderror" name="bahasa" value="{{ old('bahasa') }}" placeholder=""> -->
                                <select name="bahasa">
                                    @foreach ($bahasa as $Bahasa)
                                        <option value='{{ $Bahasa["id"] }}'>{{ $Bahasa["kata"] }}</option>
                                    @endforeach
                                </select>
                                <!-- error message untuk bahasa -->
                                @error('bahasa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Paket</label>
                                <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" name="nama_paket" value="{{ old('nama_paket') }}" placeholder="">
                            
                                <!-- error message untuk kata -->
                                @error('nama_paket')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Deskripsi Paket</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" placeholder="">{{ old('deskripsi') }}</textarea>
                            
                                <!-- error message untuk pengertian -->
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="m-2 btn btn-md btn-primary">SAVE</button>
                            <button type="reset" class="m-2 btn btn-md btn-warning">RESET</button>
                            <a href="{{ route('PaketSoal.index') }}" class="m-2 btn btn-md btn-secondary">RETURN</a>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>