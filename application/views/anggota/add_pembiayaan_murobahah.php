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




          <form class="form-horizontal" role="form" action="<?php echo base_url();?>Anggota/process_addpembiayaan/<?php echo $id_rekening.'/'.$anggota[0]->cabang; ?>" method="POST">
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
               <option value="1">Pembiayaan Murobahah</option>
               <option value="2" disabled>Pembiayaan Mudhorobah</option>
              </select>
            </div>
          </div>

          <div id="form_trans" class="form-group">
            <!-- form isian -->
            <div class="form-group">
              <label name='lblktr' id='lblktr' class='control-label col-md-2'> Bentuk Barang</label>
              <div class='col-sm-6'><input type='text' name='bentuk_barang' id='bentuk_barang' class='form-control' maxlength='50'/></div>
            </div>

            <div class="form-group">
              <label name='nom_Label' id='lblnominal' class ='control-label col-md-2'>Kisaran Harga Barang</label>
              <div class='col-sm-6'><input type='text' name='hrg_brg' id='harga_beli' class = 'form-control' onchange='cekAllFilled(1)' onkeyup='shownominal()'/></div>
              <label name='nom_Label' id='error2' class ='control-label col-md-2'></label>
            </div>

            <div class="form-group">
              <label name='lblktr' id='lblktr' class='control-label col-md-2'>Harga Jual</label>
              <div class='col-sm-6'><input type='text' id='harga_jual' name='harga_jual' class='form-control' onkeyup='shownominal();showcicilan();'/></div>
              <label name='lblktr' id='lblmargin' class='control-label col-md-2'></label>
            </div>

            <div class="form-group">
              <label name='lblktr' id='lblktr' class='control-label col-md-2'>Dicicil sebanyak</label>
              <div class='col-sm-2'><input type='number' name='cicilanbulan' id='cicilanbulan' class='form-control' min='3' max='12' value = '3' onchange='showcicilan();shownominal();' /></div>
              <label name='lblktr' id='lblktr' class='control-label col-sm-1'>Bulan</label>
            </div>

            <div class="form-group">
              <label name='nom_Label' id='lblnominal' class ='control-label col-md-2'>cicilan per-bulan</label>
              <div class='col-sm-6'><input type='text' name='cicilan' id='cicilan' class = 'form-control' onchange='cekAllFilled(2);shownominal();' readonly/></div>
              <label name='nom_Label' id='error3' class ='control-label col-md-2'></label>
            </div>

            <div class="form-group">
              <label name='lblktr' id='lblktr' class='control-label col-md-2'>Keterangan</label>
              <div class='col-sm-6'><input type='text' name='keperluan' id='keperluan' class='form-control' maxlength='50'/></div>
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
                  var node = "";
                  node.classList.add('form-group');

                  var text1 = "<label name='lblktr' id='lblktr' class='control-label col-md-2'> Bentuk Barang</label>";
                  var text2 = "<div class='col-sm-6'><input type='text' name='ktr' id='bentuk_barang' class='form-control' maxlength='50'/></div>";
                  var teks = "";
                  node.innerHTML = text1 + text2 + teks;
                  parents.appendChild(node);

                  var node1 = document.createElement("div");
                  node1.classList.add('form-group');
                  
                  // add label
                  text1 = "<label name='nom_Label' id='lblNominal' class ='control-label col-md-2'> Kisaran Harga Barang</label>";
                  // add input text
                  text2 = "<div class='col-sm-6'><input type='text' name='nominal' id='harga_beli' class = 'form-control' onchange='cekAllFilled(1);' onkeyup='shownominal()'/></div>";
                  teks = "<label name='nom_Label' id='error2' class ='control-label col-md-2'></label>"
                  //append to div
                  node1.innerHTML = text1 + text2 + teks;

                  parents.appendChild(node1);
                  // add combo box

                  var node2 = document.createElement("div");
                  node2.classList.add('form-group');
                  text1 = "<label name='nom_Label' id='lblnominal' class ='control-label col-md-2'>Kemampuan cicilan per-bulan</label>";
                  text2 = "<div class='col-sm-6'><input type='text' name='hrg_brg' id='cicilan' class = 'form-control' onchange='cekAllFilled(2)' onkeyup='shownominal()'/></div>";
                  teks = "<label name='nom_Label' id='error3' class ='control-label col-md-2'></label>";
                  node2.innerHTML = text1+text2+teks;
                  parents.appendChild(node2);

                  var node3 = document.createElement("div");
                  node3.classList.add('form-group');
                  text1 = "<label name='lblktr' id='lblktr' class='control-label col-md-2'>Keperluan</label>";
                  text2 = "<div class='col-sm-6'><input type='text' name='ktr' id='keperluan' class='form-control' maxlength='50'/></div>";
                  node3.innerHTML = text1+text2;
                  parents.appendChild(node3);

                  var nodeSubmit = document.createElement("div");
                  nodeSubmit.classList.add('form-group');
                  text3 = "<div class='col-sm-offset-3 col-sm-10'><button type='submit' class='btn btn-primary' id='submitButton' disabled>Submit</button>   <button type='reset' class='btn btn-danger'>Cancel</button>   </div>";
                  nodeSubmit.innerHTML = text3;
                  parents.appendChild(nodeSubmit);
                  break;
                }
                case '2':{

                  
                  break;
                }

                
              }
          }
            
            function cekAllFilled(id){

              switch(id){
                case 1:{if(document.getElementById('harga_beli').value.length > 3) enableSubmit();else disableSubmit(); break;}
                case 1:{if(document.getElementById('cicilan').value.length > 3) enableSubmit();else disableSubmit(); break;}
              }
            }
            function enableSubmit(){

              document.getElementById('submitButton').disabled = false;

            }
            function showcicilan(){
              var bulan = document.getElementById('cicilanbulan').value;
              var jual = document.getElementById('harga_jual').value;
              var cicilan = document.getElementById('cicilan');
              cicilan.value = parseInt(jual)/parseInt(bulan);
              console.log(cicilan);
            }
            function disableSubmit(){
              document.getElementById('submitButton').disabled = true;
            }
            var nominal = document.getElementById('harga_beli');
            var jual = document.getElementById('harga_jual');
            var nominal2 = document.getElementById('cicilan'); ;
            function shownominal(){
              nominal = document.getElementById('harga_beli');
              nominal2 = document.getElementById('cicilan');
              jual = document.getElementById('harga_jual');
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
              var nom3 = nominal2.value;
            	var nom2 = toRp(nom1);
              var nom4 = toRp(nom3);
            	
            	document.getElementById('lblmargin').innerHTML = toRp(jual.value);
            	document.getElementById('error2').innerHTML = nom2;
              document.getElementById('error3').innerHTML = nom4;
            }
            
           </script>

            <!-- Submit -->

          </form>
          <?php echo validation_errors('<p class="error">');?>
        </div>
