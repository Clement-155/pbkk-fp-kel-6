<!DOCTYPE html>
<!-- Basis dasar kode & layout : https://santrikoding.com/tutorial-laravel-10-4-menampilkan-data-dari-database -->
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" description="width=device-width, initial-scale=1.0">
    <title>Add New Character</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('CharData.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Picture</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            
                                <!-- error message untuk Picture -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Full Name</label>
                                <input type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" placeholder="Alpha John Omega">
                            
                                <!-- error message untuk full_name -->
                                @error('full_name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Nickname</label>
                                <input type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" placeholder="John">
                            
                                <!-- error message untuk nickname -->
                                @error('nickname')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Insert Character Description Here">{{ old('description') }}</textarea>
                            
                                <!-- error message untuk description -->
                                @error('description')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Base Protection (Whole Numbers, minimum value 0)</label>
                                <input type="number" step="1" class="form-control @error('base_prot') is-invalid @enderror" name="base_prot" value="{{ old('base_prot') }}" placeholder="0">
                            
                                <!-- error message untuk base_prot -->
                                @error('base_prot')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Protection Multiplier (Decimal, between -99.99 and 99.99)</label>
                                <input type="number" step="0.01" class="form-control @error('prot_multiplier') is-invalid @enderror" name="prot_multiplier" value="{{ old('prot_multiplier') }}" placeholder="0">
                            
                                <!-- error message untuk prot_multiplier -->
                                @error('prot_multiplier')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Base Damage (Whole Numbers, minimum value 1)</label>
                                <input type="number" step="1" class="form-control @error('base_dmg') is-invalid @enderror" name="base_dmg" value="{{ old('base_dmg') }}" placeholder="1">
                            
                                <!-- error message untuk base_dmg -->
                                @error('base_dmg')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Damage Multiplier (Decimal, between 2.50 and 99.99)</label>
                                <input type="number" step="0.01" class="form-control @error('dmg_multiplier') is-invalid @enderror" name="dmg_multiplier" value="{{ old('dmg_multiplier') }}" placeholder="2.50">
                            
                                <!-- error message untuk dmg_multiplier -->
                                @error('dmg_multiplier')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="m-2 btn btn-md btn-primary">SAVE</button>
                            <button type="reset" class="m-2 btn btn-md btn-warning">RESET</button>
                            <a href="{{ route('CharData.index') }}" class="m-2 btn btn-md btn-secondary">RETURN</a>
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