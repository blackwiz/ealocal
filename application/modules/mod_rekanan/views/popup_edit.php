<div class="content popup_rekanan_edits">
    <?= form_open("mod_rekanan/rekanan_edit", array('id' => 'popup_rekanan_edit')); ?>
    <input type="hidden" name="id" value="<?= $detail["id_rekanan"]; ?>" />

    <div class="row-fluid form-horizontal">
        <div class="span12">
            <div class="row-fluid">
                <div class="control-group info">
                    <label class="control-label" for="type_rekanan">Tipe</label>
                    <div class="controls">
                        <?= form_dropdown('type_rekanan', $type_rekanan, $detail["type_rekanan"], 'id="type_rekanan"'); ?>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="control-group info">
                    <label class="control-label" for="kode_rekanan">Kode Rekanan</label>
                    <div class="controls">
                        <input class="span8 text" type="text" id="kode_rekanan" name="kode_rekanan" value="<?= $detail["kode_rekanan"]; ?>" readonly autocomplete="off" />
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="control-group info">
                    <label class="control-label" for="nama_rekanan">Nama Rekanan</label>
                    <div class="controls">
                        <input class="span8 text" type="text" id="nama_rekanan" name="nama_rekanan" value="<?= $detail["nama_rekanan"]; ?>" autocomplete="off" />
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="control-group info">
                    <label class="control-label" for="id_card">NPWP</label>
                    <div class="controls">
                        <input class="span8 text" type="text" id="id_card" name="id_card" value="<?= set_value('id_card'); ?>" autocomplete="off" />
                    </div>
                </div>
            </div>
			<div class="row-fluid">
				<div class="control-group info">
					<label class="control-label" for="nomor_kontrak">Nomor Kontrak</label>
					<div class="controls">
						<input class="span8 text" type="text" id="nomor_kontrak" name="nomor_kontrak" value="<?= $detail["nomor_kontrak"]; ?>" autocomplete="off" />
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="control-group info">
					<label class="control-label" for="nilai_kontrak">Nilai Kontrak</label>
					<div class="controls">
						<input class="span8 text" type="text" id="nilai_kontrak" name="nilai_kontrak" value="<?= $detail["nilai_kontrak"]; ?>" autocomplete="off" />
					</div>
				</div>
			</div>
            <div class="row-fluid">
                <div class="control-group info">
                    <label class="control-label" for="nama_kontak">Nama Kontak</label>
                    <div class="controls">
                        <input class="span8 text" type="text" id="nama_kontak" name="nama_kontak" value="<?= $detail["nama_kontak"]; ?>" autocomplete="off" />
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="control-group info">
                    <label class="control-label" for="telp_rekanan">Telp. Perusahaan</label>
                    <div class="controls">
                        <input class="span8 text" type="text" id="telp_rekanan" name="telp_rekanan" value="<?= $detail["telp_rekanan"]; ?>" autocomplete="off" />
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="control-group info">
                    <label class="control-label" for="alamat">Alamat</label>
                    <div class="controls">
                        <input class="span8 text" type="text" id="alamat" name="alamat" value="<?= $detail["alamat"]; ?>" autocomplete="off" />
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="control-group info">
                    <label class="control-label" for="telp_kontak">Telp. Kontak</label>
                    <div class="controls">
                        <input class="span8 text" type="text" id="telp_kontak" name="telp_kontak" value="<?= $detail["telp_kontak"]; ?>" autocomplete="off" />
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="control-group info">
                    <label class="control-label" for="kota">Kota</label>
                    <div class="controls">
                        <input class="span8 text" type="text" id="kota" name="kota" value="<?= $detail["kota"]; ?>" autocomplete="off" />
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="control-group info">
                    <label class="control-label" for="type_rekanan">Kode Perkiraan</label>
                    <div class="controls">
                        <?= form_multiselect('kode_perkiraan[]', $kode_perkiraan, $selected, 'class="span8 chzn-select"'); ?>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="control-group info">
                    <div class="controls">
                        <div class="btn-group">
                            <button type="button" class="btn btn-info" name="form_rekanan_save"><i class="icon-ok-sign icon-white"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= form_close(); ?>
</div>
<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/choosen/chosen.css" />
<script type="text/javascript" src="<?= base_url(); ?>assets/choosen/chosen.jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('.chzn-select').chosen({});

        $('input[id="nilai_kontrak"]').number(true, 2);

		$('select[name="type_rekanan"]').change(function() {
			$.ajax({
                url: root + 'mod_rekanan/get_koderekanan/'+$('select[name="type_rekanan"]').val(),
                type: 'get',
                success: function(data) {
                    $('input[name="kode_rekanan"]').val(data);
                }
            });
		});

        $('button[name="form_rekanan_save"]').bind('click', function() {
            $.ajax({
                url : root + 'mod_rekanan/rekanan_edit',
                type : 'post',
                dataType : 'json',
                data : $('form[id="popup_rekanan_edit"]').serialize(),
                beforeSend : function() {
                    $(this).attr('disabled',false);
                },
                complete : function() {
                    $(this).attr('disabled',false);
                },
                success : function(json) {
                    $('div.alert').remove();
                    if (json['error']) {
                        $('div.popup_rekanan_edits').prepend('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>'+json['error']+'</div>');
                        $('div.alert').fadeIn('slow');
                    }
                    if (json['success']) {
                        $('div.popup_rekanan_edits').prepend('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>'+json['success']+'</div>');
                        $('div.alert').fadeIn('slow');
                        parent.pkcaller(json);
                    }
                    createAutoClosingAlert('div.alert', 2000);
                }
            });
        });
    });
</script>
