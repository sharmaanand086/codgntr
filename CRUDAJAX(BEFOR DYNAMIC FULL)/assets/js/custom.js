//console.log('working day');
$(document).ready(function(){  
 
$('.mysubmit').click(function(){
//alert('ook');
var name = $('.name').val();
var email = $('.email').val();
var password = $('.password').val();
if(name=='' || email == '' || password == '') {
	$('.feedback').text('all fields are requred..');
}else{
	//alert('ajax performs');
	$.ajax({
		type:'POST',
		url: surl+"CrudController/adduser",
		data:{name:name,email:email,password:password},
		success:function($data){
			var myvar = "";
			var conv =  JSON.parse($data);
			  myvar += '<tr>';
			  myvar += '<td>'+conv[0].stName+'</td>';
			  myvar += '<td>'+conv[0].stEmail+'</td>';
			  myvar += '<td>'+conv[0].stDate+'</td>';
			  myvar += '<tr>';
              $('.mytable').append(myvar);
		      console.log(conv);	
		},
		error:function(){

		}
	})
}
});//add section


$('.edit').click(function(){
var text = $(this).data('text');
var id = $(this).data('id');
//console.log(text+id);
$.ajax({
		type:'POST',
		url: surl+"CrudController/checkUser",
		data:{text:text,id:id},
		success:function($data){	
		    var dyfiedl = "";
			var objid =  JSON.parse($data);
			dyfiedl += '<input type="text" class="dyName" value="'+objid[0].stName+'">';
			dyfiedl += '<input type="text" class="dyEmail" value="'+objid[0].stEmail+'">';
			dyfiedl += '<input type="text" class="dyPassword" value="'+objid[0].stPassword+'">';
			 dyfiedl += '<button data-id="'+objid[0].stid+'" class="updybtn">Update</button>';
			 $('.dynamicontentdiv').html(dyfiedl);

		      console.log(objid);	
		},
		error:function(){

		}
	})
});//edit section
$('body').on('click','.updybtn',function(){
//alert('asdfaf');
var dyName = $('.dyName').val();
var dyEmail = $('.dyEmail').val();
var dyPassword = $('.dyPassword').val();
var id = $(this).data('id');
//alert(dyPassword);
if(dyName == "" || dyEmail == "" || dyPassword == "" || id == "" )
    {
	$('.feedback').text('please chek the requred fields to update');

	}else{
		//alert('call the alert here ');
				$.ajax({
				type:'POST',
				url: surl+"CrudController/update",
				data:{
					dyName:dyName,
					dyEmail:dyEmail,
					dyPassword:dyPassword,
					id:id
				     },
				success:function($data){
				if($data){
					$('.dyName'+id).text(dyName);
				    $('.dyEmail'+id).text(dyEmail);
				    $('.dynamicontentdiv').empty();

				}else{
					$('.feedback').text('we can not update record right now');
				}
				      console.log($data);	
				},
				error:function(){
					console.log('error here');	
				}
			})

	    }
});//end update section

$('body').on('click','.delete',function(){
	//alert('asdfaf');
	var text = $(this).data('text');
	var id = $(this).data('id');
	if(text == "" || id == ""){
		$('.feedback').text('please chek the requred fields to update');

	}else{
		//ajax call here 
		$.ajax({
				type:'POST',
				url: surl+"CrudController/delete",
				data:{
					 text:text,
					 id:id
				     },
				success:function($data){
				 if($data == true){
				 	$('.feedback').text('success deleted ');
				 	$('.tr'+id).fadeOut('slow');
				      //console.log($data);	
				 }else{
				 	$('.feedback').text('you can not deleted ');
				 }
				},
				error:function(){
					console.log('error here');	
				}
			})

	}
});
});// ready section