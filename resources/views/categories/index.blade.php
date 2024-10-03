<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

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
    <a class="cta" href="{{ route('categories.create') }}">Crear</a>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>slug</th>
                <th>Acciones</th> <!-- Nueva columna para las acciones -->
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->slug }}</td>
                    <td style="display: flex">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-edit">Editar</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay categorías</td> <!-- Cambié el colspan para incluir la nueva columna -->
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="pagination">
        @if ($categories->onFirstPage())
            <span>Anterior</span>
        @else
            <a href="{{ $categories->previousPageUrl() }}">Anterior</a>
        @endif

        @for ($i = 1; $i <= $categories->lastPage(); $i++)
            @if ($i == $categories->currentPage())
                <span>{{ $i }}</span>
            @else
                <a href="{{ $categories->url($i) }}">{{ $i }}</a>
            @endif
        @endfor

        @if ($categories->hasMorePages())
            <a href="{{ $categories->nextPageUrl() }}">Siguiente</a>
        @else
            <span>Siguiente</span>
        @endif
    </div>

    @if (session('created') == 'true')
        <script>
            alert("Categoría creada correctamente");
        </script>
    @endif

    @if (session('deleted') == 'true')
        <script>
            alert("Categoría eliminada correctamente");
        </script>
    @endif

    @if (session('updated') == 'true')
        <script>
            alert("Categoría actualizada correctamente");
        </script>
    @endif

</body>

</html>
