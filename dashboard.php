
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
                                    <h4 class="page-title">Dashboard</h4>
                                   <!--  <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Zircos</a>
                                        </li>
                                        <li>
                                            <a href="#">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Dashboard
                                        </li>
                                    </ol> -->
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row text-center">

                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-two" >
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow">No Of Students Evolved</p>

                                        <?php
                                                $sql="SELECT COUNT(id) FROM login";
                                                $res=mysqli_query($db,$sql);
                                                $arr=mysqli_fetch_array($res);

                                         ?>
                                        <h2 class="text-danger"><span data-plugin="counterup"><?php echo $arr['COUNT(id)'] ?></span></h2>
<!--                                         <p class="text-muted m-0"><b>Last:</b> 30.4k</p>
 -->                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <div class="wigdet-one-content">
                                         <?php
                                                
                                                $query=mysqli_query($db,"SELECT COUNT(i_id) FROM Interdisciplinary");
                                                $res=mysqli_fetch_array($query);

                                         ?>
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow">Interdisciplinary Paper</p>
                                        <h2 class="text-dark"><span data-plugin="counterup"><?php echo $res['COUNT(i_id)']?></span> </h2>
<!--                                         <p class="text-muted m-0"><b>Last:</b> 1250</p>
 -->                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <div class="wigdet-one-content">
                                         <?php
                                                
                                                $query1=mysqli_query($db,"SELECT COUNT(s_id) FROM subject_based");
                                                $res1=mysqli_fetch_array($query1);

                                         ?>
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow">subject Based Paper</p>
                                        <h2 class="text-dark"><span data-plugin="counterup"><?php echo $res1['COUNT(s_id)']?></span> </h2>
<!--                                         <p class="text-muted m-0"><b>Last:</b> 1250</p>
 -->                                    </div>
                                </div>
                            </div><!-- end col -->

                            
                           
                           

                            

                        </div>
                        <!-- end row -->


                        

                        




                    </div> <!-- container -->

                </div> <!-- content -->

                <?php

                require 'footer.php';

                ?>