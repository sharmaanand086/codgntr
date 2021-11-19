  <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                            <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius" style="display: none;">
                                <option selected>Aug 19</option>
                                <option value="1">July 19</option>
                                <option value="2">Jun 19</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                 <?php
                   if($this->session->flashdata('Success')){
                       ?><div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                     <?php echo $this->session->flashdata('Success'); ?>
                          </div>
                   <?php
                   	 unset($_SESSION['Success']);
                   }
                	?>
                <form method='post' action='<?php echo base_url();?>backend/submit_editporfile' enctype='multipart/form-data'>
                    <input type="hidden" name="CustomerID" value="<?php echo $this->session->userdata('CustomerID'); ?>">
                    <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card card-column">
                            <div class="col-sm-6 col-md-6">
                                 <div class="card-body">
                                <h4 class="card-title">Name *</h4>
                             
                                    <div class="form-group">
                                    <input type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="Name" name="DentistName" value="<?php echo $DentistName; ?>" required>
                                    <div class="invalid-feedback"> Sorry, that username's taken. Try another? </div>
                                    <div class="valid-feedback" >Success! You've done . </div>
                                    </div> 
                            </div>
                            </div>
                          <div class="col-sm-6 col-md-6">
                             <div class="card-body">
                                <h4 class="card-title">Email *</h4>
                             
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="EMailID" id="emailtext" aria-describedby="email" placeholder="Email"  value="<?php echo $EMailID; ?>" required>
                                    <div class="invalid-feedback"> Sorry, that Email. taken. Try another? </div>
                                    <div class="valid-feedback" >Success! You've done . </div>
                                    </div> 
                            </div>
                             
                          </div>
                             
                        </div>
                    </div>                                         
                </div>

                 <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card card-column">
                             <div class="col-sm-6 col-md-6">
                               <div class="card-body">
                                <h4 class="card-title">Contact No *</h4>                             
                                <div class="form-group" >
                                    <div id="idbase">                                     
                                       <!--  
                                        <div class="field_wrapper" style="position: relative;" >
                                             <input type="text" required name="PhoneNo[]" class="form-control" id="contacttext" aria-describedby="contacttext"  value="<?php echo $PhoneNo; ?>" placeholder="Contact No">
                                             <a class="add_button danger" title="Add field"  href="javascript:void(0);"><img  style="width: 20px; height: 20px;"src="<?php echo base_url('assets/images/plus.png'); ?>"></a>
                                        </div>
 -->

                                         <?php if(isset($MobileNo)){  $desc1 =  explode(",",$MobileNo); $maxcount1= count($desc1); 

                                        if($maxcount1>1){
                                            for($y=0; $y<count($desc1); $y++)
                                             {
                                                 
                                                 echo'<div class="field_wrapper" style="position: relative;" ><input type="text" required name="PhoneNo[]" class="form-control" id="contacttext" aria-describedby="contacttext" placeholder="Contact No" value='.$desc1[$y].'>';
                                                 if($y==0){
                                                     echo'<a class="add_button danger" title="Add field"  href="javascript:void(0);"><img  style="width: 20px; height: 20px;"src="http://doctor.illusionaligners.com/assets/images/plus.png"></a></div>';
                                                 }else{
                                                    echo '<a href="javascript:void(0);" class="remove_button danger"><img  style="width: 16px; height: 16px;"src="http://doctor.illusionaligners.com/assets/images/minus.png"></a></div>';
                                                 }
                                                 
                                             }
                                            
                                            }else if($maxcount1==1){
                                                  echo'<div class="field_wrapper" style="position: relative;" ><input type="text" required name="PhoneNo[]" class="form-control" id="contacttext" aria-describedby="contacttext" placeholder="Contact No" value='.$desc1[0].'>';
                                                 
                                                     echo'<a class="add_button danger" title="Add field"  href="javascript:void(0);"><img  style="width: 20px; height: 20px;"src="http://doctor.illusionaligners.com/assets/images/plus.png"></a></div>';
                                                  
                                            }
                                         }else{
                                                echo'<div class="field_wrapper" style="position: relative;" ><input type="text" required name="PhoneNo[]" class="form-control" id="contacttext" aria-describedby="contacttext" placeholder="Contact No" value="">';
                                                 echo'<a class="add_button danger" title="Add field"  href="javascript:void(0);"><img  style="width: 20px; height: 20px;"src="http://doctor.illusionaligners.com/assets/images/plus.png"></a></div>';
                                         }
                                            ?>
                                    </div>
                                   
                                    <div class="invalid-feedback"> Sorry, that Contact no. taken. Try another? </div>
                                    <div class="valid-feedback" >Success! You've done . </div>
                                </div> 
                               </div>
                             </div> 
                             <div class="col-sm-6 col-md-6">
                               <div class="card-body">
                                 <h4 class="card-title">Whatsapp No *</h4>                             
                                    <div class="form-group">
                                    <div id="idbase1"> 
                                        

                                        <!--  <input type="text" required name="MobileNo[]" class="form-control" id="whatsappnotext" aria-describedby="whatsappnotext" placeholder="Contact No" value="<?php echo $MobileNo; ?>">

                                         <a class="add_button1 danger" title="Add field"  href="javascript:void(0);"><img  style="width: 20px; height: 20px;"src="<?php echo base_url('assets/images/plus.png'); ?>"></a>
                                        </div>
                                            -->
                                        <?php  if(isset($WhatsappNo)){
                                            $desc =  explode(",",$WhatsappNo); $maxcount= count($desc); 
                                      
                                        if($maxcount>1){
                                            for($i=0; $i<count($desc); $i++)
                                             {
                                                 
                                                 echo'<div class="field_wrapper1" style="position: relative;" ><input type="text" required name="MobileNo[]" class="form-control" id="whatsappnotext" aria-describedby="whatsappnotext" placeholder="Contact No" value='.$desc[$i].'>';
                                                 if($i==0){
                                                     echo'<a class="add_button1 danger" title="Add field"  href="javascript:void(0);"><img  style="width: 20px; height: 20px;"src="http://doctor.illusionaligners.com/assets/images/plus.png"></a></div>';
                                                 }else{
                                                    echo '<a href="javascript:void(0);" class="remove_button1 danger"><img  style="width: 16px; height: 16px;"src="http://doctor.illusionaligners.com/assets/images/minus.png"></a></div>';
                                                 }
                                                 
                                             }
                                            
                                            }else if($maxcount==1){
                                                 echo'<div class="field_wrapper1" style="position: relative;" ><input type="text" required name="MobileNo[]" class="form-control" id="whatsappnotext" aria-describedby="whatsappnotext" placeholder="Contact No" value='.$desc[0].'>';
                                                 
                                                     echo'<a class="add_button1 danger" title="Add field"  href="javascript:void(0);"><img  style="width: 20px; height: 20px;"src="http://doctor.illusionaligners.com/assets/images/plus.png"></a></div>';
                                                  
                                            }
                                        }else{
                                            echo'<div class="field_wrapper1" style="position: relative;" ><input type="text" required name="MobileNo[]" class="form-control" id="whatsappnotext" aria-describedby="whatsappnotext" placeholder="Contact No" value="">';
                                            echo'<a class="add_button1 danger" title="Add field"  href="javascript:void(0);"><img  style="width: 20px; height: 20px;"src="http://doctor.illusionaligners.com/assets/images/plus.png"></a></div>';
                                        }
                                            ?>
                                     
                                     <div class="invalid-feedback"> Sorry, that Contact no. taken. Try another? </div>
                                       <div class="valid-feedback" >Success! You've done . </div>
                                </div>                         
                             
                             </div>
                        </div>
                    </div>
                </div>
             </div>
         </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card card-column">
                             <div class="col-sm-6 col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">Address *</h4>                             
                                    <div class="form-group">
                                        <input type="text" class="form-control margin-address1" id="addresstext" aria-describedby="address" name="Address1" value="<?php echo $Address1; ?>" placeholder="Address"   required style="margin-bottom: 3px;" >
                                         <input type="text" class="form-control" id="addresstext" aria-describedby="address" name="Address2" value="<?php echo $Address2; ?>" placeholder="Address2" required>
                                    <div class="invalid-feedback"> Sorry, that address. taken. Try another? </div>
                                    <div class="valid-feedback" >Success! You've done . </div>
                                    </div> 
                                </div>
                             </div> 

                             <div class="col-sm-6 col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">Country *</h4>                             
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                         
                                        <select class="custom-select" name="country"  id="countrytext">
                                            <option selected="">Choose...</option>
                                          
                                              <?php foreach( $country as $mycountry):
                                            if($Country==$mycountry->Description){
                                                ?>
                                                 <option value="<?= $mycountry->Description; ?>" selected><?= $mycountry->Description; ?></option>
                                                 <?php
                                            }else{
                                                 ?>
                                                 <option value="<?= $mycountry->Description; ?>" ><?= $mycountry->Description; ?></option>
                                                 <?php
                                            } ?> 
                                          <?php endforeach; ?>
                                        </select>
                                    </div>
                                        
                                    <div class="invalid-feedback"> Sorry, that Country. taken. Try another? </div>
                                    <div class="valid-feedback" >Success! You've done . </div>
                                    </div> 
                                </div>
                             </div>

                        </div>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card card-column">
                             <div class="col-sm-6 col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">State *</h4>                             
                                    <div class="form-group">
                                        <select class="custom-select" name="State"  id="statetext">
                                            <option selected="">Choose...</option>
                                            <?php 
                                            if(isset($State)){
                                            foreach( $allstate as $mystates):
                                            if($State==$mystates->Description){
                                                ?>
                                                 <option value="<?= $mystates->Description; ?>" selected><?= $mystates->Description; ?></option>
                                                 <?php
                                            }else{
                                                 ?>
                                                 <option value="<?= $mystates->Description; ?>" ><?= $mystates->Description; ?></option>
                                                 <?php
                                            }
                                            ?> 
                                          <?php endforeach; 
                                          }else{
                                               foreach( $allstate as $mystates):
                                                 ?>
                                                 <option value="<?= $mystates->Description; ?>" ><?= $mystates->Description; ?></option>
                                                 <?php 
                                               endforeach; 
                                          }?>
                                        </select>                                
                                    <div class="invalid-feedback"> Sorry, that state. taken. Try another? </div>
                                    <div class="valid-feedback" >Success! You've done . </div>
                                    </div> 
                                </div>
                             </div> 
                             <div class="col-sm-6 col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">City *</h4>                             
                                    <div class="form-group">
                                          <select class="custom-select" name="city"  id="citytext">
                                            <option selected="">Choose...</option>
                                         <?php
                                            if(isset($city)){
                                            foreach( $allcity as $mycity):
                                            if($city==$mycity->City_Name){
                                                ?>
                                                 <option value="<?= $mycity->City_Name; ?>" selected><?= $mycity->City_Name; ?></option>
                                                 <?php
                                            }else{
                                                 ?>
                                                 <option value="<?= $mycity->City_Name; ?>" ><?= $mycity->City_Name; ?></option>
                                                 <?php
                                            } ?> 
                                          <?php 
                                          endforeach; 
                                          }else{
                                                foreach( $allcity as $mycity):
                                                 ?>
                                                  <option value="<?= $mycity->City_Name; ?>" ><?= $mycity->City_Name; ?></option>
                                                 <?php 
                                               endforeach; 
                                          }
                                          ?>
                                             </select>                                    
                                    <div class="invalid-feedback"> Sorry, that city. taken. Try another? </div>
                                    <div class="valid-feedback" >Success! You've done . </div>
                                    </div> 
                                </div>
                             </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card card-column">
                             <div class="col-sm-6 col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">Pincode *</h4>                             
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="pincodetext" aria-describedby="pincode" name="PinCode" value="<?php echo $PinCode; ?>" placeholder="Pincode" required>
                                    <div class="invalid-feedback"> Sorry, that Pincode. taken. Try another? </div>
                                    <div class="valid-feedback" >Success! You've done . </div>
                                    </div> 
                                </div>
                             </div> 
                             <div class="col-sm-6 col-md-6">
                                <div class="card-body" style="display:none">
                                    <h4 class="card-title">Map Adress *</h4>                             
                                    <div class="form-group">
                                      <input type="text"  class="form-control" value="test" id="mapaddresstext" aria-describedby="mapaddress" name="mapaddress" placeholder="Map Adress" required>
                                      <input type="hidden" name="longitude" value="10.10">
                                      <input type="hidden" name="latitude" value="10.10">

                                    <div class="invalid-feedback"> Sorry, that Map Adress. taken. Try another? </div>
                                    <div class="valid-feedback" >Success! You've done . </div>
                                    </div> 
                                </div>
                             </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card card-column">
                             <div class="col-sm-6 col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">Speciality </h4>                             
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="Specialitytext" aria-describedby="Speciality" name="Speciality" value="<?php echo $Speciality; ?>"  placeholder="Speciality" >
                                    <div class="invalid-feedback"> Sorry, that Speciality. taken. Try another? </div>
                                    <div class="valid-feedback" >Success! You've done . </div>
                                    </div> 
                                </div>
                             </div> 
                               <div class="col-sm-6 col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">Education </h4>                             
                                    <div class="form-group">
                                        <input type="text" name="Education" value="<?php echo $Education; ?>" class="form-control" id="educationtext" aria-describedby="education" placeholder="Education" >
                                    <div class="invalid-feedback"> Sorry, that Education. taken. Try another? </div>
                                    <div class="valid-feedback" >Success! You've done . </div>
                                    </div> 
                                </div>
                             </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card card-column">


                             <div class="col-sm-6 col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">Short Description</h4>                             
                                    <div class="form-group">
                                        <textarea class="form-control"  name="shortDescription"  rows="3" id="shortdesctext"  placeholder="Short Description" ><?php echo$LongDescription; ?></textarea>
                                      
                                    <div class="invalid-feedback"> Sorry, that Short Description. taken. Try another? </div>
                                    <div class="valid-feedback" >Success! You've done . </div>
                                    </div> 
                                </div>
                             </div>


                             <div class="col-sm-6 col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">Long Description</h4>                             
                                    <div class="form-group">
                                        <textarea class="form-control" name="longDescription" rows="3" id="longdesctext"  placeholder="Long Description" ><?php echo$ShortDescription; ?></textarea>
                                      
                                    <div class="invalid-feedback"> Sorry, that Long Description. taken. Try another? </div>
                                    <div class="valid-feedback" >Success! You've done . </div>
                                    </div> 
                                </div>
                             </div> 
                            
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card card-column">
                             <div class="col-sm-6 col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">Certification </h4> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file"  name="filescert[]" value="" multiple class="custom-file-input" id="inputGroupFile02" >
                                            <label class="custom-file-label" for="inputGroupFile02" id="label_inputGroupFile02">Choose file</label>
                                        </div>
                                         
                                    </div>
                                    <div id="msgerror"></div>
                                    <p id="hiddenpreview" style="<?php if(isset($certificaete_data)){  echo "display:block";  }else{ echo "display:none"; } ?>">Image Preview</p>
                                    <div id="dvPreview"></div>
                                </div> 
                                <div class="row">
                                     <?php 
                                    if(isset($certificaete_data)){
                                        $c=0;
                                        foreach($certificaete_data as $CertdataImg):
                                   ?>
                                   <div id="thiscert<?php echo $c; ?>"  class="col-lg-3 col-md-6">
                                       <div class="card">
                                           <a class="delete_button2"  onClick="deleteCertification(this.id)" id="<?php echo $CustomerID; ?>&<?php if(isset($CertdataImg)){ echo $CertdataImg->FileURL; } ?>&<?php echo $c; ?>" title="delete Gallery"  href="javascript:void(0);" style="text-align:end">
                                              <img class="deletingcss" src="<?php echo base_url(); ?>assets/images/deleting.png">
                                           </a>
                                           <img id="Certificationnone" class="card-img-top img-fluid" src="<?php  echo $CertdataImg->FileURL;  ?>"  style="<?php if(isset($CertdataImg->FileURL)){  echo "display:block";  }else{ echo "display:none"; } ?>">
                                       
                                        </div>
                                   </div>
                                    <?php $c++; endforeach; } ?>
                                    </div>
                             </div> 
                             <div class="col-sm-6 col-md-6">
                                  
                                <div class="card-body">
                                    <h4 class="card-title">Image Gallery </h4>                             
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" multiple  value="" name="filesimage[]" class="custom-file-input" id="inputGroupFile03">
                                            <label class="custom-file-label" id="label_inputGroupFile03" for="inputGroupFile03">Choose file</label>
                                        </div>
                                    </div> 
                                     <div id="msgerror2"></div>
                                    <p id="hiddenpreview2" style="<?php if(isset($image_gallery_data)){  echo "display:block";  }else{ echo "display:none"; } ?>">Image Preview</p>
                                    <div id="dvPreview2"></div>
                                   
                                </div>
                                <div class="row">
                                    <?php 
                                    
                                    if(isset($image_gallery_data)){
                                         $g=0;
                                        foreach($image_gallery_data as $galaryImg):
                                   ?>
                                   <div id="thisgallery<?php echo $g; ?>" class="col-lg-3 col-md-6">
                                       <div class="card">
                                          <a class="delete_button1 danger"  onClick="deleteGallery(this.id)" id="<?php echo $CustomerID; ?>&<?php if(isset($galaryImg)){ echo $galaryImg->FileURL; } ?>&<?php echo $g; ?>" title="delete Gallery"  href="javascript:void(0);" style="text-align: end;">
                                           <img class="deletingcss" src="<?php echo base_url(); ?>assets/images/deleting.png">
                                         </a>
                                          <img id="Gallerynone"  class="card-img-top img-fluid" src="<?php echo $galaryImg->FileURL; ?>"     style="<?php if(isset($galaryImg->FileURL)){  echo "display:block";  }else{ echo "display:none"; } ?>">
                                       
                                         </div>
                                   </div>
                                     <?php $g++; endforeach; } ?>
                                 </div>
                             </div>
                        </div>
                    </div>
                </div>
                   <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card card-column">
                             <div class="col-sm-6 col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">Profile Image *</h4>
                                     <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                          <?php 
                                            if(isset($profile)){
                                             foreach($profile as $ProfileImg):
                                             ?>
                                            <input type="file"   name="profile_img" class="custom-file-input" id="inputGroupFile01" value="<?php if(isset($ProfileImg)){ echo $ProfileImg->FileURL; }else{ echo "required"; } ?>"> 
                                            <?php endforeach; }
                                            if(!$profile){
                                              ?>
                                            <input type="file"   name="profile_img" class="custom-file-input" id="inputGroupFile01" required> 
                                            <?php  
                                            } ?> 
                                            <label class="custom-file-label" id="label_inputGroupFile01"for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div> 
                                    <div id="msgerror3"></div>
                                    <p id="hiddenpreview3" style="<?php if(isset($profile)){  echo "display:block";  }else{ echo "display:none"; } ?>">Image Preview</p>
                                    <div id="dvPreview3"></div>
                                </div>
                                <div class="row">
                                    <?php 
                                    if(isset($profile)){
                                        $p=0;
                                     foreach($profile as $ProfileImg):
                                     ?>
                                     <div id="thisprof<?php echo $p; ?>" class="col-lg-3 col-md-6">
                                          <div class="card">
                                            <!-- <a class="delete_button danger"  onClick="deleteProfile(this.id)" id="<?php echo $CustomerID; ?>&<?php if(isset($ProfileImg)){ echo $ProfileImg->FileURL; } ?>&<?php echo $p; ?>" title="delete profile"  href="javascript:void(0);" style="text-align:end">-->
                                            <!--   <img class="deletingcss" src="<?php echo base_url(); ?>assets/images/deleting.png">-->
                                            <!--</a>-->
                                            <img id="Profilenone" class="card-img-top img-fluid"  src="<?php if(isset($ProfileImg)){ echo $ProfileImg->FileURL;  }else{ echo"0"; } ?>" width="30%" style="border-radius: 12%;<?php if(isset($ProfileImg->FileURL)){  echo "display:block";  }else{ echo "display:none"; } ?>">  
                                           </div>
                                     </div>
                                     <input type="hidden" name="existingProfile" value="<?php if(isset($ProfileImg)){ echo $ProfileImg->FileURL; } ?>">
                                    <?php $p++; endforeach; } ?> 
                                    
                                    </div>
                             </div> 
                             <div class="col-sm-6 col-md-6">
                                <div class="card-body">
                                   
                                    <h4 class="card-title">Opening and closing timings</h4>
                                 <div class="form-check form-check-inline">
                                  <input type="text" name="morningtime" placeholder="Enter Morning Time" class="form-control" value="<?php if(isset($ClinicTiming)){ echo $ClinicTiming;
                                              }else{    } ?>" required><br>
                                    
                                </div>
                                 
                                 

                                 
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-sm-12 col-md-12">   
                        <div class="card card-column">
                              <div class="card-body" style="text-align: center;">
                            <button class="btn btn-danger btn-lg" type="submit" >
                            Submit
                             </button>
                            </div>
                        </div>
                    </div>
                 </div>
                </form>



            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved by Illusion Aligners.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
          <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
      
    $(document).ready(function(){
    var maxField = 5; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('#idbase'); //Input field wrapper
    var fieldHTML = '  <div class="field_wrapper" style="position: relative;margin-top:5px;" ><input type="text" class="form-control" id="contacttext" aria-describedby="contacttext" name="PhoneNo[]" placeholder="Contact No" required><a href="javascript:void(0);" class="remove_button danger"><img  style="width: 16px; height: 16px;"src="<?php echo base_url('assets/images/minus.png'); ?>"></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        } 
     });


    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

    
});

 $(document).ready(function(){
    var maxField1 = 5; //Input fields increment limitation
    var addButton1 = $('.add_button1'); //Add button selector
    var wrapper1 = $('#idbase1'); //Input field wrapper
    var fieldHTML1 = '  <div class="field_wrapper1" style="position: relative;margin-top:5px;" ><input type="text" class="form-control" id="whatsappcontacttext" aria-describedby="contacttext" name="MobileNo[]" placeholder="Contact No" required><a href="javascript:void(0);" class="remove_button1 danger"><img  style="width: 16px; height: 16px;"src="<?php echo base_url('assets/images/minus.png'); ?>"></a></div>'; //New input field html 
    var y = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton1).click(function(){
        //Check maximum number of input fields
        if(y < maxField1){ 
            y++; //Increment field counter
            $(wrapper1).append(fieldHTML1); //Add field html
        } 
     });


    //Once remove button is clicked
    $(wrapper1).on('click', '.remove_button1', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        y--; //Decrement field counter
    });

    
});


 window.onload = function () {
    var fileUpload = document.getElementById("inputGroupFile02");
    fileUpload.onchange = function () {
        if (typeof (FileReader) != "undefined") {
            //document.getElementById('hiddenpreview').style.display = "block";
            var dvPreview = document.getElementById("dvPreview");
            dvPreview.innerHTML = "";
            var regex = /^(.jpg|.jpeg|.gif|.png)$/;
            
            for (let i = 0; i < fileUpload.files.length; i++) {
                var file = fileUpload.files[i];
               // console.log(file);
                 var imgvar = new Image();
                var _URL = window.URL || window.webkitURL;
                imgvar.src = _URL.createObjectURL(file);
                imgvar.onload = function() {
                var imgwidth = this.width;
                var imgheight = this.height;
                var typeimage = file.type;
               var sizeimage = file.size;
              // alert(sizeimage);
               if(sizeimage > 2000000){
                    document.getElementById('msgerror').innerHTML = " File size must be less then 2mb.";
                     document.getElementById("inputGroupFile02").value = null;
                    document.getElementById("label_inputGroupFile02").innerHTML = 'Choose file';
                    document.getElementById('hiddenpreview').style.display = "none";
               }else if(imgwidth > 1000 || imgwidth < 300 || imgheight > 1000 || imgheight < 300 ){
                        document.getElementById('msgerror').innerHTML = " File size will be below 1000*1000";
                        document.getElementById("inputGroupFile02").value = null;
                        document.getElementById("label_inputGroupFile02").innerHTML = 'Choose file';
                        document.getElementById('hiddenpreview').style.display = "none";
                }else{
                 if(typeimage == 'image/gif' || typeimage=='image/jpeg' || typeimage=='image/jpg' || typeimage=='image/png'){
                        let reader = new FileReader();
                        reader.onload = function (e) {
                        let img = document.createElement("IMG");
                         console.log(img);
                        img.height = "100";
                        img.width = "100";
                        img.id = "image"+i;
                        img.src = e.target.result;
                       // dvPreview.appendChild(img);

                         
                    }
                    reader.readAsDataURL(file);
                }else{
                     document.getElementById('hiddenpreview').style.display = "none";
                    document.getElementById('msgerror').innerHTML =file.name + " is not a valid image type.";
                }

               }
               
              } 
            }
        } else {
            document.getElementById('hiddenpreview').style.display = "none";
            
            document.getElementById('msgerror').innerHTML ="This browser does not support HTML5 FileReader.";
        }
    }

     var fileUpload2 = document.getElementById("inputGroupFile03");
    fileUpload2.onchange = function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview2 = document.getElementById("dvPreview2");
           // document.getElementById('hiddenpreview2').style.display = "block";
            dvPreview2.innerHTML = "";
            var regex = /^(.jpg|.jpeg|.gif|.png)$/;
            for (var i = 0; i < fileUpload2.files.length; i++) {
                var file2 = fileUpload2.files[i];

                var imgvar2 = new Image();
                var _URL = window.URL || window.webkitURL;
                imgvar2.src = _URL.createObjectURL(file2);
                imgvar2.onload = function() {
                var imgwidth = this.width;
                var imgheight = this.height;
                var typeimage2 = file2.type;
                var sizeimage2 = file2.size;
                if(sizeimage2 > 2000000){
                    document.getElementById('msgerror2').innerHTML = " File size must be less then 2mb.";
                     document.getElementById("inputGroupFile03").value = null;
                    document.getElementById("label_inputGroupFile03").innerHTML = 'Choose file';
                    document.getElementById('hiddenpreview2').style.display = "none";
                }else if(imgwidth > 1000 || imgwidth < 300 || imgheight > 1000 || imgheight < 300 ){
                        document.getElementById('msgerror2').innerHTML = " File size will be below 1000*1000";
                        document.getElementById("inputGroupFile03").value = null;
                        document.getElementById("label_inputGroupFile03").innerHTML = 'Choose file';
                        document.getElementById('hiddenpreview2').style.display = "none";
                }else{
                     if(typeimage2 == 'image/gif' || typeimage2=='image/jpeg' || typeimage2=='image/jpg' || typeimage2=='image/png'){
                            var reader2 = new FileReader();
                            reader2.onload = function (e) {
                            var img2 = document.createElement("IMG");
                            img2.height = "100";
                            img2.width = "100";
                            img2.src = e.target.result;
                           // dvPreview2.appendChild(img2);
                        }
                        reader2.readAsDataURL(file2);
                         document.getElementById('msgerror2').innerHTML = "";
                        }else{
                             document.getElementById('hiddenpreview2').style.display = "none";
                            document.getElementById('msgerror2').innerHTML =file2.name + " is not a valid image type.";
                        }                
                    }
                }
            }
        } else {
               document.getElementById('hiddenpreview2').style.display = "none";
            document.getElementById('msgerror2').innerHTML ="This browser does not support HTML5 FileReader.";
        }
    }

     var fileUpload3 = document.getElementById("inputGroupFile01");
    fileUpload3.onchange = function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview3 = document.getElementById("dvPreview3");
       //     document.getElementById('hiddenpreview3').style.display = "block";


            dvPreview3.innerHTML = "";
            var regex = /^(.jpg|.jpeg|.gif|.png)$/;    
            for (var i = 0; i < fileUpload3.files.length; i++) {
                var file3 = fileUpload3.files[i];

                var imgvar3 = new Image();
                var _URL = window.URL || window.webkitURL;
                imgvar3.src = _URL.createObjectURL(file3);
                imgvar3.onload = function() {
                    var imgwidth = this.width;
                    var imgheight = this.height;
                    var typeimage3 = file3.type;
                    var sizeimage3 = file3.size;
                   if(sizeimage3 > 2000000){
                        document.getElementById('msgerror3').innerHTML = " File size must be less then 2mb.";
                        document.getElementById("inputGroupFile01").value = null;
                        document.getElementById("label_inputGroupFile01").innerHTML = 'Choose file';
                        document.getElementById('hiddenpreview3').style.display = "none";
                   }else if(imgwidth > 1000 || imgwidth < 300 || imgheight > 1000 || imgheight < 300 ){
                        document.getElementById('msgerror3').innerHTML = " File size will be below 1000*1000";
                        document.getElementById("inputGroupFile01").value = null;
                        document.getElementById("label_inputGroupFile01").innerHTML = 'Choose file';
                        document.getElementById('hiddenpreview3').style.display = "none";
                   }else{
                       if(typeimage3 == 'image/gif' || typeimage3=='image/jpeg' || typeimage3=='image/jpg' || typeimage3=='image/png'){
                            var reader3 = new FileReader();
                            reader3.onload = function (e) {
                            var img3 = document.createElement("IMG");
                            img3.height = "100";
                            img3.width = "100";
                            img3.src = e.target.result;
                          //  dvPreview3.appendChild(img3);
                        }
                        reader3.readAsDataURL(file3);
                        }else{
                          document.getElementById('hiddenpreview3').style.display = "none";
                        document.getElementById('msgerror3').innerHTML =file3.name + " is not a valid image type.";
                        }
                   }
                }
            }

        } else {
            document.getElementById('hiddenpreview3').style.display = "none";
            document.getElementById('msgerror3').innerHTML ="This browser does not support HTML5 FileReader.";
        }
    }
};
 
