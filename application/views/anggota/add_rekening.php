<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Rekening Baru</h2>
                <h5>Tolong isi Form berikut untuk melanjutkan </h5>
                <?php if (isset($account_updated))
                  {
                    echo $account_updated;
                  }
                ?>
            </div>
        </div>
        <hr />
        <div class="row">
        <!--Nama -->
          <form class="form-horizontal" role="form" action="<?php echo base_url();?>Anggota/create_rekening/<?php echo $id_anggota; ?>" method="POST">


            <div class="form-group">
              <label class="control-label col-sm-3">Rekening</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="no_rekening" name="no_rekening" maxlength ="12" onchange='cekInput();' >
                  <p>Rekening terakhir adalah : <?php echo $lastRek[0]->no_rekening; ?></p>
              </div>
              <label class="control-label col-sm-3" id="error"></label>

            </div>

            <!-- Cabang -->
            <div class="form-group">
              <label class="control-label col-sm-3" >cabang</label>
              <div class="col-sm-4">
                <select name="cabang" class="form-control">
                  <option value="1">(1)Bandung</option>
                  <option value="2">(2)Cilegon</option>
                  <option value="3">(3)Serang</option>
                </select>
              </div>
            </div>

            <!-- Submit -->
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-10">
                <button type="submit" class="btn btn-primary" id="submitButton" disabled>Submit</button>
                <a href="<?php echo base_url();?>Anggota" class = "btn btn-danger">Cancel</a>
              </div>
            </div>
          </form>
          <script>
          var check = document.getElementById('no_rekening');
          check.onkeyup = function(){
          	i=0;
          	check2 ='';
          	for(i;i<check.value.length;i++){
          	check2 += check.value[i];
          	if((i+1) /3 == 1||(i+1) /5 == 1||(i+1) /7 == 1)
          	check2 += '-'
          	}
          	document.getElementById('error').innerHTML = check2;
          }
          function cekInput(){
            if(isNaN(check.value)){
              document.getElementById('error').innerHTML = "input harus hanya berupa angka";
              document.getElementById('submitButton').disabled = true;
            }
            else{
              document.getElementById('error').innerHTML = "";
             document.getElementById('submitButton').disabled = false; 
            }
          }
          </script>
          <?php echo validation_errors('<p class="error">');?>
        </div>
