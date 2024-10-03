<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        a.cta {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a.cta:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            /* Aumentar el margen inferior */
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
            /* Fila alterna color */
        }

        tr:hover {
            background-color: #e0e0e0;
            /* Efecto hover */
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .pagination a,
        .pagination span {
            margin: 0 5px;
            padding: 5px 10px;
            text-decoration: none;
            border: 1px solid #007bff;
            color: #007bff;
            border-radius: 5px;
        }

        .pagination a:hover {
            background-color: #007bff;
            color: white;
        }

        .pagination span {
            background-color: #e9ecef;
            color: #6c757d;
        }

        .btn {
            margin: 0 5px;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
        }

        .btn-edit {
            background-color: #28a745;
        }

        .btn-edit:hover {
            background-color: #218838;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <a class="cta" href="{{ route('posts.create') }}">Crear Post</a>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>slug</th>
                <th>category</th>
                <th>published</th>
                <th>Acciones</th> <!-- Nueva columna para las acciones -->
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->category->title ?? 'Sin categoría' }}</td> <!-- Mostramos la categoría asociada -->
                    <td>{{ $post->published ? 'Publicado' : 'No publicado' }}</td>
                    <td style="display: flex">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-edit">Editar</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar este post?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay posts</td> <!-- Ajuste del colspan para incluir la nueva columna -->
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="pagination">
        @if ($posts->onFirstPage())
            <span>Anterior</span>
        @else
            <a href="{{ $posts->previousPageUrl() }}">Anterior</a>
        @endif

        @for ($i = 1; $i <= $posts->lastPage(); $i++)
            @if ($i == $posts->currentPage())
                <span>{{ $i }}</span>
            @else
                <a href="{{ $posts->url($i) }}">{{ $i }}</a>
            @endif
        @endfor

        @if ($posts->hasMorePages())
            <a href="{{ $posts->nextPageUrl() }}">Siguiente</a>
        @else
            <span>Siguiente</span>
        @endif
    </div>

    @if (session('created') == 'true')
        <script>
            alert("Post creado correctamente");
        </script>
    @endif

    @if (session('deleted') == 'true')
        <script>
            alert("Post eliminado correctamente");
        </script>
    @endif

    @if (session('updated') == 'true')
        <script>
            alert("Post actualizado correctamente");
        </script>
    @endif

</body>

</html>
