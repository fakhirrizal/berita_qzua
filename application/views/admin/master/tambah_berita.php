<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<style media="all" type="text/css">
    .alignCenter { text-align: center; }
</style>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
	<div class="row">
		<div class="col-7 align-self-center">
			<h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Dashboard</h3>
			<div class="d-flex align-items-center">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb m-0 p-0">
						<li class="breadcrumb-item"><a href="#">Add New News</a>
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
	<!-- *************************************************************** -->
	<!-- Start First Cards -->
	<!-- *************************************************************** -->
	<div class="card-group">
		<div class="card border-right">
			<?= $this->session->flashdata('sukses') ?>
			<?= $this->session->flashdata('gagal') ?>
			<div class="page-breadcrumb breadcrumb" style="background-color:#8cb2ea;">
				<font color='black'>
					<h4>Notes</h4>
					<a> 1. Fields with an asterisk (<font color='red'>*</font>) are required to be filled out.</a><br>
					<a> 2. When choosing a <b>Video</b> category, the <b>Video Link</b> is required.</a><br>
					<a> 3. TnC for uploaded files:</a><br>
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
								<label class="control-label" for="form_control_1">Category <span class="required"> * </span></label>
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
								<label class="control-label" for="form_control_1">Video Link </label>
								<input type="text" class="form-control" name="link" placeholder="Type something">
							</div>
							<div class="form-group form-md-line-input has-danger">
								<label class="control-label" for="form_control_1">Tags </label>
								<input type="text" value="" data-role="tagsinput" id="tags" name='tags' class="form-control">
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
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
<!-- <link rel="stylesheet" href="../css/bootstrap-tagsinput.css"> -->
<style>
.bootstrap-tagsinput {
    background-color: #fff;
    border: 1px solid #ccc;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    display: block;
    padding: 4px 6px;
    color: #555;
    vertical-align: middle;
    border-radius: 4px;
    max-width: 100%;
    line-height: 22px;
    cursor: text;
}
.bootstrap-tagsinput input {
    border: none;
    box-shadow: none;
    outline: none;
    background-color: transparent;
    padding: 0 6px;
    margin: 0;
    width: auto;
    max-width: inherit;
}
</style>