<div>

    @if(!empty($successMessage))
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endif

    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                <p>Step 1</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                <p>Step 2</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}" disabled="disabled">3</a>
                <p>Step 3</p>
            </div>
        </div>
    </div>

    <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 1</h3>
                <div class="row">
                    <div class="col-md-3">
                <div class="form-group">
                    <label >Product Name Arabic</label>
                    <input type="text" wire:model="name_ar" class="form-control" >
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label >Product Name English</label>
                            <input type="text" wire:model="name_en" class="form-control" />
                            @error('amount') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                <div class="form-group">
                    <label >Product quantity:</label>
                    <input type="text" wire:model="quantity" class="form-control" />
                    @error('amount') <span class="error">{{ $message }}</span> @enderror
                </div>
                    </div>
                    <div class="col-md-3">
                <div class="form-group">
                    <label for="description">Product price:</label>
                    <input type="text" wire:model="price" class="form-control" />
                    @error('amount') <span class="error">{{ $message }}</span> @enderror
                </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="sub_cat" class="mr-sm-2">Sub Category</label>
                        <select class="form-control" wire:model="sub_category_id">
                            @foreach($sub_cats as $sub_cat)
                                <option  value="{{$sub_cat->id}}">{{$sub_cat->subcategory_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="image" class="mr-sm-2">Images</label>
                        <div class="box">
                            <input type="file" wire:model="image" class="form-control" name="image[]" accept="image/*" multiple required>
                        </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group">
                        <label >Product Description:</label>
                        <textarea type="text" wire:model="description" class="form-control" ></textarea>
                        @error('description') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    </div>
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit" type="button" >Next</button>
                <button class="btn btn-primary nextBtn btn-lg pull-right" >
                    <a style="text-decoration: none;color: white" href="{{route('product.index')}}">Go To Main Product</a> </button>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 2</h3>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <select class="form-control"  wire:model="filter_id">
                                {{-- <option value="">Choose from</option>
                                wire:keydonw.enter="subfilter({{$filter->id}})"--}}
                                @foreach($filters as $filter)
                                    <option value="{{$filter->id}}" >{{$filter->getTranslation('filter_name',App()->getLocale())}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <select class="form-control" wire:model="subfilter_id">
                                {{-- <option value="">Choose from</option>--}}
                                @foreach($subfilters as $subfilter)
                                    <option value="{{$subfilter->id}}">{{$subfilter->getTranslation('subfilter_name',App()->getLocale())}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">Next</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Back</button>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 3</h3>

                <table class="table">
                    <tr>
                        <td>Product Name Arabic :</td>
                        <td><strong>{{$name_ar}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Name English :</td>
                        <td><strong>{{$name_en}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Quantity:</td>
                        <td><strong>{{$quantity}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Price:</td>
                        <td><strong>{{$price}}</strong></td>
                    </tr>
                    <tr>
                        <td>Sub Category:</td>
                        <td><strong>{{$sub_category_id}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Description:</td>
                        <td><strong>{{$description}}</strong></td>
                    </tr>
                 {{--   <tr>
                        <td>Product Image:</td>
                        <td><strong>{{count($image)}}</strong></td>
                    </tr>--}}
                    <tr>
                        <td>Product Filter:</td>
                        <td><strong>{{$filter_id}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Sub Filter:</td>
                        <td><strong>{{$subfilter_id}}</strong></td>
                    </tr>
                </table>

                <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Finish!</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Back</button>
            </div>
        </div>
    </div>
</div>
