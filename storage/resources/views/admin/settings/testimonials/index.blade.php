@extends('layouts.app', ['title' => 'Testimonials', 'cat_name' => 'settings', 'page_name' => 'testimonals'])

<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.0/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<style>
.star-light {
    color: #e9ecef;
}
</style>

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">

                            @if(auth()->user()->id == 1)
                            <h3 class="float-left">Manage Testimonials</h3>
                            @else
                            <h3 class="float-left">Testimonials</h3>
                            @endif

                                @if(!empty(SF::getPermission('Create Testimonials')) || auth()->user()->userType == 'customer/user' || auth()->user()->purchase_type != '')
                                    {{-- <a href="{{ url('/add-testimonial') }}" class="btn btn-success float-right">Add Testimonial</a> --}}
                                    @if(empty($testimonialss))
                                        <button type="button" name="add_review" id="add_review"  class="btn btn-success float-right">Add Your Testimonial</button>
                                    @endif
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <table id="alter_pagination" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            @if(auth()->user()->id == 1)
                            <th class="text-center">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                          @if (!empty($testimonials))
                            @foreach ($testimonials as $key => $val)
                                @php
                                    $id = Crypt::encrypt($val->id);
                                @endphp
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> 
                                <div class="">
                                    @if(!empty($val->image))
                                        <p class="imglist">
                                           <a href="{{ asset('testimonials_img/' . $val->image) }}" data-fancybox="group" data-caption="Customer">
                                             <img src="{{ asset('testimonials_img/' . $val->image) }}" class="rounded" style="width: 15%;"/>
                                           </a>
                                         </p>
                                         @else
                                         <p class="imglist">
                                            <a href="{{ asset('assets/img/dumy.jpg') }}" data-fancybox="group" data-caption="Customer">
                                              <img src="{{ asset('assets/img/dumy.jpg') }}" class="rounded-circle" style="width: 15%;"/>
                                            </a>
                                          </p>
                                     @endif
                                        {{ $val->name }} 
                                    </div>
                                    </td>
                                    <td> 
                                        @if($val->rating == 1)
                                        <i class="fa fa-star text-danger mr-1 main_star"></i>
                                        <i class="fa fa-star star-light mr-1 main_star"></i>
                                        <i class="fa fa-star star-light mr-1 main_star"></i>
                                        <i class="fa fa-star star-light mr-1 main_star"></i>
                                        <i class="fa fa-star star-light mr-1 main_star"></i>
                                        @elseif($val->rating == 2)
                                        <i class="fa fa-star text-danger mr-1 main_star"></i>
                                        <i class="fa fa-star text-danger mr-1 main_star"></i>
                                        <i class="fa fa-star star-light mr-1 main_star"></i>
                                        <i class="fa fa-star star-light mr-1 main_star"></i>
                                        <i class="fa fa-star star-light mr-1 main_star"></i>
                                        @elseif($val->rating == 3)
                                        <i class="fa fa-star text-danger mr-1 main_star"></i>
                                        <i class="fa fa-star text-danger mr-1 main_star"></i>
                                        <i class="fa fa-star text-danger mr-1 main_star"></i>
                                        <i class="fa fa-star star-light mr-1 main_star"></i>
                                        <i class="fa fa-star star-light mr-1 main_star"></i>
                                        @elseif($val->rating == 4)
                                        <i class="fa fa-star text-danger mr-1 main_star"></i>
                                        <i class="fa fa-star text-danger mr-1 main_star"></i>
                                        <i class="fa fa-star text-danger mr-1 main_star"></i>
                                        <i class="fa fa-star text-danger mr-1 main_star"></i>
                                        <i class="fa fa-star star-light mr-1 main_star"></i>
                                        @elseif($val->rating == 5)
                                        <i class="fa fa-star text-danger mr-1 main_star"></i>
                                        <i class="fa fa-star text-danger mr-1 main_star"></i>
                                        <i class="fa fa-star text-danger mr-1 main_star"></i>
                                        <i class="fa fa-star text-danger mr-1 main_star"></i>
                                        <i class="fa fa-star text-danger mr-1 main_star"></i>
                                        @elseif($val->rating == 0)
                                        <i class="fa fa-star star-light mr-1 main_star"></i>
                                        <i class="fa fa-star star-light mr-1 main_star"></i>
                                        <i class="fa fa-star star-light mr-1 main_star"></i>
                                        <i class="fa fa-star star-light mr-1 main_star"></i>
                                        <i class="fa fa-star star-light mr-1 main_star"></i>
                                        @endif
                                    
                                    </td>
                                    <td> {{ $val->comment }} </td>
                                       @if(auth()->user()->id == 1)
                                            <td class="text-center">
                                                {{-- @if (auth()->user()->id == 1 || !empty(SF::getPermission('Edit Testimonials')))
                                                    <a href="{{ url('/edit-testimonial/' . $id) }}" class="text-primary"
                                                        data-id="{{ $val->id }}" title="Edit"> <i data-feather="edit"></i>
                                                    </a>
                                                @endif --}}
                                                @if (auth()->user()->id == 1 || !empty(SF::getPermission('Delete Testimonials')))
                                                    <a href="javascript:void(0)" class="text-danger call-delete-modal"
                                                        data-id="{{ $id }}" data-action="{{ url('/delete-testimonial') }}"
                                                        title="Delete"> <i data-feather="trash"></i> </a>
                                                @endif
                                            </td>
                                        @endif
                                </tr>
                            @endforeach
                          @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- Reviews  Modal -->
<div id="review_modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Testimonial </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/save-testimonial') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h4 class="text-center mt-2 mb-4">
                        <i class="fa fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                        <i class="fa fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                        <i class="fa fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                        <i class="fa fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                        <i class="fa fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                    </h4>
            <input type="hidden" name="rating" value="0" id="rat_cal">
                <div class="form-group">
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>Testimonial Image <a href="javascript:void(0)"
                                class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                        <label class="custom-file-container__custom-file">
                            <input type="file" name="image"
                                class="custom-file-container__custom-file__custom-file-input user_img" accept="image/*">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>
                </div>

              <div class="form-group">
                  <label for="exampleInputName1">Comment<span class="text-danger">*</span></label>
                  <textarea name="comment" id="user_review" class="form-control" placeholder="Comment Here"></textarea>
              </div>
              <div class="form-group text-center mt-4">
                  <button type="submit" class="btn primary-btn" id="save_review">Submit</button>
              </div>
            </form>
            </div>
      </div>
    </div>
</div>
<!-- Review Modal -->


@endsection
