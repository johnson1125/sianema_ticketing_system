<!-- Author: Lim Yu Her  -->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/">
        <h2>Payment Record Details</h2>
        <div class="payment-details">
            <p>Payment ID: <xsl:value-of select="paymentID"/></p>
            <p>Payment Date and Time: <xsl:value-of select="paymentDateTime"/></p>
            <p>Payment Amount: <xsl:value-of select="paymentAmount"/></p>
            <p>Payment Method: <xsl:value-of select="paymentMethod"/></p>
        </div>
    </xsl:template>
</xsl:stylesheet>