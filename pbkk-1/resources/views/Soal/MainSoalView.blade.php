    <x-app-layout>
        <div class="container mt-5 ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded bg-primary">
                        <div class="card-body">
                            <div class="m-4">
                                <h1 class="text-white">Mengerjakan soal paket "{{ $namaPaket }}"</h1>
                            </div>
                            <!-- START ISI SOAL -->
                            <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                @foreach ($data_soal as $soal)
                                <div class="card border-0 shadow-sm rounded">
                                    <div class="card-body">
                                        <p class="card-title text-break fw-bolder">{{ $loop->iteration . ". " . $soal["soal"] }}</p>
                                        @if ($soal["tipe_soal"] == 1)
                                        <div class="input-group">
                                            <div class="input-group-text w-100">
                                                <span class="input-group-text m-4 w-20">Jawaban</span>
                                                <textarea class="w-60 form-control @error('isian') is-invalid @enderror" name="isian" rows="5" placeholder="">{{ old('isian') }}</textarea>
                                            </div>

                                        </div>
                                        @elseif ($soal["tipe_soal"] == 2)

                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <span class="input-group-text">A</span>
                                                <input class="form-check-input" type="radio" value="{{ $soal["jawaban"] }}">
                                                <p class="m-2" >
                                                    {{ $soal["jawaban"] }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <span class="input-group-text">B</span>
                                                <input class="form-check-input" type="radio" value="{{ $soal["jawaban2"] }}">
                                                <p>
                                                    {{ $soal["jawaban2"] }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <span class="input-group-text">C</span>
                                                <input class="form-check-input" type="radio" value="{{ $soal["jawaban3"] }}">
                                                <p>
                                                    {{ $soal["jawaban3"] }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <span class="input-group-text">D</span>
                                                <input class="form-check-input" type="radio" value="{{ $soal["jawaban4"] }}">
                                                <p>
                                                    {{ $soal["jawaban4"] }}
                                                </p>
                                            </div>
                                        </div>
                                        @elseif ($soal["tipe_soal"] == 3)
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <span class="input-group-text">A</span>
                                                <input class="form-check-input" type="checkbox" value="$soal[" jawaban"]">
                                                <p>
                                                    {{ $soal["jawaban"] }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <span class="input-group-text">B</span>
                                                <input class="form-check-input" type="checkbox" value="{{ $soal["jawaban2"] }}">
                                                <p>
                                                    {{ $soal["jawaban2"] }}
                                                    </label>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <span class="input-group-text">C</span>
                                                <input class="form-check-input" type="checkbox" value="{{ $soal["jawaban3"] }}">
                                                <p>
                                                    {{ $soal["jawaban3"] }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <span class="input-group-text">D</span>
                                                <input class="form-check-input" type="checkbox" value="{{ $soal["jawaban4"] }}">
                                                <p>
                                                    {{ $soal["jawaban4"] }}
                                                </p>
                                            </div>
                                        </div>

                                        @else
                                        <p class="bg-warning text-warning">ERROR PADA TIPE PERTANYAAN!!!</p>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>