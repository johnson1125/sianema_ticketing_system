<!-- Author: Lim Yu Her  -->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="payments">
        <div class="title">
            <h2>Payment Record Details</h2>
        </div>
        <div class="payment-details">
            <p><span>Transaction ID:</span> <span class="xsl-content">
                <xsl:value-of select="payment/transactionID"/>
            </span>
            </p>
            <p><span>Payment ID:</span> <span class="xsl-content">
                <xsl:value-of select="payment/paymentID"/>
            </span>
            </p>
            <p><span>Payment Date and Time:</span> <span class="xsl-content">
                <xsl:value-of select="payment/paymentDateTime"/>
            </span>
            </p>
            <p><span>Payment Amount:</span> <span class="xsl-content">
                RM <xsl:value-of select="payment/paymentAmount"/>
            </span>
            </p>
            <p><span>Payment Method:</span> <span class="xsl-content">
                <xsl:value-of select="payment/paymentMethod"/>
            </span>
            </p>
        </div>
    </xsl:template>
</xsl:stylesheet>