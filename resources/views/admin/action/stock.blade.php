<div>
    @if ($stock  > 0)
        <span class=" text-green-400">{{$stock}}</span>
    @else
        <span class=" text-red-600 text-base font-bold">{{$stock}}</span>
    @endif
</div>