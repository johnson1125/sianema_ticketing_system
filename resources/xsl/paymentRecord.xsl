<!-- Author: Lim Yu Her  -->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="payments">
        <div class="title">
            <h2>Payment Record Details</h2>
        </div>
        <div class="payment-details">
            <p>Transaction ID         : <xsl:value-of select="payment/transactionID"/>
            </p>
            <p>Payment ID             : <xsl:value-of select="payment/paymentID"/>
            </p>
            <p>Payment Date and Time  : <xsl:value-of select="payment/paymentDateTime"/>
            </p>
            <p>Payment Amount         : <xsl:value-of select="payment/paymentAmount"/>
            </p>
            <p>Payment Method         : <xsl:value-of select="payment/paymentMethod"/>
            </p>
        </div>
    </xsl:template>
</xsl:stylesheet>