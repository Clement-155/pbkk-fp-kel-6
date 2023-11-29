<!-- Basis dasar kode & layout : https://santrikoding.com/tutorial-laravel-10-4-menampilkan-data-dari-database -->
<x-app-layout>

    <div class="container mt-5 mb-5" data-bs-theme="dark">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('PaketSoal.store') }}" method="POST" enctype="multipart/form-data" >
                        
                            @csrf

                            <div class="form-group">

                                <label class="font-weight-bold">bahasa</label>
                                <!-- <input type="text" class="form-control @error('bahasa') is-invalid @enderror" name="bahasa" value="{{ old('bahasa') }}" placeholder=""> -->
                                <select class="form-select" name="bahasa">
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

                            <button type="submit" class="m-2 btn btn-success">SAVE</button>
                            <button type="reset" class="m-2 btn btn-md btn-warning">RESET</button>
                            <a href="{{ route('PaketSoal.create') }}" class="m-2 btn btn-md btn-secondary">RETURN</a>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</x-app-layout>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'Entry Added!');

        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'ERROR : Failed to add entry!');

        @endif

    </script>
