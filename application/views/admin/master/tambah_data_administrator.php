<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<style media="all" type="text/css">
    .alignCenter { text-align: center; }
</style>
<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="page-breadcrumb breadcrumb" style="background-color:#8cb2ea;">
	<font color='black'>
		<h4>Notes</h4>
		<a> 1. Fields with an asterisk (<font color='red'>*</font>) are required to be filled out.</a>
		<!-- <br><a> 2. Data ekspor berupa file excel (<b>.xls</b>)</a> -->
	</font>
</div>
<div class="card shadow mb-4">
    <form role="form" class="form-horizontal" action="<?=base_url('admin_side/simpan_data_admin');?>" method="post" enctype='multipart/form-data'>
        <div class="card-header py-3">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
            <div class="form-body">
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Fullname <span class="required"> * </span></label>
                    <input type="text" class="form-control" name="nama" placeholder="Type something" required>
                </div>
			</div>
			<hr>
			<div class="form-body">
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Username <span class="required"> * </span></label>
                    <input type="text" class="form-control" name="un" placeholder="Type something" required>
                </div>
			</div>
			<div class="form-body">
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Password <span class="required"> * </span></label>
                    <input type="text" class="form-control" name="ps" placeholder="Type something" required>
                </div>
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
                <span class="text">Save</span>
            </button>
        </div>
    </form>
</div>