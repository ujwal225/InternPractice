<html>
<head>
    <title>Create Category</title>
</head>
<body>
<h2>Category Form</h2>
<div>
    <form action="{{route('category.categoryStore')}}" method="POST">
        @csrf
        <lable >Title:</lable>
        <input type="text" class="@error('title') is-invalid @enderror" name="title" placeholder="Enter title">
        @error('title')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
        <br>
        <br>
        <input type="submit" name="submit" value="Create">
    </form>
</div>
</body>
</html>
