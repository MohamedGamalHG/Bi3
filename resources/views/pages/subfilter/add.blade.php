<!-- Deleted inFormation Student -->
<div class="modal fade" id="Add_SubFilter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">Add Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('subfilter.store')}}" method="post">
                    @csrf
                    <div class="col-12 ">
                    <label  >Arabic Sub filter Name<input class="form-control" type="text" name="subfilter_name_ar" required></label>
                    <label  >English Sub filter Name<input class="form-control" type="text" name="subfilter_name_en" required></label>
                    </div>
                    <div class="col m-3">
                        <select class="form-control" name="filter_id">
                           {{-- <option value="">Choose from</option>--}}
                            @foreach($filters as $filter)
                            <option value="{{$filter->id}}">{{$filter->getTranslation('filter_name',App()->getLocale())}}</option>
                            @endforeach
                        </select>
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
