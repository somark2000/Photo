// JavaScript Document
var page,len;
function display(xml,a)
{
	var i;
	var xmlDoc = xml.responseXML;
	var table="<tr><th>Username</th><th>Titttle</th><th>Text</th><th>Date</th></tr>";
	var x = xmlDoc.getElementsByTagName("feedback");
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
		"</td></tr>";
	}
	document.getElementById("demo").innerHTML = table;
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
