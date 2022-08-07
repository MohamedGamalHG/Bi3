<!-- Deleted inFormation Student -->
<div class="modal fade" id="Edit_Category{{$sub_category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('sub_category.update','test')}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col">
                        <input type="hidden" value="{{$sub_category->id}}" name="sub_category_id">
                        <label  >Update Arabic Sub Category
                            <input class="form-control" type="text" name="sub_category_name_ar" value="{{$sub_category->getTranslation('subcategory_name','ar')}}" required>
                        </label>
                        <label  >Update English Sub Category
                            <input class="form-control" type="text" name="sub_category_name_en" value="{{$sub_category->getTranslation('subcategory_name','en')}}" required>
                        </label>
                        <br>
                        <label>Category

                            <select name="category_name" required>
                                {{--{{$sub_category->categories->getTranslation('category_name',App()->getLocale())}}--}}
                                <option value="">Choose One</option>
                                @foreach($categorys as $sub)
                                    <option value="{{$sub->id}}">{{$sub->getTranslation('category_name',App()->getLocale())}}</option>
                                @endforeach
                            </select>
                           </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Close')}}</button>
                        <button  class="btn btn-danger">{{trans('submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
