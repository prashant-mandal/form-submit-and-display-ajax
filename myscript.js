$(document).ready(function () {	
	$("#submitdisplay").on("submit",(function(e) {
		e.preventDefault();
		
		$.ajax({
			url: "insertphp.php",
			type: "post",
			data: $("#submitdisplay").serialize(),
			success: function(data)
			{
				$("#message").html(data);
				display_record();
			}
		});
	}));
});
function display_record(){
		$.ajax({
			url: "displayphp.php",
			type: "post",
			success: function(data){				
				$("#result_table").html(data);
			}
		});
	}
	
display_record();

//for delete button
	function reply_del(btid){
		var delid = btid.slice(3);
		$.ajax({
			url: "deletephp.php",
			type: "post",
			data: {id: delid},
			success: function(data){
				$("#message").html(data);
				display_record();
			} 
		});
	}

//for edit button
var edid="";

	//first display the edit option
	function reply_edit(bteid){
		edid = 	bteid.slice(2);  //edid matches the database id 
		var nameid ="name"+edid;	//dedicated id's
		var emailid ="email"+edid;	//dedicated id's
		var ageid ="age"+edid;	//dedicated id's
	
		$("#"+nameid).html("<input id=\"ipname"+edid +"\" type=\"name\" value=\""+$("#"+nameid).html()+"\" >");
		$("#"+emailid).html("<input id=\"ipemail"+edid +"\" type=\"email\" value=\""+$("#"+emailid).html()+"\" >");
		$("#"+ageid).html("<input id=\"ipage"+edid +"\" type=\"number\" size=\"3\" value=\""+$("#"+ageid).html()+"\" min=\"1\" max=\"121\" >");
		
		var editupdate ="editupdate"+edid;
		$("#"+editupdate).html("<input type=\"button\" onClick=\"update_edit()\" value=\"Update\">"
			+ "<input type=\"button\" onClick=\"display_record()\" value=\"Cancel\">");
	}
	//Update after row is edited	
	function update_edit(){
		var nameval=$("#ipname"+edid).val();
		var emailval=$("#ipemail"+edid).val();
		var ageval=$("#ipage"+edid).val();
		$.ajax({
			url: "updatephp.php",
			type: "post",
			data: {id: edid, name: nameval, email: emailval, age: ageval},
			success: function(data){
				$("#message").html(data);
			}
		});
	}

function clear_input(){
	$("#fname").val("");
	$("#femail").val("");
	$("#fage").val("");
}