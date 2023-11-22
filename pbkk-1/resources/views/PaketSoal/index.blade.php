<x-app-layout>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div style="background: rgb(18, 18, 18)" class="p-5 text-white text-center">
                    <h1 class="h1">Quiz Bahasa Daerah</h1>
                    
                    <p>Uji pemahaman anda dalam bahasa daerah!!</p>
                    <!-- Login Message -->
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="row">
                            <a href="{{ route('PaketSoal.create') }}" class="col-2 btn btn-md btn-success mb-3">Tambah Kata Baru</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-2" scope="col">Last Editor</th>
                                    <th class="col-2" scope="col">Bahasa</th>
                                    <th class="col-2" scope="col">Nama</th>
                                    <th class="col-3" scope="col">Deskripsi</th>
                                    <th class="col-3" scope="col">Jumlah Soal</th>

                                    <!-- NOTE: Unused option buttons
                                    <th class="col-1" scope="col">Options</th>
                                    -->
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($PaketSoal as $paket)
                                <tr>
                                    <td>{{ $paket->last_editor }}</td>
                                    <td>{{ $nama_bahasas[array_search($paket->bahasas_id, $id_bahasas)] }}</td>
                                    <td>{{ $paket->nama_paket }}</td>
                                    <td>{{ $paket->deskripsi }}</td>
                                    <td>{{ $paket->jumlah_soal }}</td>

                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Kamus masih kosong!
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        //message with toastr
        @if(session() ->  has('success'))

        toastr.success('{{ session('
            success ') }}', 'Entry Added!');

        @elseif(session() -> has('error'))

        toastr.error('{{ session('
            error ') }}', 'ERROR : Failed to add entry!');

        @endif
    </script>
</x-app-layout>