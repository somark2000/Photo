// JavaScript Document


function list1tolist2(p1)
{
  var myobj=document.getElementById(p1);
  var node=document.createElement("option");
  var textnode = document.createTextNode(p1);
  var at=document.createAttribute("id");
  at.value=p1;
  node.setAttributeNode(at);
  node.appendChild(textnode);
  var act=document.createAttribute("onclick");
  act.value="list2tolist1('"+p1+"')";
  node.setAttributeNode(act);
//			  node.addEventListener("click",list2tolist1(p1));
  document.getElementById("list2").appendChild(node);
  myobj.remove()
}

function list2tolist1(p2)
{
  var myobj=document.getElementById(p2);
  var node=document.createElement("option");
  var textnode = document.createTextNode(p2);
  var at=document.createAttribute("id");
  at.value=p2;
  node.setAttributeNode(at);
  node.appendChild(textnode);
  var act=document.createAttribute("onclick");
  act.value="list1tolist2('"+p2+"')";
  node.setAttributeNode(act);
//			  node.addEventListener("click",list1tolist2(p2));
  document.getElementById("list1").appendChild(node);
  myobj.remove()
}

function getdata(){
	var options=document.getElementById("list2").options;
	var text="The selected options are:"+"<br>";
	var opt=Array();
	for(var i=1;i<options.length;i++)
		{
			text+=options[i].text+"<br>"
			opt.push(option[i].text);
		}
	document.getElementById("text").innerHTML=text;
	var expires="";
	document.cookie = escape("opt") +"="+ escape(opt) + ";path/scrips/";
}

function dial(){
	getdata();
	$( function() {
		$( "#dialog" ).dialog({
			create: function( e, ui ) {
				var $parent = $( this ).parent();
				var	$button = $parent.find( ".ui-dialog-titlebar-close" );
				$button.button( "option", {
						   icons: {primary: false},
						   text: true,
						   label: "X"
					   });
			}
		});
		$('#text').show();
		$('#proc').show();
  } );
}