<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/">
        <h2>Users</h2>
        <ul>
            <xsl:for-each select="users/user">
                <li>
                    <xsl:value-of select="name"/> - <xsl:value-of select="id"/>
                </li>
            </xsl:for-each>
        </ul>
    </xsl:template>
</xsl:stylesheet>