<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Log Transaksi</h2>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-12">
				<!--<a href="<?php echo base_url();?>dashboard/export/alltrans" class="btn btn-primary btn-sm">Export data</a>
				-->
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
				<div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"> <a href="#tab-keseluruhan" data-toggle ="tab">Keseluruhan</a></li>
                        <li> <a href="#tab-pokokwajib" data-toggle ="tab">Pokok Wajib</a></li>
                        <li> <a href="#tab-tabarokA" data-toggle ="tab">Tabarok A</a></li>
                        <li> <a href="#tab-tarekahA" data-toggle ="tab">Tarekah A</a></li>
                        <li> <a href="#tab-tarekahB" data-toggle ="tab">Tarekah B</a></li>
                        <li> <a href="#tab-laporan" data-toggle ="tab">Laporan per bulan</a></li>
                        <li> <a href="#tab-laporanhari" data-toggle ="tab">Laporan per hari</a></li>
                    </ul>
					<div class="tab-content">
					<div class="tab-pane fade active in" id="tab-keseluruhan">
						<div class="row">
						<div class="col-md-6">
						<h4>Log Keseluruhan <button onclick="printData('sorted3desc')" class="btn btn-primary btn-sm" >print me</button></h4>
						</div>
						</div>
						<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-stiped table-bordered table-hover " id="sorted3desc" >
							<thead>
								<tr>
									<th>No Transaksi</th>									
									<th>No Rekening</th>
									<th>Nama</th>
									<th>Cabang</th>
									<th>Tanggal</th>
									<th>Kode</th>
									<th>Setor</th>
                                                                        <th>Tarik</th>
									<th>Petugas</th>

									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
								<?php
                    if(isset($alltrans)){
$jumlah_desimal="2";
$pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="";
											$no = 1;
											foreach ($alltrans as $object) {
												# code...
												if($admin[0]->role==1||$admin[0]->id_cabang== $object->cabang){
												if($object->nama!='ALBASHARE'){
												echo "<tr>";
												echo "<td>".$object->no_transaksi."</td>";
												echo "<td><a href='".base_url()."anggota/detail_rekening/".$object->id."'>".$object->no_rekening ."</a></td>";
												echo "<td>".$object->nama."</td>";
												echo "<td>".$object->cabang."</td>";
												echo "<td>".$object->created_at."</td>";
												echo "<td>0".$object->kode."</td>";
												if($object->debit_kredit==1){
												echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
												echo "<td> </td>";
												}
												else{
													echo "<td></td>";
													echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
												}
												echo "<td>".$object->petugas."</td>";

												echo "<td>".$object->keterangan."</td>";
												echo "</tr>";
												$no++;
												}
											}
											}
										}
									?>
							</tbody>
						</table>
					</div>
				 </div>
				</div>
					<div class="tab-pane fade" id="tab-pokokwajib">
						<h4>Log Pokok Wajib <button onclick="printData('dataTables-example2')" class="btn btn-primary btn-sm" >print me</button></h4>
						<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-stiped table-bordered table-hover" id="dataTables-example2">
								<thead>
									<tr>
										<th>No</th>
										<th>No rekening</th>
										<th>Nama</th>
										<th>Cabang</th>
										<th>Nominal</th>
										<th>Tanggal Transaksi</th>
										<th>Setor/Tarik</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if(isset($transaksi1)){
$jumlah_desimal="2";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="";
										$no=1;
										foreach ($transaksi1 as $object) {
												if($admin[0]->role==1||$admin[0]->id_cabang== $object->cabang){
											# code...
											if($object->nama!='ALBASHARE'){
											echo "<tr>";
											echo "<td>".$no. "</td>";
											echo "<td><a href='".base_url()."anggota/detail_rekening/".$object->id_rekening."'>".$object->no_rekening ."</a></td>";
											echo "<td>".$object->nama ."</td>";
											echo "<td>".$object->cabang."</td>";
											echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
											echo "<td>".$object->created_at."</td>";
											if($object->pokok_wajib==1){
												echo "<td>Pokok</td>";
											}
											else{
												echo"<td>Wajib</td>";
											}
											echo "</tr>";
											$no++;
											}
										}
										}
									}
									 ?>
								</tbody>
							</table>
						</div>
					</div>
					</div>
					<div class="tab-pane fade" id="tab-tabarokA">
						<h4>Log Tabarok A <button onclick="printData('dataTables-example3')" class="btn btn-primary btn-sm" >print me</button></h4>
						<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-stiped table-bordered table-hover table-font-sized" id="dataTables-example3">
								<thead>
									<tr>
										<th>No</th>
										<th>No rekening</th>
										<th>Tanggal Transaksi</th>
										<th>Kode</th>
										<th>Nama</th>
										<th>cabang</th>
										<th>Setor</th>
										<th>Tarik</th>
										<th>Petugas</th>
										<th>No Transaksi</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if(isset($transaksi2)){
$jumlah_desimal="2";
                                                     $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="";										                                     $no=1;
										foreach ($transaksi2 as $object) {
											if($admin[0]->role==1||$admin[0]->id_cabang== $object->cabang){
											# code...
											if($object->nama!='ALBASHARE'){
											echo "<tr>";
											echo "<td>".$no. "</td>";
											echo "<td><a href='".base_url()."anggota/detail_rekening/".$object->id_rekening."'>".$object->no_rekening ."</a></td>";
											echo "<td>".$object->created_at."</td>";
											echo "<td>0".$object->kode."</td>";
											echo "<td>".$object->nama ."</td>";
											echo "<td>".$object->cabang."</td>";
											if($object->debit_kredit==1){
												echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
												echo "<td></td>";
											}
											else{
												echo"<td></td>";
												echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
											}
											echo "<td>".$object->petugas."</td>";
											echo "<td>".$object->no_transaksi."</td>";
											echo "<td>".$object->keterangan."</td>";
											echo "</tr>";
											$no++;
											}
										}
										}
									}
									 ?>
								</tbody>
							</table>
						</div>
					</div>
					</div>

					<div class="tab-pane fade" id="tab-tarekahA">
						<h4>Log Tarekah A <button onclick="printData('dataTables-example4')" class="btn btn-primary btn-sm" >print me</button></h4>
						<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-stiped table-bordered table-hover " id="dataTables-example4">
								<thead>
									<tr>
										<th>No</th>
										<th>No rekening</th>
										<th>Nama</th>
										<th>Cabang</th>
										<th>Tanggal Transaksi</th>
										<th>Setor</th>
										<th>Tarik</th>
										<th>Petugas</th>
										<th>No Transaksi</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if(isset($transaksi3)){
$jumlah_desimal="2";
                                                                                 $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="";
										$no=1;
										foreach ($transaksi3 as $object) {
											if($admin[0]->role==1||$admin[0]->id_cabang== $object->cabang){
											# code...
											if($object->nama!='ALBASHARE'){
											echo "<tr>";
											echo "<td>".$no. "</td>";
											echo "<td><a href='".base_url()."anggota/detail_rekening/".$object->id_rekening."'>".$object->no_rekening ."</a></td>";
											echo "<td>".$object->nama ."</td>";
											echo "<td>".$object->cabang."</td>";
											echo "<td>".$object->created_at."</td>";
											if($object->debit_kredit!=1){
												echo "<td></td>";
												echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
											}
											else{
												echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
												echo"<td></td>";
											}
											echo "<td>".$object->petugas."</td>";
											echo "<td>".$object->no_transaksi."</td>";
											echo "<td>".$object->keterangan."</td>";
											echo "</tr>";
											$no++;
											}
										}
										}
									}
									 ?>
								</tbody>
							</table>
						</div>
						</div>
					</div>

					<div class="tab-pane fade" id="tab-tarekahB">
						<h4>Log Tarekah B <button onclick="printData('dataTables-example5')" class="btn btn-primary btn-sm" >print me</button></h4>
						<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-stiped table-bordered table-hover " id="dataTables-example5">
								<thead>
									<tr>
										<th>No</th>
										<th>No rekening</th>
										<th>Nama</th>
										<th>Cabang</th>
										<th>Tanggal Transaksi</th>
										<th>Setor</th>
										<th>Tarik</th>
										<th>Petugas</th>
										<th>No Transaksi</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if(isset($transaksi4)){
$jumlah_desimal="2";
                                                                                $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="";
										$no=1;
										foreach ($transaksi4 as $object) {
											if($admin[0]->role==1||$admin[0]->id_cabang== $object->cabang){
											# code...
											if($object->nama!='ALBASHARE'){
											echo "<tr>";
											echo "<td>".$no. "</td>";
											echo "<td><a href='".base_url()."anggota/detail_rekening/".$object->id_rekening."'>".$object->no_rekening ."</a></td>";
											echo "<td>".$object->nama ."</td>";
											echo "<td>".$object->cabang."</td>";
											echo "<td>".$object->created_at."</td>";
											if($object->debit_kredit!=1){
												echo "<td></td>";
												echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
											}
											else{
												echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
												echo"<td></td>";
											}
											echo "<td>".$object->petugas."</td>";
											echo "<td>".$object->no_transaksi."</td>";
											echo "<td>".$object->keterangan."</td>";
											echo "</tr>";
											$no++;
											}
										}
										}
									}
									 ?>
								</tbody>
							</table>
						</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tab-laporan">
						<h4>Log Laporan <button onclick="printData('laporan')" class="btn btn-primary btn-sm" >print me</button></h4>
						<div class="col-md-12">
						<div class="form-group">
						<label class="control-label col-sm-2">Start at :</label>
							<div class="col-sm-2">
						<select id = "filteran2" onchange="" value="Al" class="form-control col-sm-3">
							<option value="01">Januari</option><option value="02">Februari</option>
							<option value="03">Maret</option><option value="04">April</option>
							<option value="05">Mei</option><option value="06">Juni</option>
							<option value="07">Juli</option><option value="08">Agustus</option>
							<option value="09">September</option><option value="10">Oktober</option>
							<option value="11">November</option><option value="12">Desember</option>
							
						</select>
							</div>
							<div class="col-sm-2">
						<select id ="filteran" onchange="" value="ALL1" class="form-control col-sm-3">
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							
						</select>
							</div>
							<div class="col-sm-6">
							<input type="checkbox" id="cabang1" checked>Cabang Bandung &nbsp</input>
							<input type="checkbox" id="cabang2" checked>Cabang Cilegon &nbsp</input>
							<input type="checkbox" id="cabang3" checked>Cabang Serang </input>
							</div>
						</div>
						</div>
						<div class="col-md-12">
						<div class="form-group">
						<label class="control-label col-sm-2">End at :</label>
							<div class="col-sm-2">
						<select id = "filteran4" onchange="" value="AL" class="form-control col-sm-3">
							<option value="01">Januari</option><option value="02">Februari</option>
							<option value="03">Maret</option><option value="04">April</option>
							<option value="05">Mei</option><option value="06">Juni</option>
							<option value="07">Juli</option><option value="08">Agustus</option>
							<option value="09">September</option><option value="10">Oktober</option>
							<option value="11">November</option><option value="12">Desember</option>
							
						</select>
							</div>
							<div class="col-sm-2">
						<select id ="filteran3" onchange="" value="ALL1" class="form-control col-sm-3">
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
						</select>
							</div>
							
						</div>
						</div>
						<div class="col-md-12">
						<div class="form-group">
						</div>
						</div>
						<div class="col-md-12">
						<div class="form-group">
						<button class="btn btn-primary col-md-5" onclick="getFilter()">Proses</button>
						</div>
						</div>
<div class="col-md-12">
						<div class="form-group">
						</div>
						</div>
						<div class="table-responsive" >

							<table class="table table-stiped table-bordered table-hover " id="laporan" style="overflow-x : hidden;" >
								<thead>
									<tr>
										<th>No</th>
										<th>No rekening</th>
										<th>Nama</th>
										<th>Cabang</th>
										<th>Pemasukan</th>
										<th>Pengeluaran</th>
										<th>sipokwa</th>
										<th>bbh</th>
										<th>Saldo</th>
										<th>Tanggal</th>

									</tr>
								</thead>
								<tbody id='laporanperbulan'>
									<?php

									if(isset($laporan)){
$jumlah_desimal="2";
                                                                                $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
//echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
										$no=1;
										foreach ($laporan as $object) {
											if($admin[0]->role==1||$admin[0]->id_cabang== $object->cabang){
											# code...
											if($object->nama!='ALBASHARE'){
											echo "<tr>";
											echo "<td>".$no. "</td>";
											echo "<td><a href='".base_url()."anggota/detail_rekening/".$object->id."'>".$object->no_rekening ."</a></td>";
											echo "<td>".$object->nama ."</td>";
											echo "<td>".$object->cabang."</td>";
											echo "<td>".$mata_uang.number_format($object->pemasukkan, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
											echo "<td>".$mata_uang.number_format($object->pengeluaran, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
											echo "<td>".$mata_uang.number_format($object->nominal_pokwa, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
											echo "<td>".$mata_uang.number_format($object->bbh, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
											echo "<td>".$mata_uang.number_format($object->total - $object->bbh, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
											echo "<td>".$object->perbulan."</td>";
											echo "</tr>";
											$no++;
											}
										}
										}
									}
									 ?>
									 <tr>
									 <td colspan ="4">JUMLAH</td>
									 <td>Rp 0</td><!-- Pemasukan-->
									 <td>Rp 0</td><!-- Pengeluaran-->
									 <td>Rp 0</td><!-- pokwa-->
									 <td>Rp 0</td>
									 <td>Rp 0</td>
									 <td>hasil</td>
									 </tr>
								</tbody>
								<script>
								
								function getFilter(){
									function toRp(angka){
    							var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    							var rev2    = '';
    							if(angka!=0){
    							rev2 += rev[0];
    							rev2 += rev[1];
    							rev2 += ',';
    							for(var i = 2; i < rev.length; i++){
        						rev2  += rev[i];
        						if((i + 1) % 3 === 2 && i !== (rev.length - 1)){
            						rev2 += '.';
        						}
        						
    							}
    							}
    							else{
    							rev2 = '00,0'
    							}
    							return 'Rp. ' + rev2.split('').reverse().join('');
								}
									var tabel = document.getElementById('laporanperbulan');
									var input = document.getElementById('filteran');// tahun
									var input2 = document.getElementById('filteran2');//bulan
									var input3 = document.getElementById('filteran3');// tahun
									var input4 = document.getElementById('filteran4');// tahun
									var filter = new Date(input.value+"-"+ input2.value);
									var filter2 = new Date(input3.value+"-"+ input4.value);
									var cek1 = document.getElementById('cabang1');
									var cek2 = document.getElementById('cabang2');
									var cek3 = document.getElementById('cabang3');
									var tr = tabel.getElementsByTagName("tr");
									var pemasukan = 0;
									var pengeluaran = 0;
									var pokwa = 0;
									var bbh = 0;
									var total = 0;

									//loop through all table rows, and hide who doesn't match the search query
									for(var i = 0; i<tr.length-1;i++){
										td = tr[i].getElementsByTagName("td")[9];

										comparable = new Date(td.innerHTML);
										if(td){
if((cek1.checked&&tr[i].getElementsByTagName("td")[3].innerHTML=='1')||(cek2.checked&&tr[i].getElementsByTagName("td")[3].innerHTML=='2')||(cek3.checked&&tr[i].getElementsByTagName("td")[3].innerHTML=='3')){	
										if((comparable>=filter&& comparable<=filter2)){//cek tahun
												// cek bulan
												
									
													tr[i].style.display = "";	
													pemasukan = parseInt(tr[i].getElementsByTagName("td")[4].innerHTML.replace(/[^0-9+]/g, "")) + parseInt(pemasukan);
													pengeluaran = parseInt(tr[i].getElementsByTagName("td")[5].innerHTML.replace(/[^0-9+]/g, "")) + parseInt(pengeluaran);
													pokwa = parseInt(tr[i].getElementsByTagName("td")[6].innerHTML.replace(/[^0-9+]/g, "")) + parseInt(pokwa);
													bbh = parseInt(tr[i].getElementsByTagName("td")[7].innerHTML.replace(/[^0-9+]/g, "")) + parseInt(bbh);
													total = parseInt(tr[i].getElementsByTagName("td")[8].innerHTML.replace(/[^0-9+]/g, "")) + parseInt(total);
											}
											
											
											else{
											tr[i].style.display = "none";
											}
										}
									}
									else{
											tr[i].style.display = "none";
											}
									td = tr[tr.length-1].getElementsByTagName("td")[1];//pemasukan
									//console.log(pemasukan);
										td.innerHTML =  toRp(pemasukan) ;
									
									td = tr[tr.length-1].getElementsByTagName("td")[2];//pengeluaran
										td.innerHTML = toRp(pengeluaran);
									td = tr[tr.length-1].getElementsByTagName("td")[3];//pengeluaran
										td.innerHTML = toRp(pokwa);
									td = tr[tr.length-1].getElementsByTagName("td")[4];//pengeluaran
										td.innerHTML = toRp(bbh);
									td = tr[tr.length-1].getElementsByTagName("td")[5];//pengeluaran
										td.innerHTML = toRp(total);
								}
							}
									 
								</script>
							</table>
						</div>
					</div>
<div class="tab-pane fade" id="tab-laporanhari">
						<h4>Log Laporan <button onclick="printData('dataTables-example7')" class="btn btn-primary btn-sm" >print me</button></h4>
						<div class="col-md-12">
						<div class="form-group">
						<label class="control-label col-sm-2">Start at :</label>
<div class="col-sm-2">
<select id ="filter5" onchange="" value="AL" class="form-control col-sm-3">
<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
<option value="6">6</option>6<option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
<option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
<option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
<option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option>
<option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="AL" selected>semua</option>
</select>
<input type="date" id="startHari" name="startHari" class="form-control">
</div>
							<div class="col-sm-2">
						<select id = "filter2" onchange="" value="Al" class="form-control col-sm-3">
							<option value="01">Januari</option><option value="02">Februari</option>
							<option value="03">Maret</option><option value="04">April</option>
							<option value="05">Mei</option><option value="06">Juni</option>
							<option value="07">Juli</option><option value="08">Agustus</option>
							<option value="09">September</option><option value="10">Oktober</option>
							<option value="11">November</option><option value="12">Desember</option>
							<option value="AL" selected>Semua</option>
						</select>
							</div>
							<div class="col-sm-2">
						<select id ="filter1" onchange="" value="ALL1" class="form-control col-sm-3">
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="ALL1" selected>Semua</option>
						</select></div>
							
</div>
</div>
<div class="col-md-12">
<div class="form-group">
						
						</div>
</div>
						<div class="form-group">
						<div class="col-md-12">
						<label class="control-label col-sm-2">End at :</label>
							<div class="col-sm-2">

<select id ="filter6" onchange="" value="AL" class="form-control col-sm-3">
<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
<option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
<option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
<option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
<option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option>
<option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="AL" selected>semua</option>

</select>
<input type="date" id="endHari" name="endHari" class="form-control">
</div>
							<div class="col-sm-2">
						<select id = "filter4" onchange="" value="AL" class="form-control col-sm-3">
							<option value="01">Januari</option><option value="02">Februari</option>
							<option value="03">Maret</option><option value="04">April</option>
							<option value="05">Mei</option><option value="06">Juni</option>
							<option value="07">Juli</option><option value="08">Agustus</option>
							<option value="09">September</option><option value="10">Oktober</option>
							<option value="11">November</option><option value="12">Desember</option>
							<option value="AL" selected>Semua</option>
						</select></div>

							<div class="col-sm-2">
						<select id ="filter3" onchange="" value="ALL1" class="form-control col-sm-3">
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="ALL1" selected>Semua</option>
						</select>
</div>



						</div>
						<div class="col-md-12">
						<div class="form-group">
						</div>
						</div>
						<div class="col-md-12">
						<div class="form-group">
						<button class="btn btn-primary col-md-5" onclick="getFilter2()">Proses</button>
						</div>
						</div>
						<div class="col-md-12">
						<div class="form-group">
						</div>
						</div>
						<div class="table-responsive">

							<table class="table table-stiped table-bordered table-hover " id="dataTables-example7">
								<thead>
									<tr>
										<th>No</th>
										<th>No rekening</th>
										<th>Nama</th>
										<th>Pemasukan</th>
										<th>Pengeluaran</th>
										<th>Tanggal</th>
									</tr>
								</thead>
								<tbody id='laporanperhari'>
									<?php
									if(isset($laporan)){
													$jumlah_desimal="2";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
//echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
										$no=1;
										foreach ($perhari as $object) {
											if($admin[0]->role==1||$admin[0]->id_cabang== $object->cabang){
											# code...
											if($object->nama!='ALBASHARE'){
											echo "<tr>";
											echo "<td>".$no. "</td>";
											echo "<td><a href='".base_url()."/anggota/detail_rekening/".$object->id."'>".$object->no_rekening ."</a></td>";
											echo "<td>".$object->nama ."</td>";
											echo "<td>".$mata_uang.number_format($object->pemasukkan, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
											echo "<td>".$mata_uang.number_format($object->pengeluaran, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
											echo "<td>".$object->date."</td>";
											echo "</tr>";
											$no++;
											}
										}
										}
									}
									 ?>
									 
								</tbody>
								<script>
								function filterDate(id1,id2){
									var input1 = document.getElementById(id1).value;
									var input2 = document.getElementById(id2).value;
									var startDate = new Date(input1);
									var endDate = new Date(input2);
									return (startDate>endDate)
								}
								function printData(vartoprint)
{
   var divToPrint=document.getElementById(vartoprint);
   var htmlToPrint = '' +
        '<style type="text/css">' +
		'table{'+
		'border-collapse:collapse;' +
		'}'+
        'table th, table td {' +
		
        'border:1px solid #000;' +
        'padding;0.5em;' +
		
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
   newWin= window.open("");
   newWin.document.write(htmlToPrint);
   newWin.print();
   newWin.close();
}
								function getFilter2(){
									var inputA = document.getElementById('startHari').value;
									var inputB = document.getElementById('endHari').value;
									var startDate = new Date(inputA);
									var endDate = new Date(inputB);
									var tabel = document.getElementById('laporanperhari');
									var input = document.getElementById('filter1');// tahun
									var input2 = document.getElementById('filter2');//bulan
									var input3 = document.getElementById('filter3');// tahun
									var input4 = document.getElementById('filter4');// tahun
									var input5 = document.getElementById('filter5');// tahun
									var input6 = document.getElementById('filter6');// tahun
									var filter = input.value+"-"+ input2.value+"-"+input5.value;
									var filter2 = input3.value+"-"+ input4.value+"-"+input6.value;
									var tr = tabel.getElementsByTagName("tr");
									

																																																						
									
									
									//loop through all table rows, and hide who doesn't match the search query
									for(var i = 0; i<tr.length;i++){
										td = tr[i].getElementsByTagName("td")[5];	
										var comparable = new Date(td.innerHTML);
									if(td){
											if(comparable>=startDate && comparable <=endDate){// cek tahun
													tr[i].style.display = "";	
												
												}
											else{
													tr[i].style.display = "none";	
											}
										}
									}

								}
									 
								</script>
							</table>
						</div>
					</div>
					</div>
				</div>
				</div>
				
				</div>
			</div>
		</div>
		<!-- </div> -->
	</div>
</div>