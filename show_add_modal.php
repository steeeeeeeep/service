
  <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
     
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Home Activity Task:</h4>
        </div>
        <div class="container"> 
        <div class="modal-body">  
        <form id = "form_home_tasks"  method="POST"  enctype="multipart/form-data">  
          <?php
         $conn = new mysqli("localhost","root","","home_service") or die(mysqli_error());
         $query = $conn->query("SELECT * FROM `sp_list` WHERE `provider_id` = '$_SESSION[provider_id]'") or die(mysqli_error());
          $f = $query->fetch_array();
         ?>
        <div class="row">
        <div class="col-lg-2">
          <label class="control-label" style="position: relative; top:7px;">HOME ACTIVITY NAME:</label>
        </div>
        <div class="col-lg-10">
           <input type="hidden" style="width: 300px;"  class="form-control"   name="name" value="<?php echo $f['firstname'];?>">
          <input type="text" style="width: 300px;"  class="form-control"   name="activity">
          <input class="hide" style="width: 300px;"     name="tdate" value="<?php echo date('Y-m-d')?>">
          <input type="hidden" style="width: 300px;"  class="form-control"   name="dtime" value="">
          <input  class="hide" class="form-control"   name="status" value="not yet started">
         </div>
         </div>
        </div>    
       </div>

        <div class="modal-footer">
          <audio id="audioMusic">
           <source src="./sounds/marimba.mp3" type="audio/mpeg">
         </audio>
          <button   class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" onclick="bing()" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Save</button>
   
         </form>
        </div>
      </div>
      
    </div>
  </div>

<script type="text/javascript">
   var audio = document.getElementById("audioMusic");
  function bing(){
    audio.play();
   
  }
</script>
