<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<style media="all" type="text/css">
    .alignCenter { text-align: center; }
</style>
<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="page-breadcrumb breadcrumb" style="background-color:#8cb2ea;">
	<font color='black'>
		<h4>Catatan</h4>
		<a> 1. Kolom isian dengan tanda bintang (<font color='red'>*</font>) adalah wajib untuk di isi.</a><br>
		<a> 2. Ketentuan file yang diupload:</a><br>
		<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Format berupa file <b>.jpg</b>, <b>.jpeg</b>, <b>.png</b>, <b>.bmp</b></a><br>
		<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Ukuran maksimum file <b>3 MB</b></a>
	</font>
</div>
<div class="card shadow mb-4">
    <form role="form" class="form-horizontal" action="<?=base_url('admin_side/simpan_iklan');?>" method="post" enctype='multipart/form-data'>
        <div class="card-header py-3">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
            <div class="form-body">
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Judul <span class="required"> * </span></label>
                    <input type="text" class="form-control" name="nama" placeholder="Type something" required>
                </div>
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Deskripsi </label>
                    <textarea class="form-control" name="desc"></textarea>
                </div>
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Tanggal Pelaksanaan <span class="required"> * </span></label>
                    <input type="date" class="form-control" name="tgl" placeholder="Type something" required>
                </div>
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Tempat </label>
                    <input type="text" class="form-control" name="tempat" placeholder="Type something" >
                </div>
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Penyelenggara </label>
                    <input type="text" class="form-control" name="by" placeholder="Type something" >
                </div>
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Poster </label>
                    <input type="file" class="form-control" name="foto" accept="image/*">
                </div>
            </div>
        </div>
        <div class="card-body">
            <button type="reset" class="btn btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Batal</span>
            </button>
            <button type="submit" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                <i class="fas fa-check"></i>
                </span>
                <span class="text">Simpan</span>
            </button>
        </div>
    </form>
</div>