// JavaScript Document
var page,len,x;

function delet(id)
{
	window.open("scrips/delete.php?id="+id);
}

function update(id)
{
	var ti=document.getElementById("title").value;
	var te=document.getElementById("text").value;
	window.open("scrips/update.php?id="+id+"&ti="+ti+"&te="+te);
}

function change(id)
{
	var titlelabel=document.createElement("label");
	var textnode=document.createTextNode("Title: ");
	titlelabel.appendChild(textnode);
	document.getElementById("here").appendChild(titlelabel);
	var titleinput=document.createElement("input");
	var titid=document.createAttribute("id");
	titid.value="title";
	titleinput.setAttributeNode(titid);
	var str="asf";
	for(var i=0;i<x.length;i++)
		{
			if(x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue==id)
				{
					str=x[i].getElementsByTagName("title")[0].childNodes[0].nodeValue;
				}
		}
	titleinput.value=str;
	document.getElementById("here").appendChild(titleinput);
	
	var textlabel=document.createElement("label");
	var textnode2=document.createTextNode("Text: ");
	textlabel.appendChild(textnode2);
	document.getElementById("here2").appendChild(textlabel);
	var textinput=document.createElement("input");
	var textid=document.createAttribute("id");
	textid.value="text";
	textinput.setAttributeNode(textid);
	var str2="asd";
	for(i=0;i<x.length;i++)
		{
			if(x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue==id)
				{
					str2=x[i].getElementsByTagName("text")[0].childNodes[0].nodeValue;
				}
		}
	textinput.value=str2;
	document.getElementById("here2").appendChild(textinput);
	
	var deletebutt=document.createElement("button");
	var textnode3=document.createTextNode("Delete");
	var act=document.createAttribute("onclick");
	act.value="delet("+id+")";
	deletebutt.appendChild(textnode3);
	deletebutt.setAttributeNode(act);
	document.getElementById("here3").appendChild(deletebutt);
	
	var updatebutt=document.createElement("button");
	var textnode4=document.createTextNode("Update");
	var act2=document.createAttribute("onclick");
	act2.value="update("+id+")";
	updatebutt.appendChild(textnode4);
	updatebutt.setAttributeNode(act2);
	document.getElementById("here3").appendChild(updatebutt);
}

function addbutt(xml)
{
	var i;
	var end =1;
	var xmlDoc = xml.responseXML;
	x = xmlDoc.getElementsByTagName("feedback");
	if(4*(page+1)<len)
		{
			end=4*(page+1);
		}
	else{
		end=len;
	}
	for (i = 4*page; i <end; i++) {
		var node=document.createElement("button");
		var textnode = document.createTextNode("Change");
		node.appendChild(textnode);
		var act=document.createAttribute("onclick");
		var str=x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue;
		act.value="change('"+str+"')";
		node.setAttributeNode(act);
		var idd="ch"+i;
		//document.getElementById("txt").innerHTML=idd;
		document.getElementById(idd).appendChild(node);
		}
}

function display(xml,a)
{
	var i;
	var xmlDoc = xml.responseXML;
	var table="<tr><th>Username</th><th>Title</th><th>Text</th><th>Date</th><th>Select</th></tr>";
	x = xmlDoc.getElementsByTagName("feedback");
	len=x.length;
	var end =1;
	if(4*(a+1)<len)
		{
			end=4*(a+1);
		}
	else{
		end=len;
	}
	for (i = 4*a; i <end; i++) { 
		table += "<tr><td>" +
		x[i].getElementsByTagName("user")[0].childNodes[0].nodeValue +
		"</td><td>" +
		x[i].getElementsByTagName("title")[0].childNodes[0].nodeValue +
		"</td><td>"+
		x[i].getElementsByTagName("text")[0].childNodes[0].nodeValue +
		"</td><td>" +
		x[i].getElementsByTagName("date")[0].childNodes[0].nodeValue +
		"</td><td id='ch"+i+"'>"+
		//"<p id='ch"+i+"'></p>"+
		//x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue+
		"</td></tr>";
		
	}
	document.getElementById("demo").innerHTML = table;
	addbutt(xml);
}

function show(a)
{
	page=a;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		document.getElementById("txt").innerHTML=a;
		if (this.readyState == 4 && this.status == 200) {
			
			display(this,a);
		}
	};
	xmlhttp.open("GET", "scrips/fdbcks.xml", true);
	xmlhttp.send();
}

function next() {
  if (page < len/4 -1) {
    show(page+1);   
  }
}

function previous() {
  if (page > 0) {
    show(page-1);
  }
}