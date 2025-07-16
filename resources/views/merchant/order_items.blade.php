<x-app-layout>
    @foreach ($orderItems as $orderItem)
        <div class="flex border border-white text-white justify-between mx-[50px] my-[100px] px-[20px] py-[40px] items-center">
            <div class="flex items-center gap-[20px]">
                <div>
                    <img src="{{$orderItem->product->mainImage?->url}}" width="100px"/>
                </div>
                <div>
                    <h2>{{ $orderItem->product->name }}</h2>
                    <h5>{{ $orderItem->product->category->name }}</h5>
                    <p>Qty: {{ $orderItem->quantity }}</p>
                </div>
            </div>
            <div class="flex gap-2">
                <div class="px-4 py-2 {{$orderItem->status == 'pending' ? 'bg-gray-400' : 'bg-green-400'}} text-white rounded-sm">{{ $orderItem->status }}</div>
                <form action="{{route('merchant.order_items.complete', ['orderItem' => $orderItem->id])}}" method="post">
                    @csrf
                    <button type="submit" id="complete-{{$orderItem->id}}" class="bg-green-500 rounded-sm py-2 px-4"> Complete </button>
                </form>
            </div>
        </div>
    @endforeach
</x-app-layout>