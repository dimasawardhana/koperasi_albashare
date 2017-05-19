<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Daftar Anggota</h2>
				<h3>Selamat Datang</h3>
			</div>
		</div>
		<hr/>
		
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
					Daftar Anggota
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-stiped table-bordered table-hover " id="dataTables-example" >
							<thead style="display:blocked;">
								<tr>
									<th>No</th>
									<th>Nama</th>
                                    <th>No Rekening</th>
								</tr>
							</thead>
							<tbody style="overflow-x :auto;">
								<?php
									if(isset($anggota))
									{
										$no = 0;
										foreach($anggota as $object)
										{
											if($admin[0]->role==1||$admin[0]->id_cabang== $object->cabang){
											$no++;
								?>
								
											<tr>
												<td><?php echo $no;?></td>
												<td>
												<?php echo $object->nama;?>
												<div class="dropdown" style="float: right;">
												<button class="btn btn-primary btn-md dropdown-toggle" type="button" data-toggle="dropdown">Action
												<span class="caret"></span>
												</button>
												<ul class="dropdown-menu dropdown-right">
                                                <li><a href="<?php echo base_url();?>anggota/detail_anggota/<?php echo $object->id_anggota;?>" >Detail Anggota </a> </li>
                                                <li><a href="<?php echo base_url();?>anggota/detail_rekening/<?php echo $object->id_rekening;?>" >Detail rekening</a> </li>
                                                <?php if($object->id_anggota!='0'){?>
                                                <li><a href="<?php echo base_url();?>anggota/add_trans/<?php echo $object->id_rekening; ?>	" >Tambah Transaksi</a></li>
                                                <?php } ?>
												</ul>
												</div>
                                                
												</td>
                                                <td><?php echo $object->no_rekening;?></td>
											</tr>
								<?php
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
	</div>
</div>