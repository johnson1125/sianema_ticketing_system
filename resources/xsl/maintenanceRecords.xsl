<!-- Author: Sia Yeong Sheng -->
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <!-- Template to match the root element -->
    <xsl:template match="/maintenanceRecords">
        <html>
            <head>
                <title>Maintenance Records</title>
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    th, td {
                        border: 1px solid black;
                        padding: 8px;
                        text-align: left;
                    }
                    th {
                        background-color: #f2f2f2;
                    }
                </style>
            </head>
            <body>
                <h1>Maintenance Records</h1>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Start Time</th>
                        <th>Duration</th>     
                    </tr>
                    <!-- Loop through each maintenanceRecord -->
                    <xsl:for-each select="maintenanceRecord">
                        <tr>
                            <td><xsl:value-of select="id"/></td>
                            <td><xsl:value-of select="maintenance/name"/></td>
                            <td><xsl:value-of select="maintenance/description"/></td>
                            <td><xsl:value-of select="startTime"/></td>
                            <td><xsl:value-of select="maintenance/duration"/></td>                       
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>

