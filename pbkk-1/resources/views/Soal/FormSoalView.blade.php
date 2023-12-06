<x-app-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <h1 class="m-4">Menambah soal untuk paket "{{ $namaPaket }}"</h1>
                    <div class="card-body">
                        <form action="{{ route('Soal.store', ['id_paket' => $id_paket]) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <input hidden readonly value="{{ $id_paket }}" name="id_paket">

                            <div class="form-group">
                                <label class="font-weight-bold">Urutan Soal</label>
                                <input type="number" class="form-control @error('urutan_soal') is-invalid @enderror" name="urutan_soal" value="{{ old('urutan_soal') }}" placeholder="">

                                <!-- error message untuk kata -->
                                @error('urutan_soal')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">

                                <label class="font-weight-bold">Bahasa</label>
                                <!-- <input type="text" class="form-control @error('bahasa') is-invalid @enderror" name="bahasa" value="{{ old('bahasa') }}" placeholder=""> -->
                                <select class="form-select" name="bahasa">
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
                                <label class="font-weight-bold">Pertanyaan</label>
                                <textarea class="form-control @error('pertanyaan') is-invalid @enderror" name="pertanyaan" rows="5" placeholder="">{{ old('pertanyaan') }}</textarea>


                                <!-- error message untuk kata -->
                                @error('pertanyaan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                                <!-- Tipe soal START -->
                            <div class="form-group">
                                <label class="font-weight-bold">Tipe Soal</label>
                                    <select class="form-select" name="tipe_soal">
                                        <option class="text-black-50" selected disabled value="NULL">Pilih Tipe Soal</option>
                                        <option value='1'>Isian</option>
                                        <option value='2'>Pilihan Ganda (4)</option>
                                        <option value='3'>Beberapa Pilihan (4)</option>
                                    </select>
                                @error('tipe_soal')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>                            
                                <!-- Tipe soal END -->
                            <!-- Jawaban isian START -->
                            <div class="form-group" id="isian" style="display: none;">
                                <label class="font-weight-bold">Jawaban Isian</label>
                                <textarea class="form-control @error('jawaban_isian') is-invalid @enderror" name="jawaban_isian" rows="5" placeholder="">{{ old('jawaban_isian') }}</textarea>


                                <!-- error message untuk kata -->
                                @error('jawaban_isian')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Jawaban isian END -->
                            
                            <!-- Jawaban pilgan START -->
                            <div id="pilgan" style="display: none;">
                                <div class="form-group">
                                    <label class="font-weight-bold">Jawaban A</label>
                                    <input type="text" class="form-control @error('jawaban_A') is-invalid @enderror" name="jawaban_A" value="{{ old('jawaban_A') }}" placeholder="">

                                    <!-- error message untuk pengertian -->
                                    @error('jawaban_A')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Jawaban B</label>
                                    <input type="text" class="form-control @error('jawaban_B') is-invalid @enderror" name="jawaban_B" value="{{ old('jawaban_B') }}" placeholder="">

                                    <!-- error message untuk pengertian -->
                                    @error('jawaban_B')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Jawaban C</label>
                                    <input type="text" class="form-control @error('jawaban_C') is-invalid @enderror" name="jawaban_C" value="{{ old('jawaban_C') }}" placeholder="">

                                    <!-- error message untuk pengertian -->
                                    @error('jawaban_C')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Jawaban D</label>
                                    <input type="text" class="form-control @error('jawaban_D') is-invalid @enderror" name="jawaban_D" value="{{ old('jawaban_D') }}" placeholder="">

                                    <!-- error message untuk pengertian -->
                                    @error('jawaban_D')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Jawaban Benar ([1-4],{[1-4],...}, contoh = "1,4"))</label>
                                    <input type="text" class="form-control @error('jawaban_benar') is-invalid @enderror" name="jawaban_benar" value="{{ old('jawaban_benar') }}" placeholder="">


                                    <!-- error message untuk kata -->
                                    @error('jawaban_benar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Jawaban pilgan END -->
                            <button type="submit" class="m-2 btn btn-md btn-primary">SAVE</button>
                            <button type="reset" class="m-2 btn btn-md btn-warning">RESET</button>
                            <a href="{{ route('PaketSoal.index') }}" class="m-2 btn btn-md btn-secondary">RETURN</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>

    $(document).ready(function ($) {

        $('select[name=tipe_soal]').change(function (){
            if ($(this).val() == '1') {
                $("#pilgan").hide(500);
                $("#isian").show(500);
            }
            else{
                $("#isian").hide(500);
                $("#pilgan").show(500);
            }
        });
    });

</script>
<script>
        //message with toastr
        @if (session() ->  has('success'))

        toastr.success('{{ session('
            success ') }}', 'Entry Added!');

        @elseif (session() -> has('error'))

        toastr.error('{{ session('
            error ') }}', 'ERROR : Failed to add entry!');

        @endif
    </script>