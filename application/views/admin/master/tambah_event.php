<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<style media="all" type="text/css">
    .alignCenter { text-align: center; }
</style>
<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="page-breadcrumb breadcrumb" style="background-color:#8cb2ea;">
	<font color='black'>
		<h4>Notes</h4>
		<a> 1. Fields with an asterisk (<font color='red'>*</font>) are required to be filled out.</a><br>
		<a> 2. TnC for uploaded files:</a><br>
		<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Allowed file format is <b>.jpg</b>, <b>.jpeg</b>, <b>.png</b>, <b>.bmp</b></a><br>
		<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Maximum file size <b>3 MB</b></a>
	</font>
</div>
<div class="card shadow mb-4">
    <form role="form" class="form-horizontal" action="<?=base_url('admin_side/simpan_event');?>" method="post" enctype='multipart/form-data'>
        <div class="card-header py-3">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
            <div class="form-body">
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Title <span class="required"> * </span></label>
                    <input type="text" class="form-control" name="nama" placeholder="Type something" required>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Description </label>
                    <textarea class="form-control" name="desc"></textarea>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Date <span class="required"> * </span></label>
                    <input type="date" class="form-control" name="tgl" placeholder="Type something" required>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Venue </label>
                    <input type="text" class="form-control" name="tempat" placeholder="Type something" >
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Organizer </label>
                    <input type="text" class="form-control" name="by" placeholder="Type something" >
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Poster </label>
                    <input type="file" class="form-control" name="foto" accept="image/*" required>
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