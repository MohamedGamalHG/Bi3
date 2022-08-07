<div style="text-align: center">
    <button wire:click="increment">+</button>
    <h1>{{ $count }}</h1>
</div>
<div>
    {{--<form wire:submit.prevent="searchCategory">
        <input type="text" wire:model.defer="search">
        <button type="submit" >Search item</button>
    </form>--}}

    <input type="search" wire:model="search" placeholder="search by cat">
{{--    <button  wire:click="searchCategory">Click</button>--}}
   {{-- <h1>{{$category}}</h1>--}}

    @if(isset($play))
    <ul>
        @foreach($play as $cats)
            <li>{{ $cats->category_name}}</li>
        @endforeach
    </ul>
    @else
        <h5>it still no data</h5>
    @endif


    {{--@if(isset($category))
        <p>{{$category->category_name}}</p>
    @elseif(isset($error))
        <p>Product not found</p>
    @else
        <p>No data to be shown</p>
    @endif--}}
</div>
