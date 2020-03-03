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
    <form role="form" class="form-horizontal" action="<?=base_url('admin_side/simpan_berita');?>" method="post" enctype='multipart/form-data'>
        <div class="card-header py-3">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
            <div class="form-body">
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Title <span class="required"> * </span></label>
                    <input type="text" class="form-control" name="nama" placeholder="Type something" required>
                </div>
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">News <span class="required"> * </span></label>
					<!-- <textarea class="form-control" name="desc"></textarea> -->
					<textarea id="summernote" name='desc'></textarea>
					<script>
						$(document).ready(function() {
							$('#summernote').summernote();
						});
					</script>
                </div>
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Category </label>
					<style>
						/* The container */
						.container {
						display: block;
						position: relative;
						padding-left: 35px;
						margin-bottom: 12px;
						cursor: pointer;
						font-size: 22px;
						-webkit-user-select: none;
						-moz-user-select: none;
						-ms-user-select: none;
						user-select: none;
						}

						/* Hide the browser's default checkbox */
						.container input {
						position: absolute;
						opacity: 0;
						cursor: pointer;
						height: 0;
						width: 0;
						}

						/* Create a custom checkbox */
						.checkmark {
						position: absolute;
						top: 0;
						left: 0;
						height: 25px;
						width: 25px;
						background-color: #eee;
						}

						/* On mouse-over, add a grey background color */
						.container:hover input ~ .checkmark {
						background-color: #ccc;
						}

						/* When the checkbox is checked, add a blue background */
						.container input:checked ~ .checkmark {
						background-color: #2196F3;
						}

						/* Create the checkmark/indicator (hidden when not checked) */
						.checkmark:after {
						content: "";
						position: absolute;
						display: none;
						}

						/* Show the checkmark when checked */
						.container input:checked ~ .checkmark:after {
						display: block;
						}

						/* Style the checkmark/indicator */
						.container .checkmark:after {
						left: 9px;
						top: 5px;
						width: 5px;
						height: 10px;
						border: solid white;
						border-width: 0 3px 3px 0;
						-webkit-transform: rotate(45deg);
						-ms-transform: rotate(45deg);
						transform: rotate(45deg);
						}
					</style>

					<?php
					foreach ($kategori as $key => $value) {
						echo'
						<label class="container">'.$value->kategori_berita.'
						<input type="checkbox" name="kat[]" value="'.$value->id_kategori_berita.'">
						<span class="checkmark"></span>
						</label>
						';
					}
					?>

					<!-- <label class="container">One
					<input type="checkbox" checked="checked">
					<span class="checkmark"></span>
					</label>
					
					<label class="container">Three
					<input type="checkbox">
					<span class="checkmark"></span>
					</label>
					<label class="container">Four
					<input type="checkbox">
					<span class="checkmark"></span>
					</label> -->
                </div>
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Thumbnail </label>
                    <input type="file" class="form-control" name="foto" accept="image/*">
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