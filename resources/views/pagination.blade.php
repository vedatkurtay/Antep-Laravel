<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laravel Pagination Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<div class="container mt-4">
    <table class="table table-bordered">
        <tr class="table-info">
            <th>Ürün Adı</th>
            <th>Fiyatı</th>
            <th>Ürünü Ekleyen</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{$product->productName}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->user[0]->name}}</td>

            </tr>
        @endforeach
    </table>
</div>

<div class="d-flex justify-content-center">
    {{$products->links()}}
</div>
