<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Categoría</title>

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

        .invalid-feedback {
            color: red
        }
    </style>
</head>

<body>
    <h1>Editar Categoría</h1>


    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method('PUT')


        <label for="title">Nombre</label>
        <input type="text" name="title" value="{{ old('title', $category->title) }}"
            class="@error('title') is-invalid @enderror">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror


        <label for="slug">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $category->slug) }}"
            class="@error('slug') is-invalid @enderror">
        @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <button type="submit">Actualizar Categoría</button>
    </form>

</body>

</html>