</script>
<script type="text/javascript">
    var surl = '<?php echo base_url(); ?>';
  $('#countrytext').change(function(){
  var countryID = $(this).val();  
  if(countryID)
    {
        $.ajax({
          type:"POST",
          data:{countryID:countryID},
          url:surl+"backend/filterstates",
          success:function(res){   
            var currstate = '<?php echo $State;?>';
              var returnedData = JSON.parse(res);
            //  console.log(returnedData);
              for (var i = returnedData.length - 1; i >= 0; i--) {

                var lowerstate = returnedData[i].Description.toLowerCase();
                var lowercrrstate = currstate.toLowerCase();
                console.log(lowerstate);
                 if(lowercrrstate==lowerstate){
                      $("#statetext").append('<option selected value="'+returnedData[i].Description+'">'+returnedData[i].Description+'</option>'); 
                 }else{
                    $("#statetext").append('<option value="'+returnedData[i].Description+'">'+returnedData[i].Description+'</option>'); 
                 }
                  
              }
              }
           });
    }
    else
    {
    
    }   
  });

$('#statetext').change(function(){
  var statename = $(this).val();  
  
  if(statename)
    {
        $.ajax({
          type:"POST",
          data:{statename:statename},
          url:surl+"backend/filtercity",
          success:function(data){   
            var currcity = '<?php echo $city;?>';         
               var returnedcity = JSON.parse(data);  
               $("#citytext").empty();                         
               for (var i = returnedcity.length - 1; i >= 0; i--) {
                var lowercity = returnedcity[i].City_Name.toLowerCase();
                var lowercrrcity = currcity.toLowerCase();
                 console.log(returnedcity[i].City_Name);
                 if(lowercrrcity==lowercity){
                      $("#citytext").append('<option selected value="'+returnedcity[i].City_Name+'">'+returnedcity[i].City_Name+'</option>'); 
                 }else{
                     
                    $("#citytext").append('<option value="'+returnedcity[i].City_Name+'">'+returnedcity[i].City_Name+'</option>'); 
                 }
                  
               }
              }
           });
    }
    else
    {
    
    }   
  });
