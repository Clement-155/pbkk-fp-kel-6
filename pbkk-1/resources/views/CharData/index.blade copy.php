<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<!-- Basis dasar kode & layout : https://santrikoding.com/tutorial-laravel-10-4-menampilkan-data-dari-database -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap Framework-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <title>RP Character Database</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div style="background: rgb(18, 18, 18)" class="p-5 text-white text-center">
                    <h1>RP Character Database</h1>
                    <p>The answer to "Where did i put my character sheet?!"</p>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="row">
                            <a href="{{ route('KamusBahasa.create') }}" class="col-2 btn btn-md btn-success mb-3">ADD CHARACTER</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-2" scope="col">Photo</th>
                                    <th class="col-1" scope="col">Fullname</th>
                                    <th class="col-1" scope="col">Nickname</th>
                                    <th class="col-2" scope="col">Description</th>
                                    <th class="col-1" scope="col">Base Protection</th>
                                    <th class="col-1" scope="col">Prot-Multiplier</th>
                                    <th class="col-1" scope="col">Base Damage</th>
                                    <th class="col-1" scope="col">Dmg-Multiplier</th>
                                    <!-- NOTE: Unused option buttons
                                    <th class="col-1" scope="col">Options</th>
                                    -->
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($CharData as $char)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/CharData/'.$char->image) }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $char->full_name }}</td>
                                    <td>{{ $char->nickname }}</td>
                                    <td>{{ $char->description }}</td>
                                    <td>{{ $char->base_prot }}</td>
                                    <td>{{ $char->prot_multiplier }}</td>
                                    <td>{{ $char->base_dmg }}</td>
                                    <td>{{ $char->dmg_multiplier }}</td>
                                    <!-- NOTE: Unused option buttons
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Are you sure? You won\'t be able to undo this.');" action="{{ route('CharData.destroy', $char->id) }}" method="POST">
                                            <a href="{{ route('CharData.show', $char->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('CharData.edit', $char->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                    -->
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    No character has been added.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- JQuery needed for Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session() -> has('success'))

        toastr.success('{{ session('
            success ') }}', 'Entry Added!');

        @elseif(session() -> has('error'))

        toastr.error('{{ session('
            error ') }}', 'ERROR : Failed to add entry!');

        @endif
    </script>
</body>

</html>