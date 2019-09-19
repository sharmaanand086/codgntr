<html>
<head>
<meta charset="utf8">
<title></title>
<style>
*{
    font-family:"DeJaVu Sans Mono",monospace;
}
</style>
</head>
<body>
    
        
        <div class="images_top" style="width:100%;height:auto;display:inline-block;">
           
            <div class="imagedata"  style="width:70%;height:auto;float:left;text-align:left;">
               Assignment Name: <?php
                foreach($myassignmentname as $name)
                {
                    echo $name->name;
                }
                
                ?>
            <br>
                Name : <?php
                foreach($getusername as $username)
                {
                    echo $username->name;
                }
                ?>
            </div>
             <div class="width" style="width:30%;height:auto;float:right;text-align:right;">
                 <img src="./uploads/stf.png" alt="ash" width="180px" height="80px"/>
             </div>
            
        </div>
        <br> <br> <br> <br> <br> <br> <br> <br> <br> 
        
          
        <div class="mydata" style="width:100%;text-align:left;">
            <?php

 foreach ($html_content as $key ) {


 ?> <p style="font-weight:bold;"><?php
    echo $key->question_no;
    echo " - ";
    echo $key->question;?> </p><?php
   echo "<br>";
 foreach ($myans as $keys ) {

    if($keys->assignmentno == $key->aid && $key->question_no==$keys->question)
    {
        if($keys->change_text==1)
        {
            ?> <p style="font-size:16px;color:red"><?php
        echo $keys->answer;?> </p><?php
         echo "<br>";
            
        }
        if($keys->change_text==0)
        {
            ?> <p style="font-size:16px;"><?php
        echo $keys->answer;?> </p><?php
         echo "<br>";
        }

     }

 }


 }

 ?>
            
        </div>
        
  


</body>

</html>