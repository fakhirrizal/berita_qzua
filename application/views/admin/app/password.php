<a href="<?php echo site_url('admin_side/profil'); ?>" class="kt-widget__item kt-widget__item--active">
    <span class="kt-widget__section">
        <span class="kt-widget__icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                </g>
            </svg> </span>
        <span class="kt-widget__desc">
            Personal Information
        </span>
    </span>
</a>
<a href="#" class="kt-widget__item ">
    <span class="kt-widget__section">
        <span class="kt-widget__icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
                    <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3" />
                    <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3" />
                </g>
            </svg> </span>
        <span class="kt-widget__desc">
            Change Password
        </span>
    </span>
    <!-- <span class="kt-badge kt-badge--unified-danger kt-badge--sm kt-badge--rounded kt-badge--bolder">5</span> -->
</a>
<hr>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="page-breadcrumb breadcrumb" style="background-color:#8cb2ea;">
	<font color='black'>
		<h4>Notes</h4>
		<a> 1. Fields with an asterisk (<font color='red'>*</font>) are required to be filled out.</a><br>
		<!-- <a> 2. TnC for uploaded files:</a><br>
		<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Allowed file format is <b>.jpg</b>, <b>.jpeg</b>, <b>.png</b>, <b>.bmp</b></a><br>
        <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Maximum file size <b>3 MB</b></a><br> -->
	</font>
</div>
<div class="card shadow mb-4">
    <form role="form" class="form-horizontal" action="<?=base_url('admin_side/perbarui_kata_sandi');?>" method="post" enctype='multipart/form-data'>
        <input type="hidden" name="user_id" value='<?= md5($data_utama->id); ?>'>
        <input type="hidden" name="nama" value='<?= $data_utama->fullname; ?>'>
        <div class="card-header py-3">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
            <div class="form-body">
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Kata Sandi Lama <span class="required"> * </span></label>
                    <input type="text" class="form-control" name="old" placeholder="Type something" required>
                </div>
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Kata Sandi Baru <span class="required"> * </span></label>
                    <input type="password" class="form-control" name="new" id="txtNewPassword" placeholder="Type something" required>
                </div>
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Konfirmasi Kata Sandi <span class="required"> * </span></label>
                    <input type="password" class="form-control" name="confirmed" id="txtConfirmPassword" onChange="checkPasswordMatch();" placeholder="Type something" required>
                </div>
                <div id="divCheckPasswordMatch"></div>
            </div>
        </div>
        <div class="card-body">
            <button type="reset" class="btn btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Cancel</span>
            </button>
            <button type="submit" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                <i class="fas fa-check"></i>
                </span>
                <span class="text">Update</span>
            </button>
        </div>
    </form>
</div>

<script>
    function checkPasswordMatch() {
        var password = $("#txtNewPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();

        if (password != confirmPassword)
            $("#divCheckPasswordMatch").html("Passwords do not match!");
        else
            $("#divCheckPasswordMatch").html("Passwords match.");
    }

    $(document).ready(function () {
        $("#txtConfirmPassword").keyup(checkPasswordMatch);
    });
</script>