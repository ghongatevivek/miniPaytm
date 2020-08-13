<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>All Transactions Page</title>
      <?php $this->load->view("head"); ?>
      <style>
      </style>
   </head>
   <body>
      <!-- start Navigation -->
      <?php $this->load->view("topbar"); ?>
      <!-- End Navigation -->
      <header class="bg-inf" style="margin: auto;
         background-color: #012b72;
         width: 100%;
         margin-top: -53px;
         height: 200px;">
         <div class="bg-light jumbotron" style="
            transform: translate(0%,10%);
            position: unset;
            width: 80%;
            top: 42%;
            left: 42%;
            margin: auto;
            margin-top: 125px;
            height: 850px;">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <h2 class="text-center text-primary">All Transctions</h2>
                  </div>
               </div>
               <div class="row">
                  <hr style="border:-8px solid blue;height: 1px;width: 100%;margin-top: 30px;">
               </div>
            </div>
            <?php  foreach ($select as $key => $value) { 

               $u_toUser = $this->db->query("select u_name from tbl_user where u_id=".$value->u_to)->result();
               if(!empty($value->u_from)){
                  $u_fromUser = $this->db->query("select u_name from tbl_user where u_id=".$value->u_from)->result();
                  $fromuser=$u_fromUser[0]->u_name;
               }else{
                  $fromuser="";
               }
               // print_r($u_toUser);

            ?>   
               <div class="container ">
                  <div class="row justify-content-center">
                     <div class="card p-3 border-success bg-secounadary" style="width: 100%;border: 2.5px solid #28a745!important;">
                        <div class="card-header bg-transparent border-success">
                           <h3  class="text-info text-center">Paytm</h3>
                        </div>
                        <div class="card-body">
                           <div class="container">
                              <?php if(empty($value->u_from)){ ?>
                              <h3 class=" font-italic text-success">Money Add Successfully</h3>
                           <?php }else{ ?>
                              <h3 class=" font-italic text-success">Money Send Successfully</h3>
                           <?php } ?>
                              <table>
                                 <td>
                                    <h3><?php echo $value->t_amount; ?></h3>
                                 </td>
                                 <td>
                                    <h3 style="font-weight: 450;">&#8377;</h3>
                                 </td>
                              </table>
                           </div>
                           <div class="container ml-3">
                              <div class="row">
                                 <span class="text-muted">To</span>
                              </div>
                              <div class="row">
                                 <strong class="text-uppercase"><?php echo $u_toUser[0]->u_name; ?></strong>
                              </div>
                              <!-- <div class="row">
                                 <span>ff</span>
                              </div> -->
                           </div>
                           <div class="container ml-3 mt-2">
                              <div class="row">
                                 <span class="text-muted">From</span>
                              </div>
                              <div class="row">
                                 <?php if($fromuser== ""){ ?>
                                    <strong class="text-uppercase">Money Added From Paytm </strong>
                                 <?php }else{ ?>
                                 <strong class="text-uppercase"><?php echo $fromuser; ?></strong>
                              <?php } ?>
                              </div>
                              <!-- <div class="row">
                                 <span></span>
                              </div> -->
                           </div>
                           <div class="container ml-3 mt-2">
                              <div class="row">
                                 <span class="text-muted"><strong>Transaction Date : </strong><?php echo $value->t_date; ?></span>
                              </div>
                              <div class="row mt-1">
                                 <span class="text-muted"><strong>Transaction Id : </strong><?php echo $value->t_orderid; ?></span>
                              </div>
                              <div class="row mt-1">
                                 <span class="text-muted"><strong>Description : </strong><?php echo $value->t_description; ?></span>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer bg-transparent border-success">
                           <h3 class="text-info text-center">Paytm</h3>
                        </div>
                     </div>
                  </div>
               </div>
            <?php } ?>
         </div>
      </header>
      <div class="bg-ligh" style="width: 100%;height: 750px;background-color: #F7F0E4 ;"></div>
      <?php $this->load->view("script"); ?>
   </body>
</html>