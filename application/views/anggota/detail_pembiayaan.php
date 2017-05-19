<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<!--<h3>Welcome Admin</h3>-->
			<div class="col-md-12">
				<h2>Rincian Pembiayaan Murobahah</h2>
				<?php
if(isset($anggota)){
echo "<h4>Nama Anggota : ".$anggota[0]->nama."</h4>";
echo "<h4>No Rekening : ".$anggota[0]->no_rekening."</h4>";
if($anggota[0]->dicabang==1){
echo "<h4>Cabang : Bandung</h4>";
}
if($anggota[0]->dicabang==2){
echo "<h4>Cabang : Cilegon</h4>";
}
if($anggota[0]->dicabang==3){
echo "<h4>Cabang : Serang</h4>";
}
echo "<h4>Saldo Anggota : ".$anggota[0]->saldo_tabarok_a."</h4>";
}?>
			<br>
			<hr>
		

				<?php if (isset($error_msg))
				//PENTING!!!!!!!!!!!!!
				//jangan lupa tampilkan id murobahah untuk menampilkan identitas peminjam
                  {
                    echo "<h4>".$error_msg."</h4>";
                  }
                ?>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-12">
			<div class="col-md-12">
			<h4 class="col-md-12">Bayar Cicilan Pembiayaan</h4>
			</div>
			</div>
		</div>
		<?php if($hargajual > $jumlahbayar){ ?>
		<div class="row">
			<form class="form-horizontal" role="form" action="<?php echo base_url();?>anggota/process_bayar_murobahah/<?php echo $id_rekening; ?>/<?php echo $id_murobahah; ?>" method="POST">
			<div class="col-md-12">
			<div class="form-group">
				<label class="control-label col-md-2" id="lblnominal">Nominal</label>
				<div class="col-md-4"><input type="number" name="Nominal" id="txtnominal" class="form-control" placeholder="Nominal" oninput="shownominal();" min="<?php if($hargajual - $jumlahbayar>$cicilan){echo $cicilan;}else{echo $hargajual - $jumlahbayar;} ?>" max="<?php echo $hargajual - $jumlahbayar; ?>" step=500></div>
				<label class="contorl-label col-md-2" id="cek"></label>
			</div>

			<div class="form-group">
			<label class="control-label col-md-2">Keterangan</label>
			<div class="col-md-6"><input type="text" name="Keterangan" class="form-control col-md-3" placeholder="Keterangan"></div>
			</div>

			</div>
			<div class="form-group">
              <div class='col-sm-offset-3 col-sm-10'>
                <button type='submit' class='btn btn-primary' id='submitButton' disabled>Submit</button>
                <a href="<?php echo base_url();?>Anggota" class = "btn btn-danger">Cancel</a>
              </div>
            </div>
			</form>
			<div class="col-md-12" >
				<div class="col-md-12" >
					<div class="col-md-12" >
						<form class="form-horizontal" role="form" action="<?php echo base_url();?>anggota/process_bayar_murobahah_autodebit/<?php echo $id_rekening; ?>/<?php echo $id_murobahah; ?>" method="POST">
						<div class='col-sm-offset-3 col-sm-10'>
							<div class="col-md-12" >
							<h4>Atau</h4>
							</div>
							
							<input type="hidden" value="<?php if($hargajual - $jumlahbayar>$cicilan){echo $cicilan;}else{echo $hargajual - $jumlahbayar;} ?>" name="Nominal2">
							</div>
							<div class="form-group">
              				<div class='col-sm-offset-2 col-sm-10'>
                			<button type='submit' class='btn btn-primary col-sm-4' id='submitButton'>AUTODEBIT</button>
              				</div>
            				</div>	
							</form>
					</div>
				</div>
			</div>
		</div>	
		<hr>
		<?php }else{
			?>
			<div style="text-align: center">
				<a href="<?php echo base_url() ?>anggota/lunas_murobahah/<?php echo $id_murobahah.'/'.$id_rekening?>" class="btn btn-sm btn-primary "> Pembiayaan Selesai </a>
				</div>
				<?php }?>
		
		<div class="col-md-12">
			<h3>Tabel cicilan</h3>
			<h4><?php 
			$datalunas = 1;
									$no = 0;
									$jumlah_desimal="2";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
                                                    $mata_uang2="";
			echo "Harga Jual Barang  : ".$mata_uang.number_format($hargajual,$jumlah_desimal,$pemisah_desimal,$pemisah_ribuan);
			?></h4>
			<h5><?php echo "Telah Dibayar &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp     : ".$mata_uang.number_format($jumlahbayar,$jumlah_desimal,$pemisah_desimal,$pemisah_ribuan); ?></h5>
			<h5><?php echo "Cicilan minimum : ".$mata_uang.number_format($cicilan,$jumlah_desimal,$pemisah_desimal,$pemisah_ribuan) ?></h5>
			<div class="panel panel-default">
				<div class="panel-heading">
				</br>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-stiped table-bordered table-hover" >
							<thead>
								<tr>
									<th>Cicilan ke</th>
									<th>Nominal</th>
									<th>Tanggal</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if(!empty($bayar_cicil)){
									$datalunas = 1;
									$no = 0;
									$jumlah_desimal="2";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
                                                    $mata_uang2="";
									foreach($bayar_cicil as $object){
										{
										echo "<tr>";
										echo "<td>".$object->cicilan_ke."</td>";
										echo "<td>".$mata_uang2.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
										echo "<td>".$object->date."</td>";
										echo "<td>".$object->keterangan."</td>";
										echo "</tr>";
										$no++;
										}
									}
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
				
				
			</div>
		</div>
		<!-- </div> -->
		<script type="text/javascript">
		var nominal = document.getElementById('txtnominal');
		function shownominal(){
              nominal = document.getElementById('txtnominal');
            function toRp(angka){
    							var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    							var rev2    = '';
    							
    							if(angka!=''){
    							for(var i = 0; i < rev.length; i++){
        						rev2  += rev[i];
        						if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            						rev2 += '.';
        						}
        						
    							}
    							}else{
    							rev2 = '0';
    							}
    							
    							return 'Rp. ' + rev2.split('').reverse().join('');
								}
            	var nom1 = nominal.value;
            	var nom2 = toRp(nom1);
            	
            	
            		document.getElementById('cek').innerHTML = nom2;	
            	
            	if(nominal.value.length >3){
            		document.getElementById('submitButton').disabled = false;
            	}else{
            		document.getElementById('submitButton').disabled = true;
            	}
            }
            </script>
	</div>
</div>