<div class="row">
<div class="form-group form-md-checkboxes">
    <!-- <label><h4>Daftar Berita</h4></label> -->
    <form role="form" class="form-horizontal" action="<?=base_url('admin_side/tambah_Berita_modul');?>" method="post" enctype='multipart/form-data'>
    <input type='hidden' name='id_mod' value='<?= $id_mod; ?>'/>
    <div class="md-checkbox-list">
        <?php
        foreach ($daftar_Berita as $key => $value) {
            $datacek = $this->Main_model->getSelectedData('Berita_to_modul a', 'a.*', array('md5(a.id_modul)'=>$id_mod,'a.id_Berita'=>$value->id_Berita))->result();
        ?>
        <div class="form-group form-md-line-input has-danger">
            <div class="col-md-1">
               
            </div>
            <div class="col-md-1">
                <div class="md-checkbox" >
                    <?php
                    if($datacek==NULL){
                        echo'<input type="checkbox" name="Beritaku[]" id="checkbox'.$value->id_Berita.'" class="md-check" value="'.$value->id_Berita.'">';
                    }else{
                        echo'<input type="checkbox" id="checkbox'.$value->id_Berita.'" disabled checked class="md-check">';
                    }
                    ?>
                    
                    <label for="checkbox<?= $value->id_Berita; ?>">
                        <span class="inc"></span>
                        <span class="check"></span>
                        <span class="box"></span> KS-<?= $value->id_Berita; ?> </label>
                </div>
            </div>
            <div class="col-md-10">
                <div class="panel-group accordion" id="accordion3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_<?= $value->id_Berita; ?>" aria-expanded="false"> Lihat Detail Berita </a>
                            </h4>
                        </div>
                        <div id="collapse_3_<?= $value->id_Berita; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                <p><?= $value->pertanyaan; ?></p>
                                <?php
                                if($value->pilihan_1!=NULL){
                                    echo'<p><b>A</b>           '.$value->pilihan_1.'</p>';
                                }
                                if($value->pilihan_2!=NULL){
                                    echo'<p><b>B</b>           '.$value->pilihan_2.'</p>';
                                }
                                if($value->pilihan_3!=NULL){
                                    echo'<p><b>C</b>           '.$value->pilihan_3.'</p>';
                                }
                                if($value->pilihan_4!=NULL){
                                    echo'<p><b>D</b>           '.$value->pilihan_4.'</p>';
                                }
                                if($value->pilihan_5!=NULL){
                                    echo'<p><b>E</b>           '.$value->pilihan_5.'</p>';
                                }
                                ?>
                                <hr>
                                <p>Jawaban : <b><?= $value->jawaban; ?></b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="form-actions margin-top-10">
        <div class="row">
            <div class="col-md-offset-2 col-md-10">
                <button type="reset" class="btn default">Cancel</button>
                <button type="submit" class="btn blue">Perbarui</button>
                |
                <a class="btn red" href='<?= base_url(); ?>admin_side/modul_locked/<?= $id_mod; ?>'>Locked</a>
            </div>
        </div>
    </div>
    </form>
</div>
<hr>
<div class="col-md-4">
</div>
<div class="col-md-4">
    <table class="table table-striped table-bordered">
        <caption>Berikut daftar Berita yang telah dipilih</caption>
        <thead>
            <tr>
                <th style="text-align: center;" width="1%"> # </th>
                <th style="text-align: center;"> Kode Berita </th>
                <th style="text-align: center;" width="1%"> Action </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($Berita as $key => $value) {
                $return_on_click = "return confirm('Anda yakin?')";
                $if_hapus = '<a class="btn btn-xs red" onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_Berita_dalam_modul/'.md5($value->id_Berita_to_modul)).'">Hapus</a>';
                echo'
                <tr>
                    <td style="text-align: center;">'.$no++.'.</td>
                    <td style="text-align: center;">KS-'.$value->id_Berita.'</td>
                    <td style="text-align: center;">'.$if_hapus.'</td>
                </tr>
                ';
            }
            ?>
        </tbody>
    </table>
</div>
<div class="col-md-4">
</div>