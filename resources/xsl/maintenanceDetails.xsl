<!-- Author: Ong Cheng Leong -->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">

    <xsl:template name="split-lines">
        <xsl:param name="text"/>
        <xsl:choose>
            <!-- If the text contains a line break -->
            <xsl:when test="contains($text, '&#xA;')">
                <p>
                    <!-- Output the text before the line break -->
                    <xsl:value-of select="substring-before($text, '&#xA;')"/>
                </p>
                <!-- Recursively process the remaining text -->
                <xsl:call-template name="split-lines">
                    <xsl:with-param name="text" select="substring-after($text, '&#xA;')"/>
                </xsl:call-template>
            </xsl:when>
            <xsl:otherwise>
                <!-- Output the remaining text if no more line breaks -->
                <p>
                    <xsl:value-of select="$text"/>
                </p>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>


    <xsl:template match="/maintenances/maintenance">
        <div id="maintenanceSection">
            <div id="maintenanceSection-1">
                <h2 class='label' >Maintenance ID</h2>
                <div class='textContainer'>
                    <p>
                        <xsl:value-of select="id"/>
                    </p>
                </div>

                <h2 class='label'>Maintenance Description</h2>
                <!-- Clean the description (if necessary) -->
                <div class='textContainer'>
                    <xsl:variable name="cleanDescription">
                        <xsl:value-of select="translate(description, '&#xD;', '')"/>
                    </xsl:variable>
                    <!-- Split the description into lines -->
                    <xsl:call-template name="split-lines">
                        <xsl:with-param name="text" select="$cleanDescription"/>
                    </xsl:call-template>
                </div>

            </div>
            <div id="maintenanceSection-2">
                <h2 class='label'>Maintenance name</h2>
                <div class='textContainer'>
                    <p>
                        <xsl:value-of select="name"/>
                    </p>
                </div>
                <h2 class='label'>Maintenance Duration</h2>
                <div class='textContainer'>
                    <p>
                        <xsl:value-of select="duration"/>
                    </p>
                </div>
                <h2 class='label'>Maintenance Hall Type</h2>
                <div class='textContainer'>
                    <p>
                        <xsl:value-of select="hallType"/>
                    </p>
                </div>

            </div>
        </div>
    </xsl:template>
</xsl:stylesheet>
