<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categorias</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            min-width: 300px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            color: #555;
            font-weight: bold;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <h1>Crear Categorías</h1>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf

        <label for="title">Name</label>
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="slug">Slug</label>
        <input type="text" name="slug" value="{{ old('slug') }}">
        @error('slug')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <button type="submit">Crear Categoría</button>
    </form>

</body>

</html>
