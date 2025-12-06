<?php $this->load->view('user/common/header'); ?>
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Start:: row-1 -->
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="mb-4">
                    <h5 class="fw-medium mb-0">Profile Settings</h5>
                    <div class="text-muted fs-13 op-8 mb-3">
                        Update your profile settings
                    </div>
                </div>
                <div class="card custom-card">
                    <div class="top-left"></div>
                    <div class="top-right"></div>
                    <div class="bottom-left"></div>
                    <div class="bottom-right"></div>
                    <form method="POST" action="<?php echo site_url('user/save_profile_settings') ?>" id="profilesettingform">
                    <div class="card-body">
                        <div class="row mt-4 justify-content-center">
                            <div class="col-md-3">
                                <div class="nav flex-column nav-pills me-3 tab-style-7" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <h6 class="fw-medium mb-3 text-info  fs-12 pb-1 d-inline-block">
                                        GENERAL
                                    </h6>
                                    <button class="nav-link text-start active" id="main-profile-tab" data-bs-toggle="pill" data-bs-target="#main-profile" type="button" role="tab" aria-controls="main-profile" aria-selected="true"><i class="ri-user-settings-line me-2 align-middle d-inline-block"></i>Profile Info</button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane show active" id="main-profile" role="tabpanel" tabindex="0" aria-labelledby="main-profile-tab">
                                            <div class="mb-4 d-sm-flex align-items-center gap-1 flex-wrap">
                                                <span class="mb-0 me-3 avatar avatar-xxl">
                                                    <img src="../assets/images/faces/22.jpg" alt="" class="profile-img">
                                                </span>
                                                <div class="">
                                                    <div class="fw-medium lh-1"> <?php echo $recById[0]['full_name']; ?></div>
                                                    <div class="fs-12 text-muted"><?php echo $recById[0]['username']; ?></div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mb-4">
                                                <div class="col-xl-6">
                                                    <label for="first-name" class="form-label">Full Name :</label>
                                                    <input type="text" class="form-control" id="first-name" name="full_name" placeholder="Please enter your Name" value="<?php echo $recById[0]['full_name']; ?>">
                                                </div>
                                                <div class="col-xl-6">
                                                    <label for="user-name" class="form-label">User Name :</label>
                                                    <input type="text" class="form-control" id="user-name" name="username" placeholder="Please enter username" value="<?php echo $recById[0]['username']; ?>">
                                                </div>
                                                <div class="col-xl-6">
                                                    <label for="user-name" class="form-label">Gender :</label>
                                                    <select class="form-control" name="gender">
                                                        <option value="">Select Gender</option>
                                                        <?php foreach ($gendersRec as $gnd) { ?>
                                                            <option <?php if((int)$recById[0]['gender_id'] > 0){ if(base64e($gnd['id']) == base64e($recById[0]['gender_id'])){ echo 'selected="selected"';} }?> value="<?php echo base64e($gnd['id']); ?>"><?php echo $gnd['gender_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label for="user-name" class="form-label">D.O.B :</label>
                                                    <input type="date" class="form-control" id="input-date" name="dob" value="<?php echo $recById[0]['username']; ?>">
                                                </div>
                                                <div class="col-xl-12">
                                                    <label for="phone-number" class="form-label">Phone Number :</label>
                                                    <div class="d-flex gap-2 align-items-end flex-wrap">
                                                        <div class="flex-grow-1">
                                                            <div class="input-group">
                                                                <span class="input-group-text bg-primary-transparent" id="basic-addon1"><i class="ri-phone-line align-middle"></i></span>
                                                                <input type="number" class="form-control" id="phone-number" name="mobile" placeholder="1100 110 011" value="<?php echo $recById[0]['mobile'];?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <label class="form-label">Country :</label>
                                                    <select class="form-control" data-trigger id="country-select" name="country">
                                                        <option value="">Select Country</option>
                                                        <?php foreach ($countriesRec as $cnt) { ?>
                                                            <option <?php if((int)$recById[0]['country_id'] > 0){ if(base64e($cnt['id']) == base64e($recById[0]['country_id'])){ echo 'selected="selected"';} }?> value="<?php echo base64e($cnt['id']); ?>"><?php echo $cnt['country_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-xl-12">
                                                    <label for="about" class="form-label">Full Address :</label>
                                                    <textarea class="form-control" id="about" rows="5" name="address" placeholder="Enter your full address"><?php echo $recById[0]['address'];?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="btn-list">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="" class="btn btn-primary-light">Cancel</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End:: row-1 -->
    </div>
</div>
<!-- End::app-content -->
<?php $this->load->view('user/common/footer'); ?>
<script>
    $("#profilesettingform").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var actionUrl = form.attr('action');
        $('#loader').removeClass('d-none');
        $('#loader').show();
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(data) {
                var myData = JSON.parse(data);
                var status = myData.status;
                var msg = myData.msg;
                if (status == 'error') {
                    toastmessage(msg, 'error', 'error');
                } else {
                    var redirecturl = myData.url;
                    toastmessagesuccess(msg, 'Success', 'success',redirecturl);
                }
                $('#loader').hide();
                //$('#error_msg_div').html(data);


            }
        });

    });

    function toastmessagesuccess(msg, head, icon,url='') {
        $.toast({
            text: msg, // Text that is to be shown in the toast
            heading: head, // Optional heading to be shown on the toast
            icon: icon, // Type of toast icon
            showHideTransition: 'slide', // fade, slide or plain
            allowToastClose: true, // Boolean value true or false
            hideAfter: 5000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
            stack: false, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
            position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



            textAlign: 'left', // Text alignment i.e. left, right or center
            loader: true, // Whether to show loader or not. True by default
            loaderBg: '#9EC600', // Background color of the toast loader
            afterHidden: function() {
                window.location.href = url;
            }
        });
    }

    function toastmessage(msg, head, icon) {
        $.toast({
            text: msg, // Text that is to be shown in the toast
            heading: head, // Optional heading to be shown on the toast
            icon: icon, // Type of toast icon
            showHideTransition: 'slide', // fade, slide or plain
            allowToastClose: true, // Boolean value true or false
            hideAfter: 5000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
            stack: false, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
            position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
            textAlign: 'left', // Text alignment i.e. left, right or center
            loader: true, // Whether to show loader or not. True by default
            loaderBg: '#9EC600', // Background color of the toast loader
        });
    }
</script>