<?php
	$con=mysqli_connect('localhost','root','','dreambig');
	if(!$con)
	{ echo "Please try again later"; exit; }
	$sql="select * from feedback";
	$res = mysqli_query($con,$sql);
	$numrow=mysqli_num_rows($res);
	//echo $numrow;

	$xml = new XMLWriter();

	$xml->openURI("fdbcks.xml");
	$xml->startDocument();
	$xml->setIndent(true);
	$xml->startElement("feedbacks");
	while ($row = mysqli_fetch_assoc($res)) {
	  $xml->startElement("feedback");
		$xml->startElement("id");
		$xml->writeRaw($row['IDfeedback']);
	  $xml->endElement();
		$xml->startElement("user");
		$xml->writeRaw($row['username']);
	  $xml->endElement();
		$xml->startElement("title");
		$xml->writeRaw($row['title']);
	  $xml->endElement();
		$xml->startElement("text");
		$xml->writeRaw($row['text']);
	  $xml->endElement();
		$xml->startElement("date");
		$xml->writeRaw($row['date']);
	  $xml->endElement();
	  $xml->endElement();
	}

	$xml->endElement();

	header('Content-type: text/xml');
	$xml->flush();

	header("Location: /dreambig/editfeedbacks.html");
?>