<xsl:stylesheet version = "1.0" xmlns:xsl = "http://www.w3.org/1999/XSL/Transform">
<!--<xsl:strip-space: elements="*"/>-->
<xsl:template match="/photos">
<html>
<head>
	<link href="photos.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<h1>My work</h1>
	<table border="1">
	<thread>
		<tr style="background-color:PaleGreen;">
			<th>Photo</th>
			<th>Title</th>
			<th>Location</th>
			<th>Date</th>
			<th>Category</th>
			<th>Settings</th>
		</tr>
	</thread>
	<tbody>
		<xsl:for-each select="photo">
			<tr>
				<td>
				<xsl:element name="img">
					<xsl:attribute name="src">
					  <xsl:value-of select="image"/>
					</xsl:attribute>
				  </xsl:element>
			</td>
				<td class="title"><xsl:value-of select = "title"/></td>
				<td class="location"><a href="{link}"><xsl:value-of select = "location"/></a></td>
				<td class="date"><xsl:value-of select = "date"/></td>
				<td class="category"><xsl:value-of select = "category"/></td>
				<td class="settings"><xsl:value-of select = "settings"/></td>
			
			</tr>
		</xsl:for-each>
	</tbody>
	</table>
</body>	
</html>
</xsl:template>
</xsl:stylesheet>