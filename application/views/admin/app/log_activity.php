<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<style media="all" type="text/css">
    .alignCenter { text-align: center; }
</style>
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
	<a href="<?=base_url('admin_side/cleaning_log');?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Clear Log <i class="fa fa-trash"></i></a>
  </div>
  <div class="card-body">
	<div class="table-responsive">
		<table class="table table-striped table-bordered" id="tbl">
			<thead>
				<tr>
					<th style="text-align: center;" width="4%"> # </th>
					<th style="text-align: center;"> Activity Type </th>
					<th style="text-align: center;"> Activity </th>
					<th style="text-align: center;"> User </th>
					<th style="text-align: center;"> Datetime </th>
					<th style="text-align: center;" width="7%"> Action </th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($data_tabel as $key => $value) {
					$pecah_datetime = explode(' ',$value->activity_time);
				?>
				<tr>
					<td style="text-align: center;"><?= $no++.'.'; ?></td>
					<td style="text-align: center;"><?= $value->activity_type; ?></td>
					<td style="text-align: center;"><?= $value->activity_data; ?></td>
					<td style="text-align: center;"><?= $value->fullname; ?></td>
					<td style="text-align: center;"><?= $this->Main_model->convert_tanggal($pecah_datetime[0]).' '.$pecah_datetime[1]; ?></td>
					<td style="text-align: center;">
						<div class="dropdown no-arrow mb-4">
							<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Action
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item detaildata" href="#" data-toggle="modal" data-target="#detaildata" id="<?= md5($value->activity_id); ?>">Detail Data</a>
								<a class="dropdown-item" onclick="return confirm('Anda yakin?')" href="<?= site_url('admin_side/hapus_aktifitas/'.md5($value->activity_id)); ?>">Hapus Data</a>
							</div>
						</div>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<script type="text/javascript" language="javascript" >
			$(document).ready(function(){
				$('#tbl').dataTable();
			});
		</script>
	</div>
  </div>
</div>

<div class="modal fade" id="detaildata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<!-- <h4 class="modal-title" id="myModalLabel">Detail Data Aktifitas</h4> -->
			</div>
			<div class="modal-body">
				<div class="box box-primary" id='formdetaildata' >
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$.ajaxSetup({
			type:"POST",
			url: "<?php echo site_url(); ?>admin/App/ajax_function",
			cache: false,
		});
		$('.detaildata').click(function(){
		var id = $(this).attr("id");
		var modul = 'modul_detail_log_aktifitas';
		$.ajax({
			data: {id:id,modul:modul},
			success:function(data){
			$('#formdetaildata').html(data);
			$('#detaildata').modal("show");
			}
		});
		});
	});
</script>