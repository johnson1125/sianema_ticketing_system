<!-- Author: Kho Ka Jie -->
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <!-- Define the template for the payment element -->
    <xsl:template match="payment">
        <div class="payment-details">
            <div class="detail">
                <label>Payment ID            :</label>
                <xsl:value-of select="paymen/paymentID"/>
            </div>
            <div class="detail">
                <label>Transaction ID        :</label>
                <xsl:value-of select="paymen/transactionID"/>
            </div>
            <div class="detail">
                <label>Payment Date and Time :</label>
                <xsl:value-of select="paymen/paymentDateTime"/>
            </div>
            <div class="detail">
                <label>Payment Method         :</label>
                <xsl:value-of select="paymen/paymentMethod"/>
            </div>
            <div class="detail">
                <label>Payment Amount          :</label>
                <xsl:value-of select="paymen/paymentAmount"/>
            </div>
        </div>
    </xsl:template>

</xsl:stylesheet>
