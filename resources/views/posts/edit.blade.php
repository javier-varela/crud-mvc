<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border 0.3s;
        }

        input[type="text"]:focus,
        textarea:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }

        textarea {
            resize: vertical;
            height: 150px;
        }

        .error {
            color: red;
            font-size: 0.9em;
            margin-top: -5px;
            margin-bottom: 10px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Editar Post</h1>

    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')

        <label for="title">Título</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}">
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="slug">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $post->slug) }}">
        @error('slug')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="description">Descripción</label>
        <textarea name="description">{{ old('description', $post->description) }}</textarea>
        @error('description')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="content">Contenido</label>
        <textarea name="content">{{ old('content', $post->content) }}</textarea>
        @error('content')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="image_url">URL de la Imagen</label>
        <input type="text" name="image_url" value="{{ old('image_url', $post->image_url) }}">
        @error('image_url')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="published">Publicado</label>
        <select name="published">
            <option value="1" {{ old('published', $post->published) == 1 ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ old('published', $post->published) == 0 ? 'selected' : '' }}>No</option>
        </select>
        @error('published')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="category_id">Categoría</label>
        <select name="category_id">
            <option value="">Seleccione una categoría</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->title }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Actualizar Post</button>
    </form>
</body>

</html>
