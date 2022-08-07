@extends('customer.master')
@section('content')

    <section class="advt-post bg-gray py-5">
        <div class="container">
            @if(!auth()->guard('customer')->user())
            <span class="form-control" style="background-color: red;text-align: center;font-weight: bold"> you should loing before you add any ads </span>
            @elseif(auth()->guard('customer')->user())
            <form action="{{route('listing_post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Post Your ad start -->
                <fieldset class="border border-gary px-3 px-md-4 py-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Post Your ad</h3>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Title Of Ad:</h6>
                            <input type="text" name="title" class="form-control bg-white" placeholder="Ad title " required>
                            <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                            <textarea name="description" id="" class="form-control bg-white" rows="7"
                                      placeholder="Write details about your product" required></textarea>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Select Ad Category:</h6>

                            <select  class="form-control w-100 bg-white" id="inputGroupSelect" required name="category_id">
                                <option>Select category</option>
                                @foreach($categorys as $cat)
                                    <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                @endforeach
                            </select>

                            <h6 class="font-weight-bold pt-4 pb-1">Select Sub Category</h6>
                            <select  class="form-control w-100 bg-white" id="inputGroupSelect" required name="subcategory_id">
                                <option>Select sub category</option>
                                @foreach($subcategories as $sub)
                                    <option value="{{$sub->id}}">{{$sub->subcategory_name}}</option>
                                @endforeach
                            </select>
                            <div class="price">
                                <h6 class="font-weight-bold pt-4 pb-1">Item Price:</h6>
                                <div class="row px-3">
                                    <div class="col-lg-4 rounded my-2 px-0">
                                        <input type="number" name="price" class="form-control bg-white" required placeholder="Price" id="price">
                                    </div>
                                    <div class="col-lg-4 ml-lg-4 my-2 pt-2 pb-1 rounded bg-white ">
                                        <input type="radio" name="itemName" value="Negotiable" id="Negotiable">
                                        <label for="Negotiable" class="py-2">Negotiable</label>
                                    </div>
                                </div>
                            </div>
                           {{-- <label for="image" class="mr-sm-2">Images</label>
                            <div class="box">
                                <input type="file" class="form-control" name="image[]" accept="image/*" multiple required>
                            </div>--}}
                            <div class="choose-file text-center my-4 py-4 rounded bg-white">
                                <label for="file-upload">
                                    <span class="d-block font-weight-bold text-dark">Drop files anywhere to upload</span>
                                    <span class="d-block">or</span>
                                    <span class="d-block btn bg-primary text-white my-3 select-files">Select files</span>
                                    <input type="file" class="form-control-file d-none" id="file-upload" name="image[]" accept="image/*" multiple required>
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Post Your ad end -->

                <!-- seller-information start -->
              {{--  @if(!auth()->guard('customer')->user())

                <fieldset class="border px-3 px-md-4 py-4 my-5 seller-information bg-gray">
                    <span class="form-control" style="background-color: red;text-align: center;font-weight: bold"> you should loing before you add any ads </span>
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Seller Information</h3>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Contact Name:</h6>
                            <input type="text" disabled placeholder="Contact name" class="form-control bg-white" required>
                            <h6 class="font-weight-bold pt-4 pb-1">Contact Number:</h6>
                            <input type="text" disabled placeholder="Contact Number" class="form-control bg-white" required>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Contact Name:</h6>
                            <input type="email"disabled  placeholder="name@yourmail.com" class="form-control bg-white" required>
                            <h6 class="font-weight-bold pt-4 pb-1">Contact Name:</h6>
                            <input type="text" disabled placeholder="Your address" class="form-control bg-white" required>
                        </div>
                    </div>
                </fieldset>
            @else

                @endif--}}
                <!-- seller-information end-->

                <!-- ad-feature start -->
               {{-- <fieldset class="border bg-white px-3 px-md-4 py-4 my-5 ad-feature bg-gray">
                    <div class="row">
                        <div class="col-lg-12">

                            <h3 class="pb-3">Make Your Ad Featured
                                <span class="float-right font-weight-normal text-success" data-toggle="tooltip" data-placement="top" title="Autem, architecto quisquam distinctio totam aut voluptatibus placeat ut nobis molestias rerum!">What is featured ad ?</span>
                            </h3>

                        </div>
                        <div class="col-lg-6 my-3">
                            <span class="mb-3 d-block">Premium Ad Options:</span>
                            <ul>
                                <li>
                                    <input type="radio" id="regular-ad" name="adfeature">
                                    <label for="regular-ad" class="font-weight-bold text-dark py-1">Regular Ad</label>
                                    <span>$00.00</span>
                                </li>
                                <li>
                                    <input type="radio" id="Featured-Ads" name="adfeature">
                                    <label for="Featured-Ads" class="font-weight-bold text-dark py-1">Top Featured
                                        Ads</label>
                                    <span>$59.00</span>
                                </li>
                                <li>
                                    <input type="radio" id="urgent-Ads" name="adfeature">
                                    <label for="urgent-Ads" class="font-weight-bold text-dark py-1">Urgent Ads</label>
                                    <span>$79.00</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 my-3">
                            <span class="mb-3 d-block">Please select the preferred payment method:</span>
                            <ul>
                                <li>
                                    <input type="radio" id="bank-transfer" name="adfeature">
                                    <label for="bank-transfer" class="font-weight-bold text-dark py-1">Direct Bank
                                        Transfer</label>
                                </li>
                                <li>
                                    <input type="radio" id="Cheque-Payment" name="adfeature">
                                    <label for="Cheque-Payment" class="font-weight-bold text-dark py-1">Cheque
                                        Payment</label>
                                </li>
                                <li>
                                    <input type="radio" id="Credit-Card" name="adfeature">
                                    <label for="Credit-Card" class="font-weight-bold text-dark py-1">Credit Card</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </fieldset>--}}
                <!-- ad-feature start -->

                <!-- submit button -->
              {{--  <div class="checkbox d-inline-flex">
                    <input type="checkbox" id="terms-&-condition" class="mt-1">
                    <label for="terms-&-condition" class="ml-2">By click you must agree with our
                        <span> <a class="text-success" href="terms-condition.html">Terms & Condition and Posting
              Rules.</a></span>
                    </label>
                </div>--}}
                <button type="submit" class="btn btn-primary d-block mt-2">Post Your Ad</button>
            </form>
                @endif
        </div>
    </section>
@endsection
@section('js')
    <script>


        /*   $(document).ready(function (){
               $('select[name="category_id"]').on('change',function (){
                  var cat_id = $(this).val();
                  console.log(cat_id);
                  if(cat_id){
                      $.ajax({
                          url: "{{--{{URL::to('get_sub_id')}}--}}/"+cat_id,
                       type:"Get",
                       dataType:"json",
                       success:function (data){
                           $('select[name="subcategory_id"]').empty();
                           $.each(data,function (key,value){
                               $('select[name="subcategory_id"]').append('<option value="'+key + '">'+value+'</option>')
                           });
                       },
                   });
               }else{
                   console.log('ajax not work');
               }
            });
        });*/


      /*  $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{--{{ URL::to('Get_classrooms') }}--}}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Classroom_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });*/
    </script>
@endsection
