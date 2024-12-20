<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/">
        <html>
            <head>
                <title>Bussijaama haldussüsteem</title>
                <link rel="stylesheet" href="style.css"/>
            </head>
            <body>
                <h1>Bussijaama haldussüsteem</h1>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Alguspunkt</th>
                        <th>Sihtkoht</th>
                        <th>Väljumisaeg</th>
                        <th>Hind (€)</th>
                        <th>Kestus</th>
                    </tr>
                    <xsl:for-each select="routes/route">
                        <tr>
                            <td><xsl:value-of select="@id" /></td>
                            <td><xsl:value-of select="start" /></td>
                            <td><xsl:value-of select="end" /></td>
                            <td><xsl:value-of select="departureTime" /></td>
                            <td><xsl:value-of select="price" /></td>
                            <td><xsl:value-of select="duration" /></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
