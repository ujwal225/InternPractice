<html>
<head>
    <title>Edit product</title>
</head>
<body>
<h2>Edit Product </h2>
<div>
    <form action="{{route('product.productUpdate', $productItems->id)}}" method="POST">
        @csrf
        @method('PUT')
        <lable >Title:</lable>
        <input type="text" class="@error('title') is-invalid @enderror" name="title" value="{{$productItems->title}}" placeholder="Enter title">
        @error('title')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
        <br>
        <br>
        <lable>Choose Category:</lable>
        <select name="category_id" class="@error('category') is-invalid @enderror">
            <option value="{{$productItems->category_id}}" selected>{{$productItems->category->title}}</option>
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
        <input type="number" class="@error('price') is-invalid @enderror" name="price" value="{{$productItems->price}}" placeholder="enter price">
        @error('price')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
        <br>
        <br>
        <label>Status:</label>
        @if($productItems->status === 1 )
        <label>
            <input type="radio" class="@error('status') is-invalid @enderror" name="status" value="1" {{ old('status') == '1' ? 'checked' : '' }} checked> Active
        </label>
        <label>
            <input type="radio" class="@error('status') is-invalid @enderror" name="status" value="0" {{ old('status') == '0' ? 'checked' : '' }}> Inactive
        </label>
        @elseif($productItems->status === 0 )
            <label>
                <input type="radio" class="@error('status') is-invalid @enderror" name="status" value="1" {{ old('status') == '1' ? 'checked' : '' }}> Active
            </label>
            <label>
                <input type="radio" class="@error('status') is-invalid @enderror" name="status" value="0" {{ old('status') == '0' ? 'checked' : '' }} checked> Inactive
            </label>
        @endif
        @error('status')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
        <br>
        <br>
        <lable>Quantity:</lable>
        <input type="number" class="@error('quantity') is-invalid @enderror" name="quantity" value="{{$productItems->quantity}}" placeholder="enter quantity">
        @error('quantity')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
        <br>
        <br>
        <lable>Order:</lable>
        <input type="number" class="@error('order') is-invalid @enderror" name="order" value="{{$productItems->order}}" placeholder="enter order">
        @error('order')
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
