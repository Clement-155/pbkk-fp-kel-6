<!-- Basis dasar kode & layout : https://santrikoding.com/tutorial-laravel-10-4-menampilkan-data-dari-database -->

<x-app-layout>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('KamusBahasa.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">

                                <label class="font-weight-bold">bahasa</label>
                                                                        <option class="text-black-50" selected disabled value="NULL">Pilih Tipe Soal</option>

                                <!-- <input type="text" class="form-control @error('bahasa') is-invalid @enderror" name="bahasa" value="{{ old('bahasa') }}" placeholder=""> -->
                                <select name="bahasa">
                                    <option class="text-black-50" selected disabled value="NULL">Pilih Bahasa</option>

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
                                <label class="font-weight-bold">kata</label>
                                <input type="text" class="form-control @error('kata') is-invalid @enderror" name="kata" value="{{ old('kata') }}" placeholder="">
                            
                                <!-- error message untuk kata -->
                                @error('kata')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">pengertian</label>
                                <textarea class="form-control @error('pengertian') is-invalid @enderror" name="pengertian" rows="5" placeholder="">{{ old('pengertian') }}</textarea>
                            
                                <!-- error message untuk pengertian -->
                                @error('pengertian')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">contoh</label>
                                <textarea class="form-control @error('contoh') is-invalid @enderror" name="contoh" rows="5" placeholder="">{{ old('contoh') }}</textarea>
                            
                                <!-- error message untuk contoh -->
                                @error('contoh')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="m-2 btn btn-md btn-primary">SAVE</button>
                            <button type="reset" class="m-2 btn btn-md btn-warning">RESET</button>
                            <a href="{{ route('KamusBahasa.index') }}" class="m-2 btn btn-md btn-secondary">RETURN</a>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
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