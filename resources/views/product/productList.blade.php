<html>
<head>
    <title>Product List</title>
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
    <h1>Product List</h1>
</div>
<div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Price</th>
            <th>Status</th>
            <th>Quantity</th>
            <th>Order</th>
            <th>Actions</th>
        </tr>
        @foreach($productItems as $productItem)
        <tr>
            <td>{{$productItem->id}}</td>
            <td>{{$productItem->title}}</td>
            <td>{{$productItem->category->title}}</td>
            <td>{{$productItem->price}}</td>
            <td>{{$productItem->status == 1 ? 'Active': 'Inactive'}}</td>
            <td>{{$productItem->quantity}}</td>
            <td>{{$productItem->order}}</td>
            <td>
                <a href="{{ route('product.productEdit', $productItem->id) }}" class="btn btn-warning mr-2">Edit</a>
                <form method="post" action="{{ route('product.productDelete', $productItem->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>

        </tr>
        @endforeach
    </table>
    <br>
    <br>
    <div>
        <a href="{{route('product.productCreate')}}" >
            <button>Add Product</button>
        </a>
    </div>
</div>
</body>
</html>
