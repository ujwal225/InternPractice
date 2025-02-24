<html>
<head>
    <title>Category List</title>
</head>
<body>
<div>
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
    <h1>Category List</h1>
</div>
<div>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
        @foreach($categoryItems as $categoryItem)

            <tr>
                <td>{{$categoryItem->id}}</td>
                <td>{{$categoryItem->title}}</td>
                <td>
                    <a href="{{ route('category.categoryEdit', $categoryItem->id) }}" class="btn btn-warning mr-2">Edit</a>
                    <form method="post" action="{{ route('category.categoryDelete', $categoryItem->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </table>
    <br>

    <div>
        <a href="{{ route('category.categoryCreate') }}">
            <button>Add Category</button>
        </a>
    </div>
</div>
</body>
</html>
