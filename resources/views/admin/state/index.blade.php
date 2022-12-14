@extends('layouts.app', ['title' => 'Manage State', 'cat_name' => 'packages', 'page_name' => 'state'])
@section('content')

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3>Manage State</h3>
                            <a href="#" class="btn btn-success float-right" style="margin-top: -40px;" data-toggle="modal" data-target="#exampleModal2">+ Add State</a>
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
                            <th>Name</th>
                            <th>Created</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                     @if(!empty($states))
                        @foreach ($states as $state)
                          @if(!empty($state))
                            <tr>
                                <td> {{ $n++ }} </td>                             
                                <td> {{ $state->name }} </td>     
                                <td> {{date('m-d-Y h:i:s a ', strtotime($state->created_at));}} </td>                             
                                <td align="center">
                                    <a href="javascript:void(0)" class="text-success edit_cat" data-id="{{$state->id}}" title="Edit" data-toggle="modal" data-target="#editcat"><i data-feather="edit"></i></a>
                                    <a href="javascript:void(0)" class="text-danger state_delete" data-id="{{ $state->id }}" data-action="{{ url('/delete-state/' . $state->id) }}" title="Delete"><i data-feather="trash"></i></a>
                                </td>                             
                            </tr>
                            @endif
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add category Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add State</h5>
        </div>
          <form action="{{ route('state.store') }}" autocomplete="off" class="forms-sample" method="post" enctype="multipart/form-data">
                 @csrf
                  <div class="modal-body bg-light">
                        <div class="form-group">
                          <label for="exampleInputName1">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="exampleInputName1" required autocomplete="off" value=""  placeholder="Name">
                        </div>  
                  </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-success text-dark" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
      </div>
    </div>
  </div>
  
  <!--Modal end  -->

     <!-- Category Edit modal  -->
<div class="modal fade" id="editcat" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update State</h5>
        </div>
          <form action="" autocomplete="off" class="forms-sample" method="post" enctype="multipart/form-data">
                 @csrf
                  <div class="modal-body bg-light">
                        <div class="form-group">
                          <label for="exampleInputName1">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="category_name" required autocomplete="off" value=""  placeholder="Name">
                            <input type="hidden" class="form-control" name="category_id" id="category_id" value="">
                        </div>  
                  </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary text-dark" data-dismiss="modal">Cancel</button>
                  <button type="button" id="cat_update" class="btn btn-primary">Update</button>
              </div>
          </form>
      </div>
    </div>
  </div>
  <!-- Category Edit modal end  -->

@endsection
