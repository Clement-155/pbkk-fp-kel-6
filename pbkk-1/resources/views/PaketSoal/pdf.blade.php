<!DOCTYPE html>
<html>
<head>
    <title>Paket Soal</title>
    <style>
        /* Add styling for the PDF layout here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .question {
            margin-bottom: 20px;
        }
        .question p {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Soal</h1>

    @foreach($soal as $index => $soal)
        <Siv clasS="soal">
            <p>Nomor {{ $index + 1 }}:</p>
            <p>{{ $question->text }}</p>
            <!-- Include other question details or formatting as needed -->
        </div>
    @endforeach
</body>
</html>