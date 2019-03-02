<?php

require 'header.php';
require 'db_config.php';
?>
  <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">SESSION </h4>
                                    <!-- <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Zircos</a>
                                        </li>
                                        <li>
                                            <a href="#">Forms </a>
                                        </li>
                                        <li class="active">
                                           Control
                                        </li>
                                    </ol> -->
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>SELECT FROM DATE AND TO DATE TO START THE SESSION OF THE USER SIDE</b></h4>
                        			
                        			 <div class="row">
                                
                                <div class="col-md-6">
                                           <div class="form-horizontal">
                                             <div class="form-group">
                                                  <label class="col-md-2 control-label">FROM DATE</label>
                                                  <div class="col-md-10">
                                                      <input type="date" required="" class="form-control" id="fdate" name="fdate" placeholder ="Enter a FROM date....">
                                                  </div>
                                              </div>
                                               <div class="form-group">
                                                  <label class="col-md-2 control-label">TO  DATE</label>
                                                  <div class="col-md-10">
                                                      <input type="date" required="" class="form-control" id="tdate" name="tdate" placeholder ="Enter a To date...">
                                                  </div>
                                              </div>
                                              <div class="col-md-8 col-md-offset-10 m-t-50">
                                                   
                                              <button type="submit" onclick="session_date()"  id="but1" class="btn btn-custom waves-light waves-effect w-md">Submit</button>
                                         
                                </div>
                                  </div>
                                        
                                </div>
                              </div>
                           </div>
                       </div>
                   </div>


                                </div>
                            </div>
                        </div>
<script type="text/javascript">
  
function session_date(){
  var fdate=$('#fdate').val();
  var tdate=$('#tdate').val();
  



$.ajax({
  url:"handler/session.php",
  method:"POST",
  cache:false,
  data:{fdate:fdate,tdate:tdate},
  success: function (result){

if(result){

alert(result);

}
}
});



  }




</script>

<?php

require 'footer.php';

?>