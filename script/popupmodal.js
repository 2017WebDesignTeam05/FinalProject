$(function() {
  $( "#dialog" ).dialog({
    autoOpen: false,
    height:250,
    width:300,
	modal:true
  });
  $( "#loginer" ).click(function() {
    $( "#dialog" ).dialog( "open" );
    return false;
  });
});

$(function() {
  $( "#dialog2" ).dialog({
    autoOpen: false,
    height:320,
    width:300,
	modal:true
  });
  $( "#signuper" ).click(function() {
    $( "#dialog2" ).dialog( "open" );
    return false;
  });
});

$(function(){
	$("#submit01").click(function(e) {
		var name=$("#name01").val();
		var pass1=$("#pass01").val();
		var pass2=$("#pass02").val();
	
		if (pass1 === "" || name === "" || pass2 === ""){
			if(name===""){
				$("#name01").css("background", "pink");
			}
			else{
				$("#name01").css("background", "white");
			}
			if(pass1===""){
				$("#pass01").css("background", "pink");
			}
			else{
				$("#pass01").css("background", "white");
			}
			if(pass2===""){
				$("#pass02").css("background", "pink");
			}
			else{
				$("#pass02").css("background", "white");
			}
			//alert("Please fill all fields...!!!!!!");
			e.preventDefault();
		}
		else if(!(pass1).match(pass2)){
			$("#pass02").css("background", "pink");
			//alert("Invalid Email...!!!!!!");
			e.preventDefault();
		} 
		else{
			//alert("Form Submitted Successfully......");
		}
	});
});

$(function(){
	$("#submit11").click(function(e) {
		var name=$("#name11").val();
		var pass1=$("#pass11").val();
	
		if (pass1 === "" || name === ""){
			if(name===""){
				$("#name11").css("background", "pink");
			}
			else{
				$("#name11").css("background", "white");
			}
			if(pass1===""){
				$("#pass11").css("background", "pink");
			}
			else{
				$("#pass11").css("background", "white");
			}
			//alert("Please fill all fields...!!!!!!");
			e.preventDefault();
		}
		else{
			//alert("Form Submitted Successfully......");
		}
	});
});
