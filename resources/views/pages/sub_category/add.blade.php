<!-- Deleted inFormation Student -->
<div class="modal fade" id="Add_Sub_Category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">Add Sub Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('sub_category.store')}}" method="POST">
                    @csrf
                    <div class="col">
                    <label  >Arabic Sub Category Name<input class="form-control" type="text" name="sub_category_name_ar" required></label>
                    <label  >English Sub Category Name<input class="form-control" type="text" name="sub_category_name_en" required></label>
                    <label  >Category
                        <select name="category_name" required>
                                @foreach($categorys as $sub)
                                    <option value="{{$sub->id}}">{{$sub->getTranslation('category_name',App()->getLocale())}}</option>
                            @endforeach
                        </select></label>
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
