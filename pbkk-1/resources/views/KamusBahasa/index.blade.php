<x-app-layout>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div style="background: rgb(18, 18, 18)" class="p-5 text-white text-center">
                    <h1 class="h1">Kamus Bahasa Terbuka</h1>
                    <!-- Login Message -->
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    {{ __("You're logged in!") }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="row">
                            <a href="{{ route('KamusBahasa.create') }}" class="col-2 btn btn-md btn-success mb-3">Tambah Kata Baru</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-2" scope="col">Last Editor</th>
                                    <th class="col-2" scope="col">Bahasa</th>
                                    <th class="col-2" scope="col">Kata</th>
                                    <th class="col-3" scope="col">Pengertian</th>
                                    <th class="col-3" scope="col">Contoh</th>

                                    <!-- NOTE: Unused option buttons
                                    <th class="col-1" scope="col">Options</th>
                                    -->
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($KamusBahasa as $kata)
                                <tr>
                                    <td>{{ $kata->last_editor }}</td>
                                    <td>{{ $nama_bahasas[array_search($kata->bahasas_id, $id_bahasas)] }}</td>
                                    <td>{{ $kata->kata }}</td>
                                    <td>{{ $kata->pengertian }}</td>
                                    <td>{{ $kata->contoh }}</td>

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