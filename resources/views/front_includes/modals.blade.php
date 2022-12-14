
<div class="modal fade" id="resumeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{-- <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> --}}
            <div class="modal-body">
                <div class="row"
                    style="display: flex; justify-content: center; align-items: center;margin-bottom: 40px; margin-top: 41px;">
                    <div class="col-lg-8"
                        style="padding: 0px; margin: 0px !important; display: flex; justify-content: center;">
                        <img src="{{ asset('assets/img/header_logo3.png') }}"  style="width:50%;" alt="">
                    </div>
                </div>

                <div class="row" style="display: flex; justify-content: center;">
                    <div class="col-lg-8" style="display: flex;justify-content: center;margin: 0px;padding: 0px;">
                        <h3> Welcome back! </h3>
                    </div>
                </div>

                <div class="row" style="display: flex; justify-content: center;">
                    <div class="col-lg-8" style="display: flex; justify-content: center; text-align:center;">
                        <p>Continue where you left off or clear everything and start over?</p>
                    </div>
                </div>

                <div class="styles__ModalButtons-sc-kfcdse-22 jfCVhe" style="display: flex;flex-direction: column;-webkit-box-align: center;align-items: center;max-width: 250px; margin-bottom: 40px;">
                    <button class="Button-sc-1q0i4nm-0 dXAhWu" style='padding: 1em 2em; width: 250px; margin-bottom: 0.25em;background-color: #ee8d22;color: white;border: 1px solid #ee8d22; border-radius: 5px;font-family: Avenir, "Helvetica Neue", Helvetica, Arial, sans-serif;font-weight: 500;font-size: 18px;cursor: pointer;'>Continue</button>
                    <button class="Button-sc-1q0i4nm-0 bhImxi" style='padding: 1em 2em; width: 250px; background-color: transparent; color: #ee8d22; border: 1px solid #ee8d22; border-radius: 5px; font-family: Avenir, "Helvetica Neue", Helvetica, Arial, sans-serif; font-weight: normal; font-size: 18px; cursor: pointer;'>Start Over</button>
                </div>
            </div>
            {{-- <div class="modal-footer" style="display:none ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>
