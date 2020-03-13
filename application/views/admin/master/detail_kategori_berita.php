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
						<li class="breadcrumb-item"><a href="#">Edit Category of News</a>
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
                    <a> 1. Fields with an asterisk (<font color='red'>*</font>) are required to be filled out.</a>
                    <!-- <br><a> 2. Data ekspor berupa file excel (<b>.xls</b>)</a> -->
                </font>
            </div>
            <div class="card shadow mb-4">
                <form role="form" class="form-horizontal" action="<?=base_url('admin_side/perbarui_kategori_berita');?>" method="post" enctype='multipart/form-data'>
                    <input type="hidden" name="id" value='<?= md5($data_utama->id_kategori_berita); ?>'>
                    <div class="card-header py-3">
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
                        <div class="form-body">
                            <div class="form-group form-md-line-input has-danger">
                                <label class="control-label" for="form_control_1">Category <span class="required"> * </span></label>
                                <input type="text" class="form-control" name="nama" placeholder="Type something" value='<?= $data_utama->kategori_berita; ?>' required>
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
                            <span class="text">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>