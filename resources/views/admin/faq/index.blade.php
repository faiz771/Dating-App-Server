@extends('layouts.app', ['title' => 'Manage Faq', 'cat_name' => 'settings', 'page_name' => 'faq'])
@section('content')

<style>
    
</style>

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 d-flex justify-content-between">
                            <div>
                               <h3>Manage Faq's<s></s></h3>
                            </div>
                            <form method="POST" action="{{url('/faqs_filter_byStatus')}}" id="formformeal" enctype="multipart/form-data" style="display: flex;width: 70%;    margin-right: -30%;">
                                @csrf
                                <div class="input-group w-50">
                            <select class="form-control" name="status">
                                <option value="all"  @if(!empty($status)) {{ $status == 'all'  ? 'selected' : ''}} @endif>All</option>
                                <option value="EIN" @if(!empty($status)) {{ $status == 'EIN'  ? 'selected' : ''}} @endif>EIN</option>
                                <option value="TM" @if(!empty($status)) {{ $status == 'TM'  ? 'selected' : ''}} @endif>Trade Mark</option>
                                <option value="LLC" @if(!empty($status)) {{ $status == 'LLC'  ? 'selected' : ''}} @endif>LLC</option>
                            </select>
                            <button type="submit" class="btn btn-dark input-group-addon" style="border-radius: inherit;">Filter</button>
                           </div>
                        </form>

                            <a href="{{ route('faq.create') }}" class="btn btn-success float-right"> Add Faq's </a>
                        </div>
                    </div>
                </div>


    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

            
            {{-- Faqs Accordion --}}
            @if(!empty($faqs))
            @foreach($faqs as $key => $faq)
              @if(!empty($faq))
              <div class="info-icon"><br></div>
<div id="withoutSpacing" class="no-outer-spacing cards" style="color: #fff;font-weight: 900;">

    <div class="card no-outer-spacing btn btn-success" style="color: #fff;">
        <div class="card-header" id="headingOne">
            <section class="mb-0 mt-0">
                <div role="menu" class="d-flex justify-content-between" data-toggle="collapse" data-target="#withoutSpacingAccordionOne{{$key}}" aria-expanded="true" aria-controls="withoutSpacingAccordionOne">
                    <div>Category : {{$faq->type}}</div> <div>{{$faq->question}}</div> <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                </div>
            </section>
        </div>

        <div id="withoutSpacingAccordionOne{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#withoutSpacing" style="background: rgb(255, 255, 255); font-weight: 200;">
            <div class="card-body">
                <div class="row">
                <div class="col-md-11">
                <p class="">{{$faq->answer}}</p> 
            </div>
            <div class="col-md-1" align="right">

                <div class="dropdown d-inline-block">
                    <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </a>

                    <div class="dropdown-menu left" aria-labelledby="pendingTask" style="will-change: transform; position: absolute; transform: translate3d(105px, 0, 0px); top: 0px; left: 0px;">
                        
                        <a href="{{ route('faq.edit',$faq->id) }}" class="text-success dropdown-item" title="Edit"><i data-feather="edit" class="text-success"></i> Edit</a>
                        <a href="javascript:void(0)" class="text-danger faq_delete dropdown-item" data-id="{{ $faq->id }}" data-action="{{ url('/delete-faqs/' . $faq->id) }}" title="Delete"><i data-feather="trash" class="text-danger"></i> Delete</a>

                    </div>
                </div>

                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
        @endif
    @endforeach
@endif

{{-- Faqs Accordion End--}}

            {{-- <div class="widget-content widget-content-area br-6">
                <table id="alter_pagination" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                     @if(!empty($faqs))
                        @foreach ($faqs as $faq)
                          @if(!empty($faq))
                            <tr>
                                <td> {{ $n++ }} </td>                             
                               
                                <td> {{ $faq->question }} </td>                             
                                <td> {{ $faq->answer }} </td>                             
                                <td align="center">
                                    <a href="{{ route('faq.edit',$faq->id) }}" class="text-success" title="Edit"><i
                                        data-feather="edit"></i></a>
                                        
                                    <a href="javascript:void(0)" class="text-danger faq_delete"
                                    data-id="{{ $faq->id }}" data-action="{{ url('/delete-faqs/' . $faq->id) }}"
                                    title="Delete"><i data-feather="trash"></i></a>
                                </td>                             
                            </tr>
                            @endif
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div> --}}

        </div>
    </div>
</div>
</div>
</div>
@endsection
