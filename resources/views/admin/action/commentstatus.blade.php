<div class="flex space-x-1 justify-around">
  @if($status == '0')
    <button wire:click="valide({{ $id }})" id="/8*9" class="p-1 text-green-600 hover:bg-green-600 hover:text-white rounded">
      <span class="fas fa-check"></span>
    </button>
    @else
    <button wire:click="delete({{ $id }})" id="" class="p-1 text-red-600 hover:bg-red-600 hover:text-white rounded">
      <span class="fas fa-times"></span>
    </button>
    @endif
</div>