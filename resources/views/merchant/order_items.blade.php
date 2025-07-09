<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body>
    <h1 class="font-bold text-2xl"> Order Items Table </h1>



    @foreach ($orderItems as $orderItem)
        <div style="display: flex; border:1px solid black; justify-content:space-between; margin: 50px 100px; padding: 20px 40px; align-items:center">
            <div style="display: flex; align-items:center; gap: 20px">
                <div>
                    <img src="{{$orderItem->product->mainImage?->url}}" width="100px"/>
                </div>
                <div>
                    <h2>{{ $orderItem->product->name }}</h2>
                    <h5>{{ $orderItem->product->category->name }}</h5>
                    <p>Qty: {{ $orderItem->quantity }}</p>
                </div>
            </div>
            <div class="px-4 py-2 bg-gray-400 text-white rounded-sm">{{ $orderItem->status }}</div>
            <div>
                <i class="bi bi-arrow-down-short" style="font-size: 2rem;"></i>
            </div>
        </div>
    @endforeach
</body>
</html>