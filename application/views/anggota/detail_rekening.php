<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Rincian Rekening</h2>
                                <?php
if(isset($anggota)){
echo "<h4>Nama Anggota : ".$anggota2[0]->nama."</h4>";
echo "<h4>No Rekening : ".$anggota2[0]->no_rekening."</h4>";
if($anggota2[0]->dicabang==1){
echo "<h4>Cabang : Bandung</h4>";
}
if($anggota2[0]->dicabang==2){
echo "<h4>Cabang : Cilegon</h4>";
}
if($anggota2[0]->dicabang==3){
echo "<h4>Cabang : Serang</h4>";
}
}?>
	
				<!--<h3>Welcome Admin</h3>-->
				<h4><?php echo $error_msg; ?></h4>
			</div>
		</div>
		<hr/>
		<div class="row">
		<div class="col-md-12">
		<div class="btn-group">
			<div class="btn-group">
			<?php if($anggota2[0]->no_rekening != '35401160000'&& $anggota2[0]->no_rekening != '35402160000'&& $anggota2[0]->no_rekening != '35403160000'){ ?>
				<a href="<?php echo base_url();?>anggota/add_trans/<?php echo $id_rekening; ?>	" class="btn btn-primary btn-sm">Tambah Transaksi</a>
			<?php }else{?>
			<a href="<?php echo base_url();?>anggota/add_pettycash/<?php echo $id_rekening; ?>	" class="btn btn-primary btn-sm">Tambah pettycash</a>
			<?php }?>
			
		
				<?php if($anggota2[0]->no_rekening != '35401160000'&& $anggota2[0]->no_rekening !='35402160000'&& $anggota2[0]->no_rekening != '35403160000'){?>
							<a class="btn btn-primary btn-sm " href="<?php echo base_url(); ?>anggota/add_pembiayaan/<?php echo $id_rekening; ?>"> Tambah Transaksi Pembiayaan</a>
							<?php } ?>	
			</div>
			</div>
		</div>
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<div class="col-md-12">
				</div>
				<div class="panel-body">
					<ul class="nav nav-tabs">

						<li class="active"><a href="#tabarok_a" data-toggle="tab">Tabarok A</a></li>
						<li class=""><a href="#tarekah_a" data-toggle="tab">Tarekah A</a></li>
						<li class=""><a href="#tarekah_b" data-toggle="tab">Tarekah B</a></li>
						<li class=""><a href="#pokok_wajib" data-toggle="tab">Pokok / Wajib</a></li>
						<li class=""><a href="#pembiayaan" data-toggle="tab">Pembiayaan</a></li>
						<?php if($anggota2[0]->no_rekening == '35401160000'|| $anggota2[0]->no_rekening == '35402160000'|| $anggota2[0]->no_rekening == '35403160000'){?>
						<li class=""><a href="#pettycash" data-toggle="tab">Pettycash</a></li>
						<?php } ?>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade " id="pokok_wajib">
							<h4>Pokok / Wajib</h4>
							<b><h5>Saldo Pokok/Wajib : <?php
							$jumlah_desimal="2";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
                                                    $mata_uang2="";
							 if(isset($no_rekening[0]->saldo_pokok_wajib)){
							 echo $mata_uang.number_format($no_rekening[0]->saldo_pokok_wajib, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);}else{echo "RP 0";}
							?>   </h5></b>
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-stiped table-bordered table-hover" id="datarekening2">
										<thead>
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Nominal</th>
												<th>Keterangan</th>
											</tr>
										</thead>
										<tbody>
											<?php
												if (isset($pokok_wajib)) {
													$jumlah_desimal="2";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
                                                                                                        $mata_uang2="";
                                                    $no=1;
                                                    foreach($pokok_wajib as $object){
                                                    	echo "<tr class='odd gradeX'>";
                                                    		echo "<td>".$no."</td>";
                                                    		echo "<td>".$object->created_at."</td>";
                                                    		echo "<td>".$mata_uang2.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    		if($object->pokok_wajib == 0)
                                                    			echo "<td>Pokok</td>";
                                                    		else
                                                    			echo "<td>Wajib</td>";
                                                    	echo "</tr>";
                                                    	$no++;
                                                    }
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade active in" id="tabarok_a">
							<h4>Tabarok A</h4>
							<h5>Saldo Tabarok A : <?php 
							$jumlah_desimal="2";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
                                                                                                        $mata_uang2="";
							if(isset($no_rekening[0]->saldo_tabarok_a)){echo $mata_uang.number_format($no_rekening[0]->saldo_tabarok_a, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);}else{echo "RP 0";}
							?>   </h5>
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-stiped table-bordered table-hover" id="datarekening">
										<thead>
											<th>No Transaksi</th>
											<th>Tanggal</th>
											<th>Kode</th>
											<th>Tarik</th>
											<th>Setor</th>
											<th>Petugas</th>

											<th>Keterangan</th>
										</thead>
										<tbody>
											<?php
												if (isset($tabarok_a)) {
													$jumlah_desimal="2";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
                                                                                                        $mata_uang2="";
                                                    $no=1;
                                                    foreach($tabarok_a as $object){
                                                    	echo "<tr class='odd gradeX'>";

                                                    		echo "<td>".$object->no_transaksi."</td>";
                                                    		echo "<td>".$object->created_at."</td>";
																												echo "<td>0".$object->kode."</td>";
                                                    		if ($object->debit_kredit == 1){
                                                    			echo "<td></td>";
                                                    			echo "<td>".$mata_uang2.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    		} else {
                                                    			echo "<td>".$mata_uang2.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    			echo "<td></td>";
                                                    		}
																												echo "<td>".$object->petugas."</td>";
																												
																												echo "<td>".$object->keterangan."</td>";
                                                    	echo "</tr>";
                                                    	$no++;
                                                    }
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tarekah_a">
							<h4>Tarekah A</h4>
							<h5>Saldo Tarekah A : <?php 
							if(isset($no_rekening[0]->saldo_tarekah_a)){echo $mata_uang.number_format($no_rekening[0]->saldo_tarekah_a, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);}else{echo "RP 0";}?>   </h5>
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-stiped table-bordered table-hover" id="datarekening3">
										<thead>
											<th>No Transaksi</th>
											<th>Tanggal</th>
											<th>Tarik</th>
											<th>Setor</th>
											<!--<th>Bagi Hasil</th>-->
											<th>Waktu</th>
											<th>Petugas</th>

											<th>Keterangan</th>
										</thead>
										<tbody>
											<?php
												if (isset($tarekah_a)){
													$jumlah_desimal="2";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
                                                                                                        $mata_uang2="";
                                                    $no=1;
                                                    foreach($tarekah_a as $object){
                                                    	echo "<tr class='odd gradeX'>";
echo "<td>".$object->no_transaksi."</td>";
                                                    		echo "<td>".$object->created_at."</td>";
                                                    		if ($object->debit_kredit == 1){
                                                    			echo "<td></td>";
                                                    			echo "<td>".$mata_uang2.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    		} else {
                                                    			echo "<td>".$mata_uang2.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    			echo "<td></td>";
                                                    		}
                                                    		//echo "<td>".$mata_uang.number_format($object->bagi_hasil, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    		echo "<td>".$object->waktu." Bulan</td>";
																												echo "<td>".$object->petugas."</td>";
																												
																												echo "<td>".$object->keterangan;
																												echo "<a class='btn btn-primary' href='".base_url()."anggota/rinci_tarekah/".$object->id."'>Detail</a>";
																												
																												if(date('Y-m',strtotime($object->date.' +'.$object->waktu.' month'))<= date('Y-m'))
																												{
																													echo "&nbsp tarekah sudah berakhir &nbsp";
																													if($object->status==0){
																													echo "<a class='btn btn-primary' href='".base_url()."anggota/ambil_tarekah/".$object->id."'>ambil uang</a>";
																													}
																												}
																												
																												echo "</td>";
                                                    	echo "</tr>";
                                                    	$no++;
                                                    }
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tarekah_b">
							<h4>Tarekah B</h4>
							<h5>Saldo Tarekah B : <?php if(isset($saldo_tarekah_b[0])){echo $mata_uang.number_format($no_rekening[0]->saldo_tarekah_b, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);}else{echo "Rp 0";}?>   </h5>
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-stiped table-bordered table-hover" id="datarekening4">
										<thead>
											<th>No Transaksi</th>
											<th>Tanggal</th>
											<th>Tarik</th>
											<th>Setor</th>
											<th>Bagi Hasil</th>
											<th>Waktu</th>
											<th>Petugas</th>

											<th>Keterangan</th>
										</thead>
										<tbody>
											<?php
												if(isset($tarekah_b)){
													$jumlah_desimal="2";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
                                                    $mata_uang2="";                                                    $mata_uang2="";
                                                    $no=1;
                                                    foreach($tarekah_b as $object){
                                                    	echo "<tr class='odd gradeX'>";
echo "<td>".$object->no_transaksi."</td>";
                                                    		echo "<td>".$object->created_at."</td>";// tanggal
                                                    		if ($object->debit_kredit == 1){
                                                    			echo "<td></td>";
                                                    			echo "<td>".$mata_uang2.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    		} else {
                                                    			echo "<td>".$mata_uang2.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    			echo "<td></td>";
                                                    		}// debit/kredit
                                                    		echo "<td>".$mata_uang2.number_format($object->bagi_hasil, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";//bagihasil
                                                    		echo "<td>".$object->waktu."</td>";//waktu
																												echo "<td>".$object->petugas."</td>";
																												
																												echo "<td>".$object->keterangan."</td>";
                                                    	echo "</tr>";
                                                    	$no++;
                                                    }
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pembiayaan">
							<!-- pembiayaan murobahah -->
									
							<br>				
							<h4>Pembiayaan Murabahah</h4>
							
							<br>
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-stiped table-bordered table-hover" id="dataTables-example4">
										<thead>
											<th>No</th>
											<th>Nama barang</th>
											<?php if($anggota2[0]->no_rekening == '35401160000'|| $anggota2[0]->no_rekening == '35402160000'|| $anggota2[0]->no_rekening == '35403160000'){?>
											<th>Harga Beli</th>
											<?php } ?>
											<th>Harga Jual</th>
											<th>Cicilan</th>
											<th>Bulan</th>
											<?php if($anggota2[0]->no_rekening == '35401160000'|| $anggota2[0]->no_rekening == '35402160000'|| $anggota2[0]->no_rekening == '35403160000'){?>
											<th>Margin</th>
											<?php }?>
											<th>Tanggal</th>
											<th>Lunas/Belum</th>
											<th>Keterangan</th>
										</thead>
										<tbody>
											<?php
												if(isset($pembiayaan)){

													$jumlah_desimal="2";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
                                                    $mata_uang2="";                                                    $mata_uang2="";
                                                    $no=1;
                                                    foreach($pembiayaan as $object){
                                                    	echo "<tr class='odd gradeX'>";
                                                    	echo "<td>".$no."</td>";
                                                    	
                                                    	echo "<td>".$object->nama_barang."</td>";
                                                    	if($anggota2[0]->no_rekening == '35401160000'|| $anggota2[0]->no_rekening == '35402160000'|| $anggota2[0]->no_rekening == '35403160000'){
                                                    	echo "<td>".$mata_uang2.number_format($object->harga_beli, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";}
                                                    	echo "<td>".$mata_uang2.number_format($object->harga_jual, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    	echo "<td>".$object->cicilan."</td>";
                                                    	echo "<td>".$object->bulan."</td>";
                                                    	if($anggota2[0]->no_rekening == '35401160000'|| $anggota2[0]->no_rekening == '35402160000'|| $anggota2[0]->no_rekening == '35403160000'){
                                                    	echo "<td>".$object->margin."</td>";
                                                    	}
                                                    	echo "<td>".$object->date."</td>";// tanggal
                                                    	if ($object->lunas_belum == 1){
                                                    		echo "<td>lunas</td>";
                                                    			
                                                    	} else {
                                                    		echo "<td>belum</td>";
                                                    	}// debit/kredit
                                                    	if($anggota2[0]->no_rekening == '35401160000'|| $anggota2[0]->no_rekening == '35402160000'|| $anggota2[0]->no_rekening == '35403160000'){
                                                    		echo "<td>".$object->keterangan."</td>";
                                                    	}else{
                                                    	echo "<td><a class='btn btn-primary btn-sm' href=".base_url()."anggota/detail_pembiayaan_murobahah/".$object->id."/".$anggota2[0]->id.">Detail</a>".$object->keterangan."</td>";	
                                                    	}
                                                    				
                                                    																											
                                                    	echo "</tr>";
                                                    	$no++;
                                                    }
												}
											?>
										</tbody>
									</table>
								</div>
							</div>

							<div style="width: 100%; height: 3px; background: red; overflow: hidden;">
							</div>
							<!-- pembiayaan mudhorobah -->
							<h4>Pembiayaan Mudhorobah</h4>
							<h4> </h4>
							<br>
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-stiped table-bordered table-hover" id="dataTables-example5">
										<thead>
											<th>No</th>
											<th>Nama Usaha</th>
											<?php if($anggota2[0]->no_rekening == '35401160000'|| $anggota2[0]->no_rekening == '35402160000'|| $anggota2[0]->no_rekening == '35403160000'){?>
											<?php } ?>
											<th>Pembiayaan</th>
											<th>Cicilan</th>
											<th>Bulan</th>
											<th>Bagi Hasil</th>
											<th>Tanggal</th>
											<th>Lunas/Belum</th>
											<th>Keterangan</th>
										</thead>
										<tbody>
											<?php
												if(isset($pembiayaan_2)){

													$jumlah_desimal="2";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
                                                    $mata_uang2="";                                                    $mata_uang2="";
                                                    $no=1;
                                                    foreach($pembiayaan_2 as $object){
                                                    	echo "<tr class='odd gradeX'>";
                                                    	echo "<td>".$no."</td>";
                                                    	
                                                    	echo "<td>".$object->nama_usaha."</td>";
                                                    	echo "<td>".$mata_uang2.number_format($object->pembiayaan, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    	echo "<td>".$mata_uang2.number_format($object->cicilan_perbulan, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    	echo "<td>".$object->bulan."</td>";
                                                    	echo "<td>".$object->bagihasil."</td>";
                                                    	if($anggota2[0]->no_rekening == '35401160000'|| $anggota2[0]->no_rekening == '35402160000'|| $anggota2[0]->no_rekening == '35403160000'){
                                                    	echo "<td>".$object->bulan."</td>";
                                                    	}
                                                    	echo "<td>".$object->tanggal."</td>";// tanggal
                                                    	if ($object->lunas_belum == 1){
                                                    		echo "<td>lunas</td>";
                                                    			
                                                    	} else {
                                                    		echo "<td>belum</td>";
                                                    	}// debit/kredit
                                                    	if($anggota2[0]->no_rekening == '35401160000'|| $anggota2[0]->no_rekening == '35402160000'|| $anggota2[0]->no_rekening == '35403160000'){
                                                    		echo "<td>".$object->keterangan."</td>";
                                                    	}else{
                                                    	echo "<td><a class='btn btn-primary btn-sm' href=".base_url()."anggota/detail_pembiayaan_mudhorobah/".$object->id."/".$anggota2[0]->id.">Detail</a>".$object->keterangan."</td>";	
                                                    	}
                                                    				
                                                    																											
                                                    	echo "</tr>";
                                                    	$no++;
                                                    }
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade " id="pettycash">
							<h4>Pettycash</h4>
							<!-- <b><h5>Saldo Pokok/Wajib : <?php
							$jumlah_desimal="2";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
                                                    $mata_uang2="";
							 if(isset($no_rekening[0]->saldo_pokok_wajib)){
							 echo $mata_uang.number_format($no_rekening[0]->saldo_pokok_wajib, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);}else{echo "RP 0";}
							?>   </h5></b> -->
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-stiped table-bordered table-hover" id="dataTables-example5">
										<thead>
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Nominal</th>
												<th>Keterangan</th>
											</tr>
										</thead>
										<tbody>
											<?php
												if (isset($pokok_wajib)) {
													$jumlah_desimal="2";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
                                                                                                        $mata_uang2="";
                                                    $no=1;
                                                    foreach($pettycash as $object){
                                                    	echo "<tr class='odd gradeX'>";
                                                    		echo "<td>".$no."</td>";
                                                    		echo "<td>".$object->date."</td>";
                                                    		echo "<td>".$mata_uang2.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    		echo "<td>".$object->keterangan."</td>";
                                                    	echo "</tr>";
                                                    	$no++;
                                                    }
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
