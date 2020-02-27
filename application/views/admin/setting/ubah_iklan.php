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
        <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Ukuran maksimum file <b>3 MB</b></a><br>
	</font>
</div>
<div class="card shadow mb-4">
    <form role="form" class="form-horizontal" action="<?=base_url('admin_side/perbarui_iklan');?>" method="post" enctype='multipart/form-data'>
        <input type="hidden" name="id" value='<?= $data_utama->id_iklan; ?>'>
        <!-- <input type="hidden" name="start_date" value='<?= $data_utama->start_date; ?>'>
        <input type="hidden" name="expired_date" value='<?= $data_utama->expired_date; ?>'> -->
        <div class="card-header py-3">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
            <div class="form-body">
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Advertiser </label>
                    <input type="text" class="form-control" name="by" placeholder="Type something" value='<?= $data_utama->advertiser; ?>'>
                </div>

                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Judul <span class="required"> * </span></label>
                    <input type="text" class="form-control" name="nama" placeholder="Type something" value='<?= $data_utama->judul; ?>' required>
                </div>
         
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Deskripsi </label>
                    <textarea class="form-control" name="desc"><?= $data_utama->deskripsi; ?></textarea>
                </div>
            
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Waktu Penayangan <span class="required"> * </span></label>
                    <?php
                    $tanggal1 = date('m/d/Y', strtotime($data_utama->start_date));
                    $tanggal2 = date('m/d/Y', strtotime($data_utama->expired_date));
                    echo'<input type="text" class="form-control" name="daterange" value="'.$tanggal1.' - '.$tanggal2.'" />';
                    echo'<input type="hidden" class="form-control" name="tgl" value="'.$tanggal1.' - '.$tanggal2.'" />';
                    ?>
                </div>
                <script>
                    $(function() {
                        $('input[name="daterange"]').daterangepicker({
                            opens: 'left'
                        }, function(start, end, label) {
                            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                        });
                    });
                </script>
          
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Biaya </label>
                    <input type="number" class="form-control" name="price" placeholder="Type something" value='<?= $data_utama->price; ?>'>
                </div>
            
                <div class="form-group form-md-line-input has-danger">
                    <label class="control-label" for="form_control_1">Banner </label>
                    <input type="file" class="form-control" name="foto" accept="image/*">
                </div>
            
                <?php
                if($data_utama->banner==NULL){
                    echo'';
                }else{
                    echo'
                
                        <div class="form-group form-md-line-input has-danger">
                            <img src="'.base_url().'data_upload/iklan/'.$data_utama->banner.'" width="400px"/>
                        </div>
                    
                    ';
                }
                ?>
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
                <span class="text">Perbarui</span>
            </button>
        </div>
    </form>
</div>