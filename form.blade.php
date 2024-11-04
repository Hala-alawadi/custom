<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation Form</title>
    <style>
        form {
            width: 100%;
            max-width: 400px;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .error-message {
            color: red;
            font-size: 0.9em;
            margin-bottom: 10px;
        }

        .success-message {
            color: green;
            font-size: 1em;
            text-align: center;
            margin-top: 20px;
        }

        button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <form action="{{ route('form.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
            <p class="error-message">{{ $message }}</p>
        @enderror

        <label for="file">File:</label>
        <input type="file" name="file" id="file">
        @error('file')
            <p class="error-message">{{ $message }}</p>
        @enderror

        <button type="submit">Submit</button>
    </form>

    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

</body>
</html>