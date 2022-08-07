<!-- Deleted inFormation Student -->
<div class="modal fade" id="Add_Category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('category.store')}}" method="post">
                    @csrf
                    <div class="col">
                    <label  >Arabic Category Name<input class="form-control" type="text" name="category_name_ar" required></label>
                    <label  >English Category Name<input class="form-control" type="text" name="category_name_en" required></label>
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
