@extends('layouts.app', ['title' => 'Document', 'cat_name' => 'document', 'page_name' => 'document'])

@section('content')

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3>Document</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
               
                @if($document->file != '')

                @php
                       $name = explode('.',$document->file);
                       $filetype = $name[1];                  
                    @endphp

                @if($filetype != 'pdf' && $filetype != 'jpeg' && $filetype != 'png' && $filetype != 'jpg')
                        <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{asset('customer_documents/'.$document->file)}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
                @else 
                        <iframe src="{{asset('customer_documents/'.$document->file)}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>    
                @endif 

                @else
                <p align="center">There have no any booklet yet!</p>   
                @endif

                <div class="form-group mt-3" align="right">
                        <a href="{{ URL::previous() }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection
