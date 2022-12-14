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
                <table id="alter_pagination" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>Uploded</th>
                            <th class="text-center">Document</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                     @if(!empty($documents))
                        @foreach ($documents as $document)
                          @if(!empty($document))
                            <tr>
                                <td> {{ $n++ }} </td>                             
                                <td> {{ $document->desc }} </td>     
                                <td> {{ date('m-d-Y h:i:s a ', strtotime($document->created_at));}} </td>                             
                                <td align="center">
                                    <a href="{{asset('customer_documents/'.$document->file)}}" class="btn btn-dark" download> Download</a> 
                                    <a href="{{route('up_document.edit',$document->id)}}" class="btn btn-secondary"> <i class="fa fa-eye"></i>  &nbsp;view</a> 
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

@endsection
