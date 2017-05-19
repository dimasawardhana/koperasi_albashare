<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Rincian Anggota</h2>
				<h3>Selamat Datang</h3>
				<?php if (isset($error_msg))
                  {
                    echo $error_msg;
                  }
                ?>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-12">
				<h4>Nama Anggota : <?php echo $anggota2[0]->nama;?></h4>
				<a href="#" class="btn btn-primary btn-sm col-sm-4"
				 title="Rincian Anggota" data-toggle="popover" data-placement="right"
				 data-html = "true"
				 data-content=
				 "<?php
				 	echo "<h6>Alamat : ".$anggota2[0]->alamat."</h6>";
				 	echo "<h6>Email : ".$anggota2[0]->email."</h6>";
				 	echo "<h6>Kota : ".$anggota2[0]->City."</h6>";
				 	echo "<h6>Cabang : ".$anggota2[0]->cabang."</h6>";
				 	if($anggota2[0]->jenis_kelamin='P'){echo "<h6>Jenis kelamin : Perempuan </h6>";}
				 	else{echo "<h6>Jenis kelamin : Laki-Laki</h6>";}
				 	echo "<h6>No HP : ".$anggota2[0]->HP."</h6>";
				 	echo "<h6>No Identitas : ".$anggota2[0]->identity."</h6>";
				 	echo "<h6>Pekerjaan : ".$anggota2[0]->job."</h6>";
				 	?>
				 ">
				  Rincian Anggota</a>
				
			</div>
		</div>
		
		
		<br/>	
		<div class="row">
			<!-- <div class="col-md-12">
				<div class="panel panel-success">
					<div class="panel-heading">
						Success Panel
					</div>
					<div class="panel-body">
						<p>Success</p>
					</div>
				</div>
			</div> -->
		</div>
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Daftar No Rekening
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-stiped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>No</th>
									<th>Action</th>
									<th>No Rekening</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(isset($no_rekening))
									{
										$no = 0;
										foreach($no_rekening as $object)
										{
											$no++;
								?>
											<tr>
												<td><?php echo $no;?></td>
												<td><a href="<?php echo base_url();?>anggota/detail_rekening/<?php echo $object->id?>" class="btn btn-primary btn-sm">Detail</a></td>
												<td><?php echo $object->no_rekening;?></td>
											</tr>
								<?php
										}
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10">
				<a href="<?php echo base_url();?>anggota/load_LastRek/<?php echo $id_anggota; ?>				 
				" class="btn btn-primary btn-sm col-sm-4">Tambah Rekening</a>
				
			</div>
		</div>
		<!-- </div> -->
	</div>
</div>