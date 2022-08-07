<div>
   {{--<input type="text" wire:model="name">
    <br><hr>

    message
    <br><hr>
    <textarea wire:model="message"></textarea>
    <br><hr>
    Martial status
    <br><hr>
    Single <input type="radio" value="single" wire:model="martial_status">
    Married <input type="radio" value="married" wire:model="martial_status">
    <br><hr>
    Color Favourit
    <br><hr>
    Red <input type="checkbox" value="red" wire:model="color">
    Green <input type="checkbox" value="green" wire:model="color">
    Blue <input type="checkbox" value="blue" wire:model="color">
    <br><hr>
    Favorit Fruits <br>
    <select wire:model="fruits">
        <option value="">select from Fruits</option>
        <option value="apple">Apple</option>
        <option value="mango">Mango</option>
        <option value="banana">Banana</option>
    </select>
    <br><hr>
    Name is: {{$name}}
    <br><hr>
    message is : {{$message}}
    <br><hr>
    Martial status is : {{$martial_status}}
    <br><hr>
    Color favo is :
    <ul>
        @foreach($color as $colors)
            <li>{{$colors}}</li>
        @endforeach
    </ul>
    <br><hr>
    fruits favo is : {{$fruits}}--}}

    <input type="text" class="form-control" placeholder="search........"  wire:model="searchTerm">
   {{-- <input type="button" value="click" wire:click="srtsearch">
    {{$cats}}--}}
    {{--<table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('main.Category Name') }}</th>
            <th>{{ trans('main.Processes') }}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($categorys as $category)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <th>{{ $category->category_name }}</th>
                <td>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#Edit_Category{{$category->id}}" >{{trans('main.Edit')}}</button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#Delete_Category{{$category->id}}" >{{trans('main.Delete')}}</button>
                </td>
            </tr>
        @endforeach
    </table>--}}
</div>
