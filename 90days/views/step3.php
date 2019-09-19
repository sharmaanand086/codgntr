<!DOCTYPE html>
<html lang="en">
<head>
    <title>90Days</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    <link href='<?php echo base_url(); ?>assets/css/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo base_url(); ?>assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />

<script src='<?php echo base_url(); ?>assets/js/moment.min.js'></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src='<?php echo base_url(); ?>assets/js/jquery-ui.min.js'></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 
    <script src='<?php echo base_url(); ?>assets/js/fullcalendar.min.js'></script> 
    
     

    <style>

        #90day{
            text-align: center;
            font-size: 21px;
            color: #d4b734;
            padding-top: 2%;
        }
        #trash{
        width:32px;
        height:32px;
        float:left;
        padding-bottom: 15px;
        position: relative;
    }
        
    #wrap {
        width: 1100px;
        margin: 0 auto;
    }
        
    #external-events {
        float: left;
        width: 150px;
        padding: 0 10px;
        border: 1px solid #ccc;
        background: #eee;
        text-align: left;
    }
        
    #external-events h4 {
        font-size: 16px;
        margin-top: 0;
        padding-top: 1em;
    }
        
    #external-events .fc-event {
        margin: 10px 0;
        cursor: pointer;
    }
        
    #external-events p {
        margin: 1.5em 0;
        font-size: 11px;
        color: #666;
    }
        
    #external-events p input {
        margin: 0;
        vertical-align: middle;
    }

    #calendar {
        float: right;
        width: 900px;
    }


    </style>
   
</head>
<body>
<div class="main">
    <div class="leftone">
        <img src="<?php echo base_url(); ?>assets/images/left.png" class="one"/>
    </div>
    <div class="middleone">
        <p class="middlecontent">Choose a date to start your 90 Day Masterplan</p></div>
    <div class="rightone">
        <img src="<?php echo base_url(); ?>assets/images/right.png" class="two"/>
    </div>

</div>

<div class="col-md-4">
1
</div>
<div class="col-md-7 col-sm-12">

                <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                    <a href="<?php  echo base_url(); ?>welcome/calenders">
                    <div type="button" id="step1" class="btn btn-default ">
                    <div class="hidden-xs " style="margin-top: 2%;color: #000;">Step 1</div>

                    </div>
                    </a>
                    </div>
                <div class="btn-group" role="group">
                <a href="<?php  echo base_url(); ?>welcome/calenders2">
                <div type="button" id="step2" class="btn btn-default">
                <div class="hidden-xs" style="margin-top: 2%;color: #000;">Step 2</div>
                </div>
                </a>
                </div>
                <div class="btn-group" role="group">
                <a href="<?php  echo base_url(); ?>welcomes">
                <div type="button" id="step3" class="btn btn-default actives" > 
                <div class="hidden-xs" style="margin-top: 2%;color: #000;" >Step 3</div> 
                </div>
                </a>
                </div>
                </div>

                <div class="container">
                <!-- Notification -->
                <div class="alert"></div>
            <div class="row clearfix">
                <div class="col-md-12 column">
                        <div id='calendar'></div>
                </div>
            </div>
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
        </div>

    </div>



</body>

</html>