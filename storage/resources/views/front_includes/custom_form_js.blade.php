<script>
    /* Fundraising Grader
     *
     * Something I created for work, had to
     * minify the js
     * because some is personal code I don't * like to share.
     *
     * Generic Copyright, yadda yadd yadda
     *
     * Plug-ins: jQuery Validate, jQuery
     * Easing
     */



    function unserialize(serializedData) {
        let urlParams = new URLSearchParams(serializedData); // get interface / iterator
        let unserializedData = {}; // prepare result object
        for (let [key, value] of urlParams) { // get pair > extract it to key/value
            unserializedData[key] = value;
        }

        return unserializedData;
    }


    function remove_members_row(data) {
        data.closest('.removable-members-row').remove();
    }

    // $(document).on('input', '.acc-pass', function() {
    //     var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    //     if ($(this).val() < 8) {
    //         $('.account-ar-btn').attr('disabled',true);
    //     }

    //     if (!$(this).val().match(/[A-Z]/) || !$(this).val().match(/[a-z]/)) {
    //         $('.account-ar-btn').attr('disabled',true);
    //     }

    //     if ($(this).val().match(/\d/)) {
    //         $('.account-ar-btn').attr('disabled',true);
    //     }

    //     if (!format.test($(this).val())) {
    //         $('.account-ar-btn').attr('disabled',true);
    //     }


    //     if($(this).val() > 8 && ($(this).val().match(/[A-Z]/) || $(this).val().match(/[a-z]/)) && $(this).val().match(/\d/) && format.test($(this).val())){
    //         $('.account-ar-btn').attr('disabled',false);
    //     }
    // });

    // $(document).on('click', '.account-ar-btn', function() {
    //     if ($('.acc-pass').val() < 8) {
    //         toastr.error('Password must be greater than 8 characters');
    //     }

    // });

    $(document).on("change", ".file2222", function() {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function() { // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                uploadFile.closest(".img-box-divvv").find('.white-box-divv').css({
                    "background-image": "url(" + this.result + ")",
                    "background-size": "cover"
                });
            }
        }
    });

    $(document).on('click', '.continue-proccess', function() {
        let modal = $('#resumeModal');
        modal.modal('hide');
    });

    $(document).ready(function() {
        var current_fs, next_fs, previous_fs;
        var left, opacity, scale;
        var animating;
        var counter = 0;

        $('.company_name').on('input', function() {
            $('.after_cmp_des').text('Members of ' + $(this).val() + ' ' + $('.select_designer')
                .children('option:selected').text().trim());
        });

        $('.select_designer').on('change', function() {
            $('.after_cmp_des').text('Members of ' + $('.company_name').val() + ' ' + $(this).children(
                'option:selected').text().trim());
        });
        $('.add-member-row').on('click', function() {
            let append = $(this).parents('.add-member-row-div');
            counter++;
            if(counter<4){
            append.before(`
                    <div class="row removable-members-row">
                        <div class="col-md-6">
                            <label>Member Name</label>
                            <input type="text" name="members[]" class="form-control member">
                        </div>
                        <div class="col-md-4">
                            <label>Ownership %</label>
                            <input type="text" name="ownership[]" id="" class="form-control ownership-cls"
                                value="100%">
                        </div>
                        <div class="col-md-2 d-flex align-items-center">
                            <button type="button" class="btn btn-sm btn-danger remove-members-row" style="margin-top: 25px;" onclick="remove_members_row(this);"> &times;
                            </button>
                        </div>
                    </div>`);
                }   
        });

        $('.main_email').on('blur', function() {
            let email = $(this).val();
            console.log(email);
            $.ajax({
                type: "GET",
                url: "{{ url('/email-verify') }}",
                data: {
                    email: email
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 500) {
                        $(this).css({
                            'color': 'red'
                        });
                        toastr.error(data.error);
                        $('.emailVerifyerror1').css({
                            'color': 'red'
                        });
                        $(this).val('');
                        $('.main-form-btn-bb1').attr('disabled', true);
                    } else if (data.status == 200) {
                        $('.main-form-btn-bb1').attr('disabled', false);
                    }
                }
            });
        });

        // $('.finalNextBtn').on('click', function() {
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ url('/save-account-info') }}",
        //         data: {
        //             '_token': '{{ csrf_token() }}',
        //             'form': unserialize($('.steps').serialize())
        //         },
        //         success: function(data) {
        //             console.log();
        //         }
        //     });
        // });

        $(".next").click(function() {
            let arr = [];
            let arr2 = [];
            let mem = "";
            let htmllll = "";
            let htmllll2 = "";
            $.ajax({
                type: "GET",
                url: "{{ url('/draft-row') }}",
                success: function(data) {
                    setTimeout(() => {
                        $('.member').val(data.name);
                        $('.acc_name').text(data.name);
                        $('.acc_email').text(data.email);
                        $('.acc_phone').text(data.phone);
                        $('.acc_add1').text(data.address);
                        $('.comp_name').text(data.company);
                        $('input[name=stripeEmail]').val(data.email);
                        $('.comp_type').text($('.select_designer').children(
                                'option:selected')
                            .text().trim());
                        $('.comp_state').text(data.f_state);
                        $('div.emailInput').find('input[type=email]').val(data
                            .email);
                        // $('.localBamkEmail').val(data.email);
                        mem = $.parseJSON(data.members);
                        owship = $.parseJSON(data.ownership);

                        mem.forEach(function(index, value) {
                            htmllll += "<label>" + index + "</label></br>";
                        });

                        owship.forEach(function(index, value) {
                            htmllll2 += "<label>" + index + "</label></br>";
                        });

                        $('.dir_name').html(htmllll);
                        $('.dir_own').html(htmllll2);

                    }, 3000);
                }
            });

            $('.member').each(function(index, value){
                arr.push($(value).val());
            });

            $('.ownership-cls').each(function(index, value){
                arr2.push($(value).val());
            });

            let dataaa = {
                name: $('input[name=name]').val(),
                email: $('input[name=email]').val(),
                gender: $('select[name=gender]').val(),
                dob: $('input[name=dob]').val(),
                phone: $('input[name=phone]').val(),
                address: $('input[name=address]').val(),
                address2: $('input[name=address_line2]').val(),
                city: $('input[name=city]').val(),
                state: $('input[name=state]').val(),
                country: $('select[name=country]').val(),
                postal_code: $('input[name=postal_code]').val(),
                // code by maha 
                business_purpose: $('#business_purpose').val(),
                business_address: $('input[name=business_address]').val(),
                d_h_a_business_address: $('input[name=color]:checked').val(),
                sf_provide_u_r_BA: $('input[name=sf_p_business_address]:checked').val(),
                us_citizen: $('input[name=us_citizen]:checked').val(),
                physical_back_account: $("input[name='physical_back_account']:checked").val(),
                paypal_business_account: $('input[name=paypal_business_account]:checked').val(),
                stripe_account_need: $('input[name=stripe_account_need]:checked').val(),
                capitalOne_account_need: $('input[name=capitalOne_account_need]:checked').val(),
                ssn: $('input[name=ssn]').val(),
                itin: $('input[name=itin]').val(),
                put_name_for_ssn_itin_passport: $('input[name=put_name_for_ssn_itin_passport]').val(),
                put_address_for_ssn_itin_passport: $('input[name=put_address_for_ssn_itin_passport]').val(),
                need_stripe_account: $('input[name=need_stripe_account]:checked').val(),
                need_capitalOne_account: $('input[name=need_capitalOne_account]:checked').val(),
                // us_citizen_name_ssn: $('input[name=us_citizen_name_ssn]').val(),
                social_security_number: $('input[name=social_security_number]:checked').val(),
                im_Us_citizen_have_ssn_or_itin: $('input[name=im_Us_citizen_have_ssn_or_itin]:checked').val(),
                us_citizen_name_ssn: $('input[name=us_citizen_name_ssn]').val(),
                us_citizen_name_itin: $('input[name=us_citizen_name_itin]').val(),
                name_ssn_or_itin: $('input[name=name_ssn_or_itin]').val(),
                ein_full_name: $('input[name=ein_full_name]').val(),
                save_info_for_next_time_purchase: $('input[name=save_info_for_next_time_purchase]').val(),
                // code end
                company: $('.company_name').val(),
                designer_id: $('.select_designer').val(),
                members: arr,
                ownership: arr2,
                password: $('.acc-pass').val()
            };

            $.ajax({
                type: "POST",
                url: "{{ url('/save-in-draft') }}",
                data:{
                    '_token': '{{ csrf_token() }}',
                    form: dataaa
                },
                success: function(data){
                    console.log(data);
                }
            });
            
// validations

            // if ($('.main_email').val() == "") {
            //     toastr.error('Email is required');
            //     return;
            // }

            // if ($('.main_name').val() == "") {
            //     toastr.error('Name is required');
            //     return;
            // }

            // if ($('.select_gender').val() == "") {
            //     toastr.error('Gender is required');
            //     return;
            // }

            // if ($('.dob').val() == "") {
            //     toastr.error('Date Of Birth is required');
            //     return;
            // }

            // if ($('#phone').val() == ""){
            //     toastr.error('Phone is required');
            //     return;
            // }

            // if ($('.address').val() == ""){
            //     toastr.error('Mailing Address is required');
            //     return;
            // }

            // if ($('.city').val() == ""){
            //     toastr.error('City is required');
            //     return;
            // }

            // if ($('.country').val() == ""){
            //     toastr.error('Country is required');
            //     return;
            // }
            // if ($('.postal_code').val() == ""){
            //     toastr.error('Post Code is required');
            //     return;
            // }
            
            // if ($('.company_name').val() == ""){
            //     toastr.error('Company Name is required');
            //     return;
            // }
            // if ($('.business_purpose').val() == ""){
            //     toastr.error('Business Purpose is required');
            //     return;
            // }
// validations


            if (animating) return false;
            animating = true;
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            $("#progressbar li")
                .eq($("fieldset").index(next_fs))
                .addClass("active");
            next_fs.show();
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now, mx) {
                    scale = 1 - (1 - now) * 0.2;
                    left = now * 50 + "%";
                    opacity = 1 - now;
                    current_fs.css({
                        transform: "scale(" + scale + ")"
                    });
                    next_fs.css({
                        left: left,
                        opacity: opacity
                    });
                },
                duration: 800,
                complete: function() {
                    current_fs.hide();
                    animating = false;
                },
                easing: "easeInOutExpo",
            });
        });

        $(".submit").click(function() {

            if (animating) return false;
            animating = true;
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            $("#progressbar li")
                .eq($("fieldset").index(next_fs))
                .addClass("active");
            next_fs.show();
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now, mx) {
                    scale = 1 - (1 - now) * 0.2;
                    left = now * 50 + "%";
                    opacity = 1 - now;
                    current_fs.css({
                        transform: "scale(" + scale + ")"
                    });
                    next_fs.css({
                        left: left,
                        opacity: opacity
                    });
                },
                duration: 800,
                complete: function() {
                    current_fs.hide();
                    animating = false;
                },
                easing: "easeInOutExpo",
            });
        });
        
        $(".previous").click(function() {
            if (animating) return false;
            animating = true;
            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();
            $("#progressbar li")
                .eq($("fieldset").index(current_fs))
                .removeClass("active");
            previous_fs.show();
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now, mx) {
                    scale = 0.8 + (1 - now) * 0.2;
                    left = (1 - now) * 50 + "%";
                    opacity = 1 - now;
                    current_fs.css({
                        left: left
                    });
                    previous_fs.css({
                        transform: "scale(" + scale + ")",
                        opacity: opacity,
                    });
                },
                duration: 800,
                complete: function() {
                    current_fs.hide();
                    animating = false;
                },
                easing: "easeInOutExpo",
            });
        });
    });
    jQuery(document).ready(function() {
        jQuery(
            "#edit-submitted-acquisition-amount-1,#edit-submitted-acquisition-amount-2,#edit-submitted-cultivation-amount-1,#edit-submitted-cultivation-amount-2,#edit-submitted-cultivation-amount-3,#edit-submitted-cultivation-amount-4,#edit-submitted-retention-amount-1,#edit-submitted-retention-amount-2,#edit-submitted-constituent-base-total-constituents"
        ).keyup(function() {
            calcTotal();
        });
    });

    function calcTotal() {
        var grade = 0;
        var donorTotal = Number(
            jQuery("#edit-submitted-constituent-base-total-constituents")
            .val()
            .replace(/,/g, "")
        );
        if (donorTotal) {
            donorTotal = parseFloat(donorTotal);
        } else {
            donorTotal = 0;
        }
        grade += getBonusDonorPoints(donorTotal);
        var acqAmount1 = Number(
            jQuery("#edit-submitted-acquisition-amount-1").val().replace(/,/g, "")
        );
        var acqAmount2 = Number(
            jQuery("#edit-submitted-acquisition-amount-2").val().replace(/,/g, "")
        );
        var acqTotal = 0;
        if (acqAmount1) {
            acqAmount1 = parseFloat(acqAmount1);
        } else {
            acqAmount1 = 0;
        }
        if (acqAmount2) {
            acqAmount2 = parseFloat(acqAmount2);
        } else {
            acqAmount2 = 0;
        }
        if (acqAmount1 > 0 && acqAmount2 > 0) {
            acqTotal = (((acqAmount2 - acqAmount1) / acqAmount1) * 100).toFixed(2);
        } else {
            acqTotal = 0;
        }
        jQuery("#edit-submitted-acquisition-percent-change").val(acqTotal + "%");
        grade += getAcquisitionPoints(acqTotal);
        console.log(grade);
        var cultAmount1 = Number(
            jQuery("#edit-submitted-cultivation-amount-1").val().replace(/,/g, "")
        );
        var cultAmount2 = Number(
            jQuery("#edit-submitted-cultivation-amount-2").val().replace(/,/g, "")
        );
        var cultTotal = 0;
        if (cultAmount1) {
            cultAmount1 = parseFloat(cultAmount1);
        } else {
            cultAmount1 = 0;
        }
        if (cultAmount2) {
            cultAmount2 = parseFloat(cultAmount2);
        } else {
            cultAmount2 = 0;
        }
        if (cultAmount1 > 0 && cultAmount2 > 0) {
            cultTotal = (((cultAmount2 - cultAmount1) / cultAmount1) * 100).toFixed(
                2
            );
        } else {
            cultTotal = 0;
        }
        jQuery("#edit-submitted-cultivation-percent-change1").val(cultTotal + "%");
        grade += getAcquisitionPoints(cultTotal);
        var cultAmount3 = Number(
            jQuery("#edit-submitted-cultivation-amount-3").val().replace(/,/g, "")
        );
        var cultAmount4 = Number(
            jQuery("#edit-submitted-cultivation-amount-4").val().replace(/,/g, "")
        );
        if (cultAmount3) {
            cultAmount3 = parseFloat(cultAmount3);
        } else {
            cultAmount3 = 0;
        }
        if (cultAmount4) {
            cultAmount4 = parseFloat(cultAmount4);
        } else {
            cultAmount4 = 0;
        }
        if (cultAmount3 > 0 && cultAmount4 > 0) {
            cultTotal2 = (
                ((cultAmount4 - cultAmount3) / cultAmount3) *
                100
            ).toFixed(2);
        } else {
            cultTotal2 = 0;
        }
        jQuery("#edit-submitted-cultivation-percent-change2").val(cultTotal2 + "%");
        grade += getAcquisitionPoints(cultTotal2);
        var retAmount1 = Number(
            jQuery("#edit-submitted-retention-amount-1").val().replace(/,/g, "")
        );
        var retAmount2 = Number(
            jQuery("#edit-submitted-retention-amount-2").val().replace(/,/g, "")
        );
        var retTotal = 0;
        if (retAmount1) {
            retAmount1 = parseFloat(retAmount1);
        } else {
            retAmount1 = 0;
        }
        if (retAmount2) {
            retAmount2 = parseFloat(retAmount2);
        } else {
            retAmount2 = 0;
        }
        if (retAmount1 > 0 && retAmount2 > 0) {
            retTotal = ((retAmount2 / retAmount1) * 100).toFixed(2);
        } else {
            retTotal = 0;
        }
        jQuery("#edit-submitted-retention-percent-change").val(retTotal + "%");
        grade += getAcquisitionPoints(retTotal);
        jQuery("#edit-submitted-final-grade-grade").val(grade + " / 400");
    }

    function getAcquisitionPoints(val) {
        if (val < 1) {
            return 0;
        } else if (val >= 1 && val < 6) {
            return 50;
        } else if (val >= 6 && val < 11) {
            return 60;
        } else if (val >= 11 && val < 16) {
            return 70;
        } else if (val >= 16 && val < 21) {
            return 75;
        } else if (val >= 21 && val < 26) {
            return 80;
        } else if (val >= 26 && val < 31) {
            return 85;
        } else if (val >= 31 && val < 36) {
            return 90;
        } else if (val >= 36 && val < 41) {
            return 95;
        } else if (val >= 41) {
            return 100;
        }
    }

    function getCultivationGiftPoints(val) {
        if (val < 1) {
            return 0;
        } else if (val >= 1 && val < 4) {
            return 50;
        } else if (val >= 4 && val < 7) {
            return 60;
        } else if (val >= 7 && val < 10) {
            return 70;
        } else if (val >= 10 && val < 13) {
            return 75;
        } else if (val >= 13 && val < 16) {
            return 80;
        } else if (val >= 16 && val < 21) {
            return 85;
        } else if (val >= 21 && val < 26) {
            return 90;
        } else if (val >= 26 && val < 51) {
            return 95;
        } else if (val >= 51) {
            return 100;
        }
    }

    function getCultivationDonationPoints(val) {
        if (val < 1) {
            return 0;
        } else if (val >= 1 && val < 6) {
            return 50;
        } else if (val >= 6 && val < 11) {
            return 60;
        } else if (val >= 11 && val < 16) {
            return 70;
        } else if (val >= 16 && val < 21) {
            return 75;
        } else if (val >= 21 && val < 26) {
            return 80;
        } else if (val >= 26 && val < 31) {
            return 85;
        } else if (val >= 31 && val < 36) {
            return 90;
        } else if (val >= 36 && val < 41) {
            return 95;
        } else if (val >= 41) {
            return 100;
        }
    }

    function getRetentionPoints(val) {
        if (val < 1) {
            return 0;
        } else if (val >= 1 && val < 51) {
            return 50;
        } else if (val >= 51 && val < 56) {
            return 60;
        } else if (val >= 56 && val < 61) {
            return 70;
        } else if (val >= 61 && val < 66) {
            return 75;
        } else if (val >= 66 && val < 71) {
            return 80;
        } else if (val >= 71 && val < 76) {
            return 85;
        } else if (val >= 76 && val < 81) {
            return 90;
        } else if (val >= 81 && val < 91) {
            return 95;
        } else if (val >= 91) {
            return 100;
        }
    }

    function getBonusDonorPoints(val) {
        if (val < 10001) {
            return 0;
        } else if (val >= 10001 && val < 25001) {
            return 10;
        } else if (val >= 25001 && val < 50000) {
            return 15;
        } else if (val >= 50000) {
            return 20;
        }
    }
    var modules = {
        $window: $(window),
        $html: $("html"),
        $body: $("body"),
        $container: $(".container"),
        init: function() {
            $(function() {
                modules.modals.init();
            });
        },
        modals: {
            trigger: $(".explanation"),
            modal: $(".modal"),
            scrollTopPosition: null,
            init: function() {
                var self = this;
                if (self.trigger.length > 0 && self.modal.length > 0) {
                    modules.$body.append('<div class="modal-overlay"></div>');
                    self.triggers();
                }
            },
            triggers: function() {
                var self = this;
                self.trigger.on("click", function(e) {
                    e.preventDefault();
                    var $trigger = $(this);
                    self.openModal($trigger, $trigger.data("modalId"));
                });
                $(".modal-overlay").on("click", function(e) {
                    e.preventDefault();
                    self.closeModal();
                });
                modules.$body.on("keydown", function(e) {
                    if (e.keyCode === 27) {
                        self.closeModal();
                    }
                });
                $(".modal-close").on("click", function(e) {
                    e.preventDefault();
                    self.closeModal();
                });
            },
            openModal: function(_trigger, _modalId) {
                var self = this,
                    scrollTopPosition = modules.$window.scrollTop(),
                    $targetModal = $("#" + _modalId);
                self.scrollTopPosition = scrollTopPosition;
                modules.$html
                    .addClass("modal-show")
                    .attr("data-modal-effect", $targetModal.data("modal-effect"));
                $targetModal.addClass("modal-show");
                modules.$container.scrollTop(scrollTopPosition);
            },
            closeModal: function() {
                var self = this;
                $(".modal-show").removeClass("modal-show");
                modules.$html
                    .removeClass("modal-show")
                    .removeAttr("data-modal-effect");
                modules.$window.scrollTop(self.scrollTopPosition);
            },
        },
    };
    modules.init();
</script>
