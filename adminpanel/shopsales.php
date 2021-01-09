<?php
require "../connect.php";
require "../sql.php";   

include('includes/header.php');
include('includes/navbar.php');
$shop=isset($_GET['shopid'])||$_GET['shopid']==''?$_GET['shopid']:$_SESSION['shopid'];
$startdate=isset($_GET['startdate'])?$_GET['startdate']:date('yy-m-d');
$enddate=isset($_GET['enddate'])?$_GET['enddate']:date('yy-m-d');
$startdate=$startdate!=""?$startdate:date('yy-m-d');
$enddate=$enddate!=""?$enddate:date('yy-m-d');
$year=substr($startdate,0,4);
$_SESSION['shopid']=$shop;


$getsales='SELECT sum((I.'.'price*OE.count)-(I.price*OE.count*C.discount)) as sales,C.couponname,count(DISTINCT O.id) as orders from orders O join coupons C on O.coupon=C.id join orderelements OE on O.id=OE.ordernumber left join items I on I.id=OE.item where O.orderstart BETWEEN "'.$startdate.' 00:00" and "'.$enddate.' 23:59" and O.coupon is not null and O.status not in("CART","IN DISPATCH","CANCELED") and O.shop="'.$shop.'" and O.paymentmethod="CASH"' ;

$MyJsonData2=sql_selectdata($getsales,$conn);
$MyJsonData2=preg_replace('/null/', '"0"', $MyJsonData2);
preg_match('/(?<=sales":").+?(?=")/', $MyJsonData2,$sales);
preg_match('/(?<=orders":").+?(?=")/', $MyJsonData2,$orders);




$sales[0]=round($sales[0], 2);



$getyearly='SELECT sum((I.'.'price*OE.count)-(I.price*OE.count*C.discount)) as sales,C.couponname,count(DISTINCT O.id) as orders from orders O join coupons C on O.coupon=C.id join orderelements OE on O.id=OE.ordernumber left join items I on I.id=OE.item where O.orderstart BETWEEN "'.$year.'-01-01 00:00" and "'.$year.'-12-31 23:59" and O.coupon is not null and O.status not in("CART","IN DISPATCH","CANCELED") and O.shop="'.$shop.'" and O.paymentmethod="CASH"';


$MyJsonData1=sql_selectdata($getyearly,$conn);
$MyJsonData1=preg_replace('/null/', '"0"', $MyJsonData1);
preg_match('/(?<=sales":").+?(?=")/', $MyJsonData1,$yearly);



$getsales='SELECT sum((I.'.'price*OE.count)-(I.price*OE.count*C.discount)) as sales,C.couponname,count(DISTINCT O.id) as orders from orders O join coupons C on O.coupon=C.id join orderelements OE on O.id=OE.ordernumber left join items I on I.id=OE.item where O.orderstart BETWEEN "'.$startdate.' 00:00" and "'.$enddate.' 23:59" and O.coupon is not null and O.status not in("CART","IN DISPATCH","CANCELED") and O.shop="'.$shop.'" and O.paymentmethod="ONLINE"' ;

$MyJsonData2=sql_selectdata($getsales,$conn);
$MyJsonData2=preg_replace('/null/', '"0"', $MyJsonData2);
preg_match('/(?<=sales":").+?(?=")/', $MyJsonData2,$saleson);
preg_match('/(?<=orders":").+?(?=")/', $MyJsonData2,$orderson);




$saleson[0]=round($saleson[0], 2);



$getyearly='SELECT sum((I.'.'price*OE.count)-(I.price*OE.count*C.discount)) as sales,C.couponname,count(DISTINCT O.id) as orders from orders O join coupons C on O.coupon=C.id join orderelements OE on O.id=OE.ordernumber left join items I on I.id=OE.item where O.orderstart BETWEEN "'.$year.'-01-01 00:00" and "'.$year.'-12-31 23:59" and O.coupon is not null and O.status not in("CART","IN DISPATCH","CANCELED") and O.shop="'.$shop.'" and O.paymentmethod="ONLINE"';


$MyJsonData1=sql_selectdata($getyearly,$conn);
$MyJsonData1=preg_replace('/null/', '"0"', $MyJsonData1);
preg_match('/(?<=sales":").+?(?=")/', $MyJsonData1,$yearlyon);

$yearly[0]=round($yearly[0], 2);

$yearlyon[0]=round($yearlyon[0], 2);

$getorders='SELECT count(id) as ordercount from orders where status="IN DISPATCH" and shop="'.$shop.'" and paymentmethod="CASH"';
$MyJsonData4=sql_selectdata($getorders,$conn);

preg_match('/(?<=ordercount":").+?(?=")/', $MyJsonData4,$ordercount);
$getorders='SELECT count(id) as ordercount from orders where status="IN DISPATCH" and shop="'.$shop.'" and paymentmethod="ONLINE"';
$MyJsonData4=sql_selectdata($getorders,$conn);

preg_match('/(?<=ordercount":").+?(?=")/', $MyJsonData4,$ordercounton);
   

?>

      

        <!-- Content Wrapper -->
     
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose start and end date</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="shopsales.php" method="GET">

        <div class="modal-body">

            <div class="form-group">
                <label>Start date</label>
                <input type="date" name="startdate" class="form-control">
            </div>
            <div class="form-group">
                <label>end date</label>
                <input type="date" name="enddate" class="form-control checking_email">
                <small class="error_email" style="color: red;"></small>
            </div>
            <input type="text" name="shopid" value="<?php echo $shop;?>" hidden>


        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">sales for shop number <?php echo $shop;?></h1>
                        <a href="#" data-toggle="modal" data-target="#addadminprofile" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-edit fa-sm text-white-50"></i> Edit Date</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      
                                        <div class="col mr-2">
                                              
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Annual Earnings (cash)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $yearly[0];?></div>
                                       
                                        </div>
                                        
                                        <div class="col-auto">
                                            
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                         
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                              Earnings (cash)</div>
                                          <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $sales[0];?></div>
                                         
                                        </div>
                                        
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total orders (cash)
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $orders[0]?></div>
                                              
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests (cash)</div>
                                       
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ordercount[0];?></div>
                                      
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      
                                        <div class="col mr-2">
                                              
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Annual Earnings (online)</div>
                                          <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $yearlyon[0];?></div>
                                       
                                        </div>
                                        
                                        <div class="col-auto">
                                            
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                         
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                              Earnings (online)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $saleson[0];?></div>
                                        
                                        </div>
                                        
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total orders (online)
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $orderson[0]?></div>
                                                
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests (online)</div>
                                                
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ordercounton[0];?></div>
                                    
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    

                    <!-- Content Row -->

                  <!--  -->
                <!-- /.container-fluid -->

            </div>
                    <!-- Content Row -->

                  <!--  -->
                <!-- /.container-fluid -->

            </div>


            <!-- End of Main Content -->

           
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

  </div>

 
<?php   
include('includes/scripts.php');
include('includes/footer.php');







   ?>

