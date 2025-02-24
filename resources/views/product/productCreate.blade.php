<html>
<head>
    <title>Create product</title>
</head>
<body>
<h2>Product Form</h2>
<div>
    <form action="{{route('product.productStore')}}" method="POST">
        @csrf
    <lable >Title:</lable>
    <input type="text"  name="title" class="@error('title') is-invalid @enderror" placeholder="Enter title" >
        @error('title')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    <br>
        <br>

    <lable>Choose Category:</lable>
    <select name="category_id" class="@error('category') is-invalid @enderror">
        <option value="">select category</option>
       @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
             @endforeach
    </select>
        @error('category')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    <br>
        <br>
    <lable>Price:</lable>
    <input type="number" name="price" class="@error('price') is-invalid @enderror" placeholder="enter price">
        @error('price')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    <br>
        <br>
        <label>Status:</label>
        <label>
            <input type="radio" class="@error('status') is-invalid @enderror" name="status" value="1" {{ old('status') == '1' ? 'checked' : '' }}> Active
        </label>
        <label>
            <input type="radio" class="@error('status') is-invalid @enderror" name="status" value="0" {{ old('status') == '0' ? 'checked' : '' }}> Inactive
        </label>
        @error('status')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    <br>
        <br>
    <lable>Quantity:</lable>
    <input type="number" class="@error('quantity') is-invalid @enderror" name="quantity" placeholder="enter quantity">
        @error('quantity')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    <br>
        <br>
    <lable>Order:</lable>
    <input type="number" name="order" class="@error('order') is-invalid @enderror" placeholder="enter order">
        @error('order')
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
