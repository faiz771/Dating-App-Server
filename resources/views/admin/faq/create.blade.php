@extends('layouts.app', ['cat_name' => 'settings', 'page_name' => 'faq'])

@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-
          layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <h4>Add Faq's </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <form action="{{ route('faq.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="form-row">
                           
                            <div class="form-group col-md-6">
                                <label for="purchase">Category</label>
                                <select name="type" class="form-control selectpicker">
                                    <option value="LLC" @if('LLC' == old('type')) selected @endif>LLC</option>
                                    <option value="EIN" @if('EIN' == old('type')) selected @endif>EIN</option>
                                    <option value="TM" @if('TM' == old('type')) selected @endif>Trade Mark</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="purchase">Question</label>
                                <input type="text" name="question"class="form-control"  id="question"
                                    placeholder="Write Faq Question.." value="{{ old('question') }}" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="expense">Answer</label>
                                <textarea class="form-control" name="answer" rows="8" required>{{ old('answer') }}</textarea>
                            </div>
                    </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
