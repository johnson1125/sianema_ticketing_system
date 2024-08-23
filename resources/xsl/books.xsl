<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/">
        <h2>Book List</h2>
        <ul>
            <xsl:for-each select="books/book">
                <li>
                    <xsl:value-of select="title"/> - <xsl:value-of select="author"/>
                </li>
            </xsl:for-each>
        </ul>
    </xsl:template>
</xsl:stylesheet>