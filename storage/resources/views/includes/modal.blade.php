    <div id="deleteModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form method="GET" class="delete-form">
                    @csrf
                    <div class="modal-body">
                        <div class="visitor-id"></div>
                        <h5>Are You Sure ?</h5>
                    </div>
                    <div class="modal-footer md-button">
                        <button type="submit" class="btn btn-danger"><i class="flaticon-cancel-12"></i>
                            Yes</button>
                        <button type="button" class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                            Discard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="viewModal" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer md-button">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                </div>
            </div>
        </div>
    </div>



    <div id="sendMail" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Send Mail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="{{ url('/send-mail-to-visitor') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <input type="email" name="email" class="form-control text-dark visitor-email" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn btn-success" type="submit">
                            Send
                        </button>
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                            Discard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <div id="waModal" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Send Mail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="{{ url('/send-whatsapp-msg') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <input type="text" name="wa_no" class="form-control text-dark visitor-wa-no" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn btn-success" type="submit">
                            Send
                        </button>
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                            Discard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