function deleteProfile(id){
      var custid = id.split('&');
      var CustomerID=custid[0];
      var FileUrl=custid[1];
       var delp=custid[2];
      var  Title= 'CustomerProfile';
  if(CustomerID)
    {
        $.ajax({
          type:"POST",
          data:{CustomerID:CustomerID,FileUrl:FileUrl,Title:Title},
          url:surl+"backend/deleteProfileimage",
          success:function(data){  
              var returned = JSON.parse(data);  
               console.log(returned.status_code);  
               if(returned.status_code){
                 document.getElementById("thisprof"+delp).style.display = "none";
                
               }
               
              }
          });
    }
     
  }
  function deleteGallery(id){
      var custid = id.split('&');
      var CustomerID=custid[0];
      var FileUrl=custid[1];
      var delg=custid[2];
      var  Title= 'CustomerImageGallery';
  if(CustomerID)
    {
        $.ajax({
          type:"POST",
          data:{CustomerID:CustomerID,FileUrl:FileUrl,Title:Title},
          url:surl+"backend/deleteProfileimage",
          success:function(data){  
              var returned = JSON.parse(data);  
               console.log(delg);  
            
               if(returned.status_code){
                 document.getElementById("thisgallery"+delg).style.display = "none";
                  
               }
               
              }
          });
    }
     
  }
    function deleteCertification(id){
      var custid = id.split('&');
      var CustomerID=custid[0];
      var FileUrl=custid[1];
      var del=custid[2];
      var  Title= 'CustomerCertificates';
  if(CustomerID)
    {
        $.ajax({
          type:"POST",
          data:{CustomerID:CustomerID,FileUrl:FileUrl,Title:Title},
          url:surl+"backend/deleteProfileimage",
          success:function(data){  
              var returned = JSON.parse(data);  
               console.log(returned.status_code);  
               if(returned.status_code){
                 document.getElementById("thiscert"+del).style.display = "none";
                
                  
               }
               
              }
          });
    }
     
  }
  
  
  
  

</script>