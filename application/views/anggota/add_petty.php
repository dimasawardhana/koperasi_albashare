<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Tambah Pettycash</h2>
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




          <form class="form-horizontal" role="form" action="<?php echo base_url();?>Anggota/process_addpetty/<?php echo $id_rekening; ?>" method="POST">
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

          <div id="form_trans" class="form-group">
            <!-- form isian -->
            <div class="form-group">
              <label name='nom_Label' id='lblnominal' class ='control-label col-md-2'>Nominal</label>
              <div class='col-sm-6'><input type='text' name='nominal' id='txtnominal' class = 'form-control' onchange='cekAllFilled(1)'/></div>
              <label name='nom_Label' id='error2' class ='control-label col-md-2'></label>
            </div>
            <div class="form-group">

              <label name='lblktr' id='lblktr' class='control-label col-md-2'> keterangan </label>
              <div class='col-sm-6'><input type='text' name='ktr' id='ktr' class='form-control' maxlength='20'/></div>
            </div>
            <div class="form-group">
              <label name='type_trans' id='type_trans' class ='control-label col-md-2'> Bulan </label>
              <div class='col-sm-6'>
                <select name='bulan' class='form-control col-md-3'>
                        <option value='1'>Januari</option>
                        <option value='2'>Februari</option>
                        <option value='3'>Maret</option>
                        <option value='4'>April</option>
                        <option value='5'>Mei</option>
                        <option value='6'>Juni</option>
                        <option value='7'>Juli</option>
                        <option value='8'>Agustus</option>
                        <option value='9'>September</option>
                        <option value='10'>Oktober</option>
                        <option value='11'>November</option>
                        <option value='12'>Desember</option>
                 </select>
              </div>
            </div>

            <div class="form-group">
              <div class='col-sm-offset-3 col-sm-10'>
                <button type='submit' class='btn btn-primary' id='submitButton' disabled>Submit</button>
                <a href="<?php echo base_url();?>Anggota" class = "btn btn-danger">Cancel</a>
              </div>
            </div>
          </div>

          <!-- javascript to visible each option needs-->
          
        <!--Validation_script -->
          <script>
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
            nominal.onkeyup = function(){
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
