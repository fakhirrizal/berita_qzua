<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<style media="all" type="text/css">
    .alignCenter { text-align: center; }
</style>
<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="page-breadcrumb breadcrumb" style="background-color:#8cb2ea;">
	<font color='black'>
		<h4>Catatan</h4>
		<!-- <a> 1. Ketika mengklik <b>Atur Ulang Sandi</b>, maka kata sandi otomatis menjadi "<b>1234</b>"</a><br>
		<a> 2. Data ekspor berupa file excel (<b>.xls</b>)</a> -->
	</font>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
	<!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
	<a href="<?=base_url('admin_side/tambah_iklan');?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah Data <i class="fa fa-plus"></i></a>
  </div>
  <div class="card-body">
	<div class="table-responsive">
		<form action="#" method="post" onsubmit="return deleteConfirm();"/>
			<table class="table table-striped table-bordered" id="tbl">
				<thead>
					<tr>
						<th style="text-align: center;" width="1%"> # </th>
						<th style="text-align: center;"> Advertiser </th>
						<th style="text-align: center;"> Judul </th>
						<th style="text-align: center;"> Deskripsi </th>
						<th style="text-align: center;"> Jadwal Penayangan </th>
						<th style="text-align: center;" width="1%"> Aksi </th>
					</tr>
				</thead>
			</table>
		</form>
		<script type="text/javascript" language="javascript" >
			$(document).ready(function(){
				$('#tbl').dataTable({
					"order": [[ 0, "asc" ]],
					"bProcessing": true,
					"ajax" : {
						url:"<?= site_url('admin/Setting/json_iklan'); ?>"
					},
					"aoColumns": [
                                { mData: 'no', sClass: "alignCenter" },
                                { mData: 'by', sClass: "alignCenter" },
								{ mData: 'judul', sClass: "alignCenter" } ,
								{ mData: 'desc', sClass: "alignCenter" },
								{ mData: 'tgl', sClass: "alignCenter" },
								{ mData: 'action' }
							]
				});

			});
		</script>
		<script type="text/javascript">
			function deleteConfirm(){
				var result = confirm("Yakin akan menghapus data ini?");
				if(result){
					return true;
				}else{
					return false;
				}
			}
		</script>
	</div>
  </div>
</div>