
<?php
$start;
$end;
//var_dump($getalldate);

foreach($getalldate as $datenew)
{
    $start=$datenew->start;
    $end=$datenew->end;
}

?>
<!DOCTYPE html>
<html>
    <head>
    <title>90 Days</title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo base_url();?>assets2/css/bootstrap.min.css" rel="stylesheet">
        <link href='<?php echo base_url();?>assets2/css/fullcalendar.css' rel='stylesheet' />
        <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css"> -->
        <link href="<?php echo base_url();?>assets2/css/bootstrapValidator.min.css" rel="stylesheet" /> 
        <link href='<?php echo base_url(); ?>assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />       
        <link href="<?php echo base_url();?>assets2/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
        <!-- Custom css  -->
        <link href="<?php echo base_url();?>assets2/css/custom.css" rel="stylesheet" />

        <script src='<?php echo base_url();?>assets2/js/moment.min.js'></script>
        <script src="<?php echo base_url();?>assets2/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets2/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets2/js/bootstrapValidator.min.js"></script>
        <script src="<?php echo base_url();?>assets2/js/fullcalendar.min.js"></script>
        <script src='<?php echo base_url();?>assets2/js/bootstrap-colorpicker.min.js'></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <script src='<?php echo base_url();?>assets2/js/main.js'></script>
        <style>
            .topic .col-sm-3, .topic .col-sm-8, .topic .col-sm-1{
                padding: 0px 5px;
            }
            
.head-name {
text-align: left !important;
color: black;
font-size: 16px;
margin-top: 11px;
vertical-align: middle;
display: inline-block;
padding-left: 6px;
}
            .card-header .btn{
               text-align: left !important;
               white-space: normal;
               
    vertical-align: middle;
            }
            .topic .fa{
                font-weight: 600;
padding-top: 15px;
color: black;
            }


@media only screen and (max-width : 1024px){
.head-name {margin-top: 4px;font-size: 15px;}
 .topic .fa {padding-top: 8px;}
 h2, .h2 {
    font-size: 24px;}
}

@media only screen and (max-width : 992px){
.head-name {
    margin-top: 20px;
    font-size: 22px;
    padding-left: 0px;
}
.topic .fa {
    padding-top: 19px;
    font-size: 32px;
}
}
@media only screen and (max-width : 425px){
    .head-name {
    margin-top: 5px;
    font-size: 16px;
    padding-left: 0px;
}
.topic .fa {
    padding-top: 5px;
    font-size: 30px;
}
}
</style>
    </head>
    <body>
        <div class="logouts">
            <span class="logs">
                <?php
                $ftime;
                $active;
                $ltime;
                foreach($getalldate as $row)
                {
                 $ftime=$row->ftime;;
                $active=$row->active;
                $ltime=$row->ltime;
                ?>
                <div class="name"><?php echo $row->name; ?> &nbsp;&nbsp;|&nbsp;&nbsp;</div> 
                <?php
                }
                ?>
                <a class="out" href="<?php echo base_url(); ?>welcome/logout">Logout</a></span>
        </div>
<div class="main">
    <div class="leftone">
        <img src="<?php echo base_url(); ?>assets/images/left.png" class="one"/>
    </div>
    <div class="middleone">
        <p class="middlecontent">Double click on date and choose the categories that you want to complete on that date</p></div>
    <div class="rightone">
        <img src="<?php echo base_url(); ?>assets/images/right.png" class="two"/>
    </div>

</div>


<div class="col-lg-12 col-sm-12">

                <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                    <!-- <a href="<?php  echo base_url(); ?>welcome/calenders"> -->
                    <div type="button" id="step1" class="btn btn-default ">
                    <div class=" " style="margin-top: 2%;color: #000;">Step 1</div>

                    </div>
                    </a>
                    </div>
                <div class="btn-group" role="group">
                     <?php
            if($ftime == 1 && $active == 1 && $ltime == 1)
            {
            ?>
                 <a href="<?php  echo base_url(); ?>welcome/newcalenders"> 
             <?php
            }
            ?>    
                <div type="button" id="step2" class="btn btn-default">
                <div class="" style="margin-top: 2%;color: #000;">Step 2</div>
                </div>
                </a>
                </div>
                <div class="btn-group" role="group">
                    <?php
             if($ftime == 1 && $active == 1 && $ltime == 1)
            {
            ?>        
                 <a href="<?php  echo base_url(); ?>welcomes"> 
             <?php
            }
            ?>    
                <div type="button" id="step3" class="btn btn-default actives" > 
                <div class="" style="margin-top: 2%;color: #000;" >Step 3</div> 
                </div>
                </a>
                </div>
                </div>
            <div class=" container well">
                <!-- Notification -->
                <div class="alert"></div>
                    <div class="row clearfix">
                        <div class="col-md-3">
                            <div id="accordion">
                             <?php
                                
                                foreach($getalladmin as $new)
                                {
                                    ?>   
                                
                              <div class="card">
                                <div class="card-header ls" id="<?php echo $new->id; ?>" style="background: #e0e0e0;">
                                  <h5 class="mb-0">
                                    <button class="btn btn-link btn-block collapsed " id="lelasan<?php echo $new->id; ?>" data-toggle="collapse" data-target="#collapseOne<?php echo $new->id; ?>" aria-expanded="true" aria-controls="collapseOne">
                                      
                                      <div class="topic lasan" >
                                          <div class="col-sm-3 col-xs-3">
                                              <img class="topimg" src="<?php echo base_url(); ?><?php echo $new->logo; ?>" />
                                          </div>
                                            <div class="col-sm-7 col-xs-7">
                                                <span class="head-name"><?php echo $new->name; ?></span>
                                            </div>
                                            <div class="col-sm-1 col-xs-1">
                                                <i class="fa fa-angle-down" id="arrow<?php echo $new->id; ?>" aria-hidden="true"></i>
                                                
                                            
                                            </div>
                                        </div>
                                        
                                    </button>
                                  </h5>
                                </div>
                            
                            <?php
                                foreach($getshowdata as $key)
                                {
                                    if($new->id == $key->qid)
                                    {
                                         
                                         ?>
                                         <div id="collapseOne<?php echo $new->id; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                  <div class="card-body" id="">
                                    <?php
                                   echo nl2br($key->ans);
                                    ?>
                                  </div>
                                </div>
                                         <?php
                                    }
                                }
                                ?>
                                
                              </div>
                              <?php
                              
                                }
                              ?>
                              
                            </div>
                           
                            
                        </div>
                        <div class="col-md-9 column">
                                <div id='calendar'></div>
                        </div>
                    </div>
                 <button class="leftbuttons" id="btn-id"><span>Previous </span></button>
            </div>
       
        
        
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="error"></div>
                        <form class="form-horizontal" id="crud-form">
                        <input type="hidden" id="start">
                        <input type="hidden" id="end">
                        <input type="hidden" id="newstart" value="<?php echo $start ?>">
                         <input type="hidden" id="newend" value="<?php echo $end ?>">
                         <input type="hidden" id="newdis" value="<?php echo $contactid; ?>">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="title">Title</label>
                                <div class="col-md-4">
                                    <!--<input id="title" name="title" type="text" class="form-control input-md" />-->
                                     <select name="cars" id="title" style="padding:8px;">
                                         <option value="P-Profile">P-Profile</option>
                                    <option value="B-Books">B-Books</option>
                                    <option value="Bc-Book chapters">Bc-Book chapters</option>
                                    <option value="V-Videos">V-Videos</option>
                                    <option value="M-Magazines">M-Magazines</option>
                                    <option value="SMP-Social Media Posts">SMP-Social Media Posts</option>
                                    <option value="FSE-Free Speaking Engagements">FSE-Free Speaking Engagements</option>
                                    <option value="A-Articles">A-Articles</option>
                                    <option value="AP-Audio Products">AP-Audio Products</option>
                                    <option value="VP-Video Products">VP-Video Products</option>
                                    <option value="I-Interviews">I-Interviews</option>
                                    <option value="Msc-Miscellaneous">Msc-Miscellaneous</option>
                                    <!--<option value="M-Magazines">M-Magazines</option>-->
                                  </select>
                                </div>
                            </div>                            
                            <div class="form-group" style="display:none;" >
                                <label class="col-md-4 control-label" for="description">Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" id="description" value="a" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group" style="display:none;">
                                <label class="col-md-4 control-label" for="color">Color</label>
                                <div class="col-md-4">
                                    <input id="color" name="color" type="text" class="form-control input-md" readonly="readonly" />
                                    <span class="help-block">Click to pick a color</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

    </div>


<!-- 
        <div class="container"> -->
                <!-- Notification -->
                <!-- <div class="alert"></div>
            <div class="row clearfix">
                <div class="col-md-12 column">
                        <div id='calendar'></div>
                </div>
            </div>
        </div> -->
        <!-- <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="error"></div>
                        <form class="form-horizontal" id="crud-form">
                        <input type="hidden" id="start">
                        <input type="hidden" id="end">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="title">Title</label>
                                <div class="col-md-4">
                                    <input id="title" name="title" type="text" class="form-control input-md" />
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="description">Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="color">Color</label>
                                <div class="col-md-4">
                                    <input id="color" name="color" type="text" class="form-control input-md" readonly="readonly" />
                                    <span class="help-block">Click to pick a color</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div> -->
        
        <script>
            $( document ).ready(function() {
                $( "#btn-id" ).click(function() {
                    
                    window.location.href = 'http://arfeenkhan.com/90daysmasterplan/welcome/newcalenders';
                });
              
              $('.ls').on('click', function() {
                  var xyz=$(this).attr('id');
                  var fgh='#lelasan'+xyz;
                      var expanded = $(fgh).hasClass("collapsed");
                      if (expanded == true) {
                        $('#arrow'+xyz).removeClass("fa-angle-down");
                        $('#arrow'+xyz).addClass("fa-angle-up");   
                      }
                      else {
                        $('#arrow'+xyz).removeClass("fa-angle-up");
                        $('#arrow'+xyz).addClass("fa-angle-down");   
                      }
                    });
            });
        </script>
    </body>
</html>



