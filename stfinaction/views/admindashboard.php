<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
 
} else {
header("location: https://arfeenkhan.com/stfaction/index.php/AdminController/");
}
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <title>Dashboard</title>
  <style>
    #loader {
      transition: all .3s ease-in-out;
      opacity: 1;
      visibility: visible;
      position: fixed;
      height: 100vh;
      width: 100%;
      background: #fff;
      z-index: 90000
    }

    #loader.fadeOut {
      opacity: 0;
      visibility: hidden
    }

    .spinner {
      width: 40px;
      height: 40px;
      position: absolute;
      top: calc(50% - 20px);
      left: calc(50% - 20px);
      background-color: #333;
      border-radius: 100%;
      -webkit-animation: sk-scaleout 1s infinite ease-in-out;
      animation: sk-scaleout 1s infinite ease-in-out
    }

    @-webkit-keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0)
      }
      100% {
        -webkit-transform: scale(1);
        opacity: 0
      }
    }

    @keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0);
        transform: scale(0)
      }
      100% {
        -webkit-transform: scale(1);
        transform: scale(1);
        opacity: 0
      }
    }
    .masterupload{
      top: 0px!important;
    }
   .billupload
    {
      top:0px!important;
         
    }
    .compalintsupload{
      top:0px!important;
         
    }
  .Querys{
      top:0px!important;
       position: unset!important;  
    }
  </style>
     <link href="https://arfeenkhan.com/coachstat/form/super/js/style.css" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.js"></script>
   </head>
 
<body class="app">
  <div id="loader">
    <div class="spinner"></div>
  </div>
  <script type="text/javascript">window.addEventListener('load', () => {
      const loader = document.getElementById('loader');
      setTimeout(() => {
        loader.classList.add('fadeOut');
      }, 300);
    });</script>
  <div>
    <div class="sidebar">
      <div class="sidebar-inner">
        <div class="sidebar-logo">
          <div class="peers ai-c fxw-nw">
            <div class="peer peer-greed">
              <a class="sidebar-link td-n" href="#" class="td-n">
                <div class="peers ai-c fxw-nw">
                  <div class="peer">
                    <div class="logo">
                      <img style=" width: 56px; margin-top: 28px;    background: #000;  padding: 2px;" src="<?php echo base_url('assets/static/images/logo.png'); ?>" alt="">
                    </div>
                  </div>
                  <div class="peer peer-greed">
                    <h5 class="lh-1 mB-0 logo-text">Speaktofortune</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="peer">
              <div class="mobile-toggle sidebar-toggle">
                <a href="#" class="td-n">
                  <i class="ti-arrow-circle-left"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <ul class="sidebar-menu scrollable pos-r">
          <li class="nav-item mT-30 active">
            <a class="sidebar-link" href="#clickstp" default>
              <span class="icon-holder">
                <i class="c-blue-500 ti-menu-alt"></i>
              </span>
              <span class="title" id="clickstp">Add Step</span>
            </a>
          </li>
           <li class="nav-item mT-30 active">
            <a class="sidebar-link" href="#clickvideo" default>
              <span class="icon-holder">
                <i class="c-blue-500 ti-video-clapper"></i>
              </span>
              <span class="title" id="clickvideo">Add video</span>
            </a>
          </li>
           <li class="nav-item mT-30 active">
            <a class="sidebar-link" href="#clikpdf" default>
              <span class="icon-holder">
                <i class="c-blue-500 ti-files"></i>
              </span>
              <span class="title" id="clikpdf">Add Pdf</span>
            </a>
          </li>
          <li class="nav-item mT-30 active">
            <a class="sidebar-link" href="#clickacc" default>
              <span class="icon-holder">
                <i class="c-blue-500 ti-unlock"></i>
              </span>
              <span class="title" id="clickacc">Grant Access</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="page-container">
      <div class="header navbar">
        <div class="header-container">
          <ul class="nav-left">
            <li>
              <a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);">
                <i class="ti-menu"></i>
              </a>
            </li>
            <li class="search-box">
              <a class="search-toggle no-pdd-right" href="javascript:void(0);">
                <i class="search-icon ti-search pdd-right-10"></i>
                <i class="search-icon-close ti-close pdd-right-10"></i>
              </a>
            </li>
            <li class="search-input">
              <input class="form-control" type="text" placeholder="Search...">
            </li>
          </ul>
          <ul class="nav-right">           
          
            <li class="dropdown">
              <a href="#" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                <div class="peer mR-10">
                  <!--<img class="w-2r bdrs-50p" src="../../../randomuser.me/api/portraits/men/10.jpg" alt="">-->
                </div>
                <div class="peer">
                  <span class="fsz-sm c-grey-900"><?php echo $username;  ?> </span>
                </div>
              </a>
              <ul class="dropdown-menu fsz-sm">
                
               
                <li>
                  <a href="logout.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                    <i class="ti-power-off mR-10"></i>
                    <span><a href="logout">Logout</a></span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      
       
      <main class="main-content bgc-grey-100">
       
           <div class="masonry-item col-md-6" style="display:block" id="addstep" >
              <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Add step Form </h6>
                <?php
                 $message_display= $this->session->flashdata('message_display');
                if (isset($message_display)) {
                echo "<div class='message'  style='text-align: center;    color: green;    margin-left: -100px;'>";
                echo $message_display;
                echo "</div>";
                }
                $message_error= $this->session->flashdata('message_error');
                if (isset($message_error)) {
                echo "<div class='message'  style='text-align: center;    color: red;    margin-left: -100px;'>";
                echo $message_error;
                echo "</div>";
                }
                ?>
                <div class="mT-30">
                 <?php echo form_open('AdminController/addsteps'); ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" name="steptitle" class="form-control"  aria-describedby="titleHelp" placeholder="Enter Title" required>
                     
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <input type="text" name="stepdescription" class="form-control"  aria-describedby="stepdescriptionHelp" placeholder="Enter Description" required>
                     
                    </div>
                       <div class="form-group">
                        <label for="disabledSelect">Type of step video/PDF</label>
                        <select  name="steptype" class="form-control" name="vp" required>
                              <option value="">  Select</option>
                          <option value="p">  Pdf</option>
                          <option value="v">  Video</option>
                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                 <?php echo form_close(); ?>
                </div>
              </div>
            </div>
            
            <div class="masonry-item col-md-6" style="position: absolute;left: 51%;top: 84px;display:block"   id="stepdetail">
              <div class="bd bgc-white">
                <div class="layers">
                  <div class="layer w-100 p-20">
                    <h6 class="lh-1">All Steps  </h6>
                  </div>
                  <div class="layer w-100">
                    <div class="bgc-white p-20 bd">
                      
                    <div class="table-responsive p-20">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="bdwT-0">Title</th>
                            <th class="bdwT-0">Description</th>
                            <th class="bdwT-0">Type</th>
                            <th class="bdwT-0">Step ID</th>
                             <th class="bdwT-0">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                              <?php    foreach ($records as $row) { ?>
                          <tr>
                            <td class="fw-600"><?php echo $row->title; ?></td>
                            <td>
                              <span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c "><?php echo $row->description; ?></span>
                            </td>
                            <td><?php echo $row->v_p; ?></td>
                            <td>
                              <span class="text-default"><?php echo $row->id; ?></span>
                            </td>
                            <td><a style="color: #e20c0c;" href="<?php echo site_url('AdminController/deletesteps/'.$row->id); ?>">Delete</a></td>
                          </tr>
                           <?php } ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="ta-c bdT w-100 p-20">
                  <a href="#">Check all the Steps</a>
                </div>
              </div>
            </div>
        </div>
            <div class="masonry-item col-md-6" style="display:none" id="addvideo">
              <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Add Video</h6>
                  <?php
                   $message_display1= $this->session->flashdata('message_display1');
                if (isset($message_display1)) {
                echo "<div class='message'  style='text-align: center;    color: green;    margin-left: -100px;'>";
                echo $message_display1;
                echo "</div>";
                }
                $message_error1= $this->session->flashdata('message_error1');
                if (isset($message_error1)) {
                echo "<div class='message'  style='text-align: center;    color: red;    margin-left: -100px;'>";
                echo $message_error1;
                echo "</div>";
                }
                ?>
                <div class="mT-30">
                   <?php echo form_open('AdminController/addvideos'); ?>
                      <div class="form-group ">
                        <label for="inputEmail4">Title</label>
                        <input type="text" class="form-control"  name="videotitle" placeholder="Video title" required>
                      </div>
                      <div class="form-group ">
                        <label for="inputPassword4">Link  </label>
                        <input type="text" class="form-control"  name=" videolink" placeholder="Link of video" required>
                      </div>
                    
                    <div class="form-group">
                      <label for="inputAddress">Step Id</label>
                      <select name="vidostepid"  class="form-control"  required > 
                      <option value=""  class="form-control" > Select</option>
                        <?php    foreach ($recordsvideo as $row55) { ?>
                        <option class="form-control" value="<?php echo $row55->id; ?>"> <?php echo $row55->title; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress2">Image Url</label>
                      <input type="text" class="form-control" id="imgurlvideo" name="imgurlvideo" placeholder="Image Url" required>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                   <?php echo form_close(); ?>
                </div>
              </div>
            </div>
            
             <div class="masonry-item col-md-6" style="position: absolute;left: 51%;top: 84px;display:none"  id="addvideodetails">
              <div class="bd bgc-white">
                <div class="layers">
                  <div class="layer w-100 p-20">
                    <h6 class="lh-1">All video  </h6>
                  </div>
                  <div class="layer w-100">
                    <div class="bgc-white p-20 bd">
                      
                    <div class="table-responsive p-20">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="bdwT-0">Title</th>
                            <th class="bdwT-0">	Link</th>
                            <th class="bdwT-0">Stepid</th>
                            <th class="bdwT-0">Imgurl	</th>
                            <th class="bdwT-0">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                              <?php    foreach ($videorecords as $row1) { ?>
                          <tr>
                            <td class="fw-600"><?php echo $row1->title; ?></td>
                            <td>
                              <span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c "><?php echo $row1->link; ?></span>
                            </td>
                            <td><?php echo $row1->stepid; ?></td>
                            <td>
                              <span class="text-default"><?php echo $row1->imgurl; ?></span>
                            </td>
                              <td><a style="color: #e20c0c;" href="<?php echo site_url('AdminController/deletevideos/'.$row1->id); ?>">Delete</a></td>
                            
                          </tr>
                           <?php } ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="ta-c bdT w-100 p-20">
                  <a href="#">Check all the Video</a>
                </div>
              </div>
            </div>
        </div>
        
            <div class="masonry-item col-md-6" style="display:none" id="addpdf">
              <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Add PDF</h6>
                  <?php
                   $message_display2= $this->session->flashdata('message_pdfdisplay');
                if (isset($message_display2)) {
                echo "<div class='message'  style='text-align: center;    color: green;    margin-left: -100px;'>";
                echo $message_display2;
                echo "</div>";
                }
                $message_error2= $this->session->flashdata('pdfdisplay_error2');
                if (isset($message_error2)) {
                echo "<div class='message'  style='text-align: center;    color: red;    margin-left: -100px;'>";
                echo $message_error2;
                echo "</div>";
                }
                ?>
                <div class="mT-30">
                   <?php echo form_open('AdminController/addpdfs'); ?>
                   <div class="form-group ">
                        <label for="inputEmail4">Title</label>
                        <input type="text" class="form-control"  name="pdftitle" placeholder="Pdf title" required>
                      </div>
                      <div class="form-group ">
                        <label for="inputPassword4">Description  </label>
                        <input type="text" class="form-control"  name=" PdfDescription" placeholder="Description of Pdf" required>
                      </div>
                    
                    <div class="form-group">
                      <label for="inputAddress">Image</label>
                      <input type="text" class="form-control"   name="imagepdf" placeholder="Enter Image Url" required>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress2">PDF Url</label>
                      <input type="text" class="form-control"  name="urlPdf" placeholder="PDF Url" required>
                    </div>
                    
                    
                    <div class="form-group">
                      <label for="inputAddress">Step Id</label>
                      <select name="vidostepid"  class="form-control"  required > 
                      <option value=""  class="form-control" > Select</option>
                        <?php    foreach ($recordspdf as $row44) { ?>
                        <option class="form-control" value="<?php echo $row44->id; ?>"> <?php echo $row44->title; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </fieldset>
                     <?php echo form_close(); ?>
                </div>
              </div>
            </div>
            
             <div class="masonry-item col-md-6" style="position: absolute;left: 51%;top: 84px;display:none"  id="pdfsdetails">
              <div class="bd bgc-white">
                <div class="layers">
                  <div class="layer w-100 p-20">
                    <h6 class="lh-1">All PDF  </h6>
                  </div>
                  <div class="layer w-100">
                    <div class="bgc-white p-20 bd">
                      
                    <div class="table-responsive p-20">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="bdwT-0">Title</th>
                            <th class="bdwT-0">	Description	</th>
                            <th class="bdwT-0">Image</th>
                            <th class="bdwT-0">Pdflink	</th>
                            <th class="bdwT-0">Action	</th>
                          </tr>
                        </thead>
                        <tbody>
                              <?php    foreach ($pdfrecords as $row2) { ?>
                          <tr>
                            <td class="fw-600"><?php echo $row2->title; ?></td>
                            <td>
                              <span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c "><?php echo $row2->description; ?></span>
                            </td>
                            <td><?php echo $row2->image; ?></td>
                            <td>
                              <span class="text-default"><?php echo $row2->pdflink; ?></span>
                            </td>
                              <td><a style="color: #e20c0c;" href="<?php echo site_url('AdminController/deletepdfs/'.$row2->id); ?>">Delete</a></td>
                              
                          </tr>
                           <?php } ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="ta-c bdT w-100 p-20">
                  <a href="#">Check all the Pdf</a>
                </div>
              </div>
            </div>
        </div>
        
         
            <div class="masonry-item col-md-12" style="display:none" id="grantaccess">
              <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Grant Access</h6>
                <div class="container">
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="table-responsive" style="margin-top: 3%;">
                          
                           <table class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>Sr No.</th>
                              <th>Name </th>
                              <th>Email</th>
                              <th>Action</th>
                              <th>Count Aceepted</th>
                              <th>Details</th>
                            </tr>
                          </thead>
                          <tbody>
                              
                            <?php  $b =1;
                             foreach ($grantaccrecords1 as $rowb) { ?>
                            <tr>
                              <td><?php echo $b++; ?> </td>
                              <td> <?php echo $rowb->name; ?></td>
                              <td><?php echo $rowb->username; ?> </td>
                              <td>
                                <input type="submit" class="form-control btn btn-success submit" id="1"  value="Approved"  >
                              </td>
                             <?php
                            $condition = "" . "status =" . "'1' AND " . "username =" . "'" .  $rowb->username . "'";
                            $this->db->select('*');
                            $this->db->from('requestes');
                             $this->db->where($condition);
                            $query = $this->db->get();
                            $data['db']=$query->result();
                            $count = count($data['db']);
                           ?> 
                              <td style="text-align:center"> <?php echo $count; ?> </td>
                              <td class="anand" id="<?php echo $rowb->userid; ?>"  > Details </td>
                             </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                        
                        <table class="table table-bordered table-hover">
                          
                          <tbody>
                              
                            <?php  $a =1;
                             foreach ($grantaccrecords as $row33) { ?>
                            <tr>
                              <td><?php echo $a++; ?> </td>
                              <td> <?php echo $row33->name; ?></td>
                              <td><?php echo $row33->username; ?> </td>
                              <td style="display: inline-flex;">
                             <?php echo form_open('AdminController/grantaccess'); ?>
                                
                                <input type="hidden" name="userid" value="<?php echo $row33->userid; ?>">
                                <input type="hidden" name="username" value="<?php echo $row33->username; ?>">
                                 <input type="hidden" name="Approved" value="1">
                                <input type="submit" class="form-control btn btn-success submit" id="1"  value="Approve"  >
                      
                            <?php echo form_close(); ?> 
                            &nbsp;  &nbsp;  &nbsp;
                            <?php echo form_open('AdminController/rejectrequest'); ?>
                             
                                <input type="hidden" name="userid" value="<?php echo $row33->userid; ?>">
                                <input type="hidden" name="username" value="<?php echo $row33->username; ?>">
                                 <input type="hidden" name="Reject" value="2">
                                <input type="submit" class="form-control btn btn-danger submit" id="2"  value="Reject" >
                               
                              <?php echo form_close(); ?>    
                             </td>
                             
                            
                            </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                      </div><!--end of .table-responsive-->
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
         <!--start pop-up-->
<div class="modal in" id="myModal" role="dialog" style="display: none;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
   
        <div class="modal-body">
              
                                <table>
                                     <thead>
                                    <tr><th> Dates request accepted</th></tr>
                                    </thead>
                                    <tbody>
                                    <tr id="tsety">
                                    
                                    </tr>
                                    </tbody>
                                    
                                </table>
                            
         </div>
        <div class="modal-footer" style="border-top:none">
          <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
         <!--end pop up-->
         
         
      </main>
      <!-- <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">-->
      <!--  <span>Copyright © 2017 Designed by-->
      <!--    <a href="#"   title="Colorlib">Arfeenkhan</a>. All rights reserved.</span>-->
      <!--</footer>-->
    </div>
  </div>
  <script type="text/javascript" src="https://arfeenkhan.com/coachstat/form/super/js/vendor.js"></script>
  <script type="text/javascript" src="https://arfeenkhan.com/coachstat/form/super/js/bundle.js"></script>
</body>
  
<script>
$(".anand").click(function(){
    //alert('asdfas');
 var uid =  $(this).attr('id');
  //window.location.href="<?php echo base_url() ?>AdminController/admin_login_process#clickacc?id=" +uid;
  $.ajax({
           "url": "<?php echo site_url('AdminController/getuserwithdate')?>",
           "type": "POST",
           data: {uid:uid},
           dataType: "text",  
            cache:false,
         complete: function (response) {
        },
        success :  function (result) {
          console.log(result);
          
          $('#tsety').html(result);
          $('#myModal').show();
        },

        error: function () {
           
        },
    });
//
});
$(".close").on( "click", function() {
    $("#myModal").hide();
});
     $("#clickstp").click(function () {
  //  alert('dsfa');
        $("#addstep").css("display","block")
         $("#stepdetail").css("display","block")
          $('#grantdetails').css("display","none")
        $("#addvideodetails").css("display","none")
        $("#pdfsdetails").css("display","none")
        $("#addvideo").css("display","none")
        $('#addpdf').css("display","none")
          $('#grantaccess').css("display","none")
         
    });
    $("#clickvideo").click(function () {
  //  alert('dsfa');
        $("#addstep").css("display","none")
        $("#stepdetail").css("display","none")
        $("#addvideodetails").css("display","block")
         $('#grantdetails').css("display","none")
        $("#pdfsdetails").css("display","none")
        $("#addvideo").css("display","block")
        $('#addpdf').css("display","none")
          $('#grantaccess').css("display","none")
         
    });
     $("#clikpdf").click(function () {
  //  alert('dsfa');
        $("#addstep").css("display","none")
        $("#stepdetail").css("display","none")
        $('#grantdetails').css("display","none")
        $("#addvideodetails").css("display","none")
        $("#pdfsdetails").css("display","block")
        $("#addvideo").css("display","none")
        $('#addpdf').css("display","block")
          $('#grantaccess').css("display","none")
         
    });
     $("#clickacc").click(function () {
  //  alert('dsfa');
        $("#addstep").css("display","none")
       $("#stepdetail").css("display","none")
       $("#addvideodetails").css("display","none")
       $('#grantdetails').css("display","block")
       $("#pdfsdetails").css("display","none")
        $("#addvideo").css("display","none")
        $('#addpdf').css("display","none")
          $('#grantaccess').css("display","block")
         
    });
    
</script>
</html>