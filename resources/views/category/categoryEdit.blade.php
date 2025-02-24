<html>
<head>
    <title>Edit Category</title>
</head>
<body>
<h2>Edit Category </h2>
<div>
    <form action="{{ route('category.categoryUpdate', $categoryItems->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Title:</label>
        <input type="text" name="title" class="@error('title') is-invalid @enderror" value="{{ $categoryItems->title }}" placeholder="Enter title">
        @error('title')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
        <br>
        <br>
        <input type="submit" name="submit" value="Update">
    </form>


</div>
</body>
</html>

