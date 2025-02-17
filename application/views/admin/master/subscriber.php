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
						<li class="breadcrumb-item"><a href="#">Subscriber</a>
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
					<!-- <a> 1. Ketika mengklik <b>Atur Ulang Sandi</b>, maka kata sandi otomatis menjadi "<b>1234</b>"</a><br>
					<a> 2. Data ekspor berupa file excel (<b>.xls</b>)</a> -->
				</font>
			</div>
			<div class="card shadow mb-4">
			<div class="card-header py-3">
				<!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
				<!-- <a href="<?=base_url('admin_side/tambah_kategori_berita');?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add Data <i class="fa fa-plus"></i></a> -->
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<form action="#" method="post" onsubmit="return deleteConfirm();"/>
						<table class="table table-striped table-bordered" id="tbl">
							<thead>
								<tr>
									<th style="text-align: center;" width="1%"> # </th>
									<th style="text-align: center;"> Email </th>
									<th style="text-align: center;"> Blast Counting </th>
									<th style="text-align: center;"> Joined Date </th>
									<th style="text-align: center;"> Action </th>
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
									url:"<?= site_url('admin/Master/json_subscriber'); ?>"
								},
								"aoColumns": [
											{ mData: 'no', sClass: "alignCenter" },
											{ mData: 'judul', sClass: "alignCenter" } ,
											{ mData: 'isi', sClass: "alignCenter" },
											{ mData: 'action', sClass: "alignCenter" },
											{ mData: 'button', sClass: "alignCenter" }
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
		</div>
	</div>
</div>