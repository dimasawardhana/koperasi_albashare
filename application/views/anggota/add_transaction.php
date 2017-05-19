<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Tambah Transaksi</h2>
                <h5>Tolong isi Form berikut untuk melanjutkan </h5>
                <?php if (isset($account_updated))
                  {
                    echo $account_updated;
                  }

                ?>
                
            </div>
        </div>
        <hr>

        <div class="row">




          <form class="form-horizontal" role="form" action="<?php echo base_url();?>Anggota/process_addtrans/<?php echo $id_rekening; ?>" method="POST">
`<div class="form-group">
<div class = "col-sm-12">
<?php
                 if(!empty($anggota)){
echo "<h5 class='text-left'>Nama Anggota : ".$anggota[0]->nama."</h5>";
echo "<h5 class='text-left'>Cabang : ";
if($anggota[0]->cabang == '1'){echo "Bandung";}
if($anggota[0]->cabang == '2'){echo "Cilegon";}
if($anggota[0]->cabang == '3'){echo "Serang";}
echo "</h5>";
echo "<h5 class='text-left'>No Rekening  : ".$anggota[0]->no_rekening."</h5>";
} ?>
</div>
</div>
          <div class="form-group">
               <label name='pilihan_Label' id='lblpilihan' class ='control-label col-md-2'>Jenis Transaksi</label>
            <div class="col-sm-4">
              <select id="pilihan" name="pilihan" class ="form-control col-sm-3" >
               <option value="2">Tabarok A</option>
               <option value="3">Tarekah A</option>
               <option value="4">Tarekah B</option>
              </select>
            </div>
          </div>

          <div id="form_trans" class="form-group">
            <!-- form isian -->
            <div class="form-group">
              <label name='nom_Label' id='lblnominal' class ='control-label col-md-2'>Nominal</label>
              <div class='col-sm-6'><input type='text' name='nominal' id='txtnominal' class = 'form-control' onchange='cekAllFilled(1)' onkeyup='shownominal()'/></div>
              <label name='nom_Label' id='error2' class ='control-label col-md-2'></label>
            </div>
            <div class="form-group">

              <label name='lblktr' id='lblktr' class='control-label col-md-2'> keterangan </label>
              <div class='col-sm-6'><input type='text' name='ktr' id='ktr' class='form-control' maxlength='20'/></div>
            </div>
            <div class="form-group">
              <label name='type_trans' id='type_trans' class ='control-label col-md-2'> Tipe Transaksi </label>
              <div class='col-sm-6'>
                <select name='kode' class='form-control col-md-3'>
                        <option value='1'>01.Setor</option> <option value='2'>02.Tarik</option>
                        <option value='3'>03.Pindah Buku</option>
                        <option value='4'>04.Angsuran pembiayaan anggota autodebit</option>
                        <option value='41'>041.Setoran murabahah yang masuk via autodebit</option>
                        <option value='43'>042.Setoran pinjaman uang murni masuk pettycash</option>
                        <option value='42'>043.Setoran murabahah yang masuk pettycash</option>
                        <option value='51'>051.Koreksi Setor(perlu ditambahkan dengan setor)</option>
                        <option value='52'>052.Koreksi Tarik(perlu dikurangi dengan tarik)</option>
                        <option value='6'>06.Bagihasil dan bonus</option>
                        <option value='7'>07.Pajak</option>
                        <option value='8'>08.Biaya pengelolaan rekening</option>
                        <option value='9'>09.Infaq</option>
                        <option value='10'>010.Pencairan dana</option>
                        <option value='11'>011.Simpanan pokok</option>
                        <option value='12'>012.Simpanan wajib</option>
                        <option value='13'>013.Hutang terhadap pihak ketiga</option>
                        <option value='14'>014.Arisan umroh</option>
                        <option value='15'>015.Tabungan haji</option>
                      </select></div>
            </div>

            <div class="form-group">
              <div class='col-sm-offset-3 col-sm-10'>
                <button type='submit' class='btn btn-primary' id='submitButton' disabled>Submit</button>
                <a href="<?php echo base_url();?>Anggota" class = "btn btn-danger">Cancel</a>
              </div>
            </div>
          </div>

          <!-- javascript to visible each option needs-->
          <script>
          var parents = document.getElementById('form_trans');
            document.getElementById('pilihan').onchange = function(){

                  while(parents.hasChildNodes()){
                    parents.removeChild(parents.firstChild);
                  }
                getContent(parents,this.value);
            };
          </script>
        <!--Validation_script -->
          <script>
          function getContent(parents,valuePilihan){
            switch(valuePilihan){
                case '1':{
                  // remove all element before

                  // add div

                  var node1 = document.createElement("div");
                  node1.classList.add('form-group');
                  
                  // add label
                  var text1 = "<label name='nom_Label' id='lblNominal' class ='control-label col-md-2'> Nominal </label>";
                  // add input text
                  var text2 = "<div class='col-sm-6'><input type='text' name='nominal' id='txtnominal' class = 'form-control' onchange='cekAllFilled(1);' onkeyup='shownominal()'/></div>";
                  var teks = "<label name='nom_Label' id='error2' class ='control-label col-md-2'></label>"
                  //append to div
                  node1.innerHTML = text1 + text2 + teks;

                  parents.appendChild(node1);
                  // add combo box

                  var node2 = document.createElement("div");
                  node2.classList.add('form-group');
                  text1 = "<label name='type_trans' id='type_trans' class ='control-label col-md-2'> Tipe Transaksi </label>";
                  text2 = "<div class='col-sm-6'><select name='tipe_select' class='form-control col-md-5'> <option value='0'>Pokok </option> <option value='1'> Wajib</option></select> </div>";

                  node2.innerHTML = text1+text2;
                  parents.appendChild(node2);
                  var nodeSubmit = document.createElement("div");
                  nodeSubmit.classList.add('form-group');
                  text3 = "<div class='col-sm-offset-3 col-sm-10'><button type='submit' class='btn btn-primary' id='submitButton' disabled>Submit</button>   <button type='reset' class='btn btn-danger'>Cancel</button>   </div>";
                  nodeSubmit.innerHTML = text3;
                  parents.appendChild(nodeSubmit);
                  break;
                }
                case '2':{

                  // add div

                  var node1 = document.createElement("div");
                  node1.classList.add('form-group');
                  // add label
                  var text1 = "<label name='nom_Label' id='lblnominal' class ='control-label col-md-2'>Nominal</label>";
                  // add input text
                  var text2 = "<div class='col-sm-6'><input type='text' name='nominal' id='txtnominal' class = 'form-control' onchange='cekAllFilled(1)' onkeyup='shownominal()'/></div>";
                  var teks = "<label name='nom_Label' id='error2' class ='control-label col-md-2'></label>"
                  //append to div
                  node1.innerHTML = text1 + text2 + teks ;

                  parents.appendChild(node1);
                  // add combo box

                  var node2 = document.createElement("div");
                  node2.classList.add('form-group');
                  text1 = "<label name='type_trans' id='type_trans' class ='control-label col-md-2'> Tipe Transaksi </label>";
                  text2 = "<div class='col-sm-6'><select value='1' name='kode' class='form-control col-md-3'> "+
                            "<option value='1'>01.Setor</option> <option value='2'>02.Tarik</option>"
                            +"<option value='3'>03.Pindah Buku</option>"
                            +"<option value='4'>04.Angsuran pembiayaan anggota autodebit</option>"
                            +"<option value='41'>041.Setoran murabahah yang masuk via autodebit</option>"
                            +"<option value='43'>042.Setoran pinjaman uang murni masuk pettycash</option>"
                            +"<option value='42'>043.Setoran murabahah yang masuk pettycash</option>"
                            +"<option value='5'>05.Koreksi</option>"
                            +"<option value='6'>06.Bagihasil & bonus</option>"
                            +"<option value='7'>07.Pajak</option>"
                            +"<option value='8'>08.Biaya pengelolaan rekening</option>"
                            +"<option value='9'>09.Infaq</option>"
                            +"<option value='10'>010.Pencairan dana</option>"
                            +"<option value='11'>011.Simpanan pokok</option>"
                            +"<option value='12'>012.Simpanan wajib</option>"
                            +"<option value='13'>013.Hutang terhadap pihak ketiga</option>"
                            +"<option value='14'>014.Arisan umroh</option>"
                            +"<option value='15'>015.Tabungan haji</option></div>";
                  node2.innerHTML = text1+text2;
                  parents.appendChild(node2);
                  var node3 = document.createElement("div");
                  node3.classList.add('form-group');
                  text1 = "<label name='lblktr' id='lblktr' class='control-label col-md-2'> keterangan </label>";
                  text2 = "<div class='col-sm-6'><input type='text' name='ktr' id='ktr' class='form-control' maxlength='20' /></div>";
                  node3.innerHTML = text1 + text2;
                  parents.appendChild(node3);
                  var nodeSubmit = document.createElement("div");
                  nodeSubmit.classList.add('form-group');
                  text3 = "<div class='col-sm-offset-3 col-sm-10'><button type='submit' class='btn btn-primary' id='submitButton' disabled>Submit</button>   <button type='reset' class='btn btn-danger'>Cancel</button>   </div>";
                  nodeSubmit.innerHTML = text3;
                  parents.appendChild(nodeSubmit);
                  break;
                }

                case '3':{
                  var node1 = document.createElement("div");
                  node1.classList.add('form-group');
                  // add label
                  var text1 = "<label name='nom_Label' id='nominal' class ='control-label col-md-2'>Nominal</label>";
                  // add input text
                  var text2 = "<div class='col-sm-6'><input type='text' name='nominal' id='txtnominal' class = 'form-control' onchange='cekAllFilled(1)' onkeyup='shownominal()'/></div>";
                  var teks = "<label name='nom_Label' id='error2' class ='control-label col-md-2'></label>"
                  //append to div
                  node1.innerHTML = text1 + text2 + teks;

                  parents.appendChild(node1);
                  // add combo box

                  var node2 = document.createElement("div");
                  node2.classList.add('form-group');
                  text1 = "<label name='type_trans' id='type_trans' class ='control-label col-md-2' style='display:none;'> Tipe Transaksi </label>";
                  text2 = "<div class='col-sm-6' style='display:none;'><select name='debit_kredit' class='form-control col-md-5' hidden> <option value='0' hidden>Tarik </option> <option value='1' hidden> Setor</option> </div>";

                  node2.innerHTML = text1+text2;
                  parents.appendChild(node2);
                  var node3 = document.createElement("div");
                  node3.classList.add('form-group');
                  text1 = "<label name='lbl_bulan' id='lbl_bulan' class ='control-label col-md-2'> Bulan</label>";
                  text2 = "<div class='col-sm-6'><select name='lama_bagihasil' class='form-control col-md-5'> <option value='3'>3 Bulan</option> <option value='6'> 6 Bulan</option><option value='12'>12 Bulan </option></div>";
                  node3.innerHTML = text1+text2;
                  parents.appendChild(node3);
                  var node4 = document.createElement("div");
                  node4.classList.add('form-group');
                  text1 = "<label name='lblktr' id='lblktr' class='control-label col-md-2'> keterangan </label>";
                  text2 = "<div class='col-sm-6'><input type='text' name='ktr' id='ktr' class='form-control' maxlength='20' /></div>"
                  node4.innerHTML = text1 + text2;
                  parents.appendChild(node4);

                  
                  var nodeSubmit = document.createElement("div");
                  nodeSubmit.classList.add('form-group');
                  text3 = "<div class='col-sm-offset-3 col-sm-10'><button type='submit' class='btn btn-primary' id='submitButton' disabled >Submit</button>   <button type='reset' class='btn btn-danger'>Cancel</button>   </div>";
                  nodeSubmit.innerHTML = text3;
                  parents.appendChild(nodeSubmit);
                  break;
                }

                case '4':{
                  var node1 = document.createElement("div");
                  node1.classList.add('form-group');
                  // add label
                  var text1 = "<label name='nom_Label' id='nominal' class ='control-label col-md-2'>Nominal</label>";
                  // add input text
                  var text2 = "<div class='col-sm-6'><input type='text' name='nominal' id='txtnominal' class = 'form-control' onchange='cekAllFilled(1)' onkeyup='shownominal()'/></div>";
                  var teks = "<label name='nom_Label' id='error2' class ='control-label col-md-2'></label>"
                  //append to div
                  node1.innerHTML = text1 + text2 + teks;

                  parents.appendChild(node1);
                  // add combo box

                  var node2 = document.createElement("div");
                  node2.classList.add('form-group');
                  text1 = "<label name='type_trans' id='type_trans' class ='control-label col-md-2' style='display:none;'> Tipe Transaksi </label>";
                  text2 = "<div class='col-sm-6'><select name='debit_kredit' class='form-control col-md-5' style='display:none;'> <option value='0'>Tarik</option> <option value='1'> Setor</option></div>";

                  node2.innerHTML = text1+text2;
                  parents.appendChild(node2);
                  var node3 = document.createElement("div");
                  node3.classList.add('form-group');
                  text1 = "<label name='type_trans' id='type_trans' class ='control-label col-md-2'> Tipe Transaksi </label>";
                  text2 = "<div class='col-sm-6'><select name='lama_bagihasil' class='form-control col-md-5'> <option value='3'>3 Bulan</option> <option value='6'> 6 Bulan</option><option value='12'>12 Bulan </option></div>";

                  node3.innerHTML = text1+text2;
                  parents.appendChild(node3);
                  var nodeSubmit = document.createElement("div");
                  nodeSubmit.classList.add('form-group');
                  text3 = "<div class='col-sm-offset-3 col-sm-10'><button type='submit' class='btn btn-primary' id='submitButton' disabled>Submit</button>   <button type='reset' class='btn btn-danger'>Cancel</button>   </div>";
                  nodeSubmit.innerHTML = text3;
                  parents.appendChild(nodeSubmit);
                  break;
                }
              }
          }
            function cekAllFilled(id){

              switch(id){
                case 1:{if(document.getElementById('txtnominal').value.length > 3) enableSubmit();else disableSubmit(); break;}
              }
            }
            function enableSubmit(){

              document.getElementById('submitButton').disabled = false;

            }
            function disableSubmit(){
              document.getElementById('submitButton').disabled = true;
            }
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
            	
            	
            	document.getElementById('error2').innerHTML = nom2;
            }
           </script>

            <!-- Submit -->

          </form>
          <?php echo validation_errors('<p class="error">');?>
        </div>
