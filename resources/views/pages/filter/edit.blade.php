<!-- Deleted inFormation Student -->
<div class="modal fade" id="Edit_Filter{{$filter->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">Update Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('filter.update','test')}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col">
                        <input type="hidden" value="{{$filter->id}}" name="filter_id">
                        <label  >Arabic Name Of Filter
                            <input class="form-control" type="text" name="filter_name_ar" value="{{$filter->getTranslation('filter_name','ar')}}" required>
                        </label>
                        <label  >English Name Of Filter
                            <input class="form-control" type="text" name="filter_name_en" value="{{$filter->getTranslation('filter_name','en')}}" required>
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
