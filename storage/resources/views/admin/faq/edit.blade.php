@extends('layouts.app', ['cat_name' => 'settings', 'page_name' => 'faq'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-
          layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4>Update Faq's </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ route('faq.update',$faq->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    
                        <div class="form-row">
                           
                            <div class="form-group col-md-6">
                                <label for="purchase">Category</label>
                                <select name="type" class="form-control selectpicker">
                                    <option value="LLC" @if('LLC' == $faq->type) selected @endif>LLC</option>
                                    <option value="EIN" @if('EIN' == $faq->type) selected @endif>EIN</option>
                                    <option value="TM" @if('TM' == $faq->type) selected @endif>Trade Mark</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="purchase">Question</label>
                                <input type="text" name="question"class="form-control"  id="question"
                                    placeholder="Write Faq Question.." value="{{ $faq->question }}" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="expense">Answer</label>
                                <textarea class="form-control" name="answer" rows="8" required>{{ $faq->answer }}</textarea>
                            </div>
                    </div>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
