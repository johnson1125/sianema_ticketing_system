<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <!-- Define the template for the root element -->
    <xsl:template match="/">
        <html>
            <head>
                <title>Payment Details</title>
                <style>
                    body {
                        color:white;
                        font-family: Arial, sans-serif;
                        margin: 20px;
                    }
                    .container {
                        max-width: 800px;
                        margin: auto;
                        padding: 20px;
                        border: 1px solid #ddd;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    h1 {
                        color: #333;
                    }
                    .detail {
                        margin-bottom: 10px;
                    }
                    .detail label {
                        font-weight: bold;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <h1>Payment Details</h1>
                    <xsl:apply-templates select="payment"/>
                </div>
            </body>
        </html>
    </xsl:template>

    <!-- Define the template for the payment element -->
    <xsl:template match="payment">
        <div class="payment-details">
            <div class="detail">
                <label>Payment ID:</label>
                <xsl:value-of select="paymen/paymentID"/>
            </div>
            <div class="detail">
                <label>Transaction ID:</label>
                <xsl:value-of select="paymen/transactionID"/>
            </div>
            <div class="detail">
                <label>Payment Date and Time:</label>
                <xsl:value-of select="paymen/paymentDateTime"/>
            </div>
            <div class="detail">
                <label>Payment Method:</label>
                <xsl:value-of select="paymen/paymentMethod"/>
            </div>
        </div>
    </xsl:template>

</xsl:stylesheet>
