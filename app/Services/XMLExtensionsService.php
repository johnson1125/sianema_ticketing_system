<?php

namespace App\Services;

use DOMDocument;
use XSLTProcessor;


class XMLExtensionsService
{

    public static function XMLStringToHTML($xmlString, $xsl_file_path)
    {

        // Load XML string
        $xml = new DOMDocument();
        $xml->loadXML($xmlString); // Load the XML string

        //load xsl file
        $xslDoc = new DOMDocument();
        $xslDoc->load(resource_path($xsl_file_path));

        //create xsltprocessor object, load xsl and xml
        $processor = new XSLTProcessor();
        $processor->importStylesheet($xslDoc);
        $html = $processor->transformToXml($xml);

        return $html;
    }


    public static function XMLFileToHTML($xml_file_path, $xsl_file_path)
    {
        //load xml file
        $xml = new DOMDocument();
        $xml->load(resource_path($xml_file_path));

        //load xsl file
        $xslDoc = new DOMDocument();
        $xslDoc->load(resource_path($xsl_file_path));

        //create xsltprocessor object, load xsl and xml
        $processor = new XSLTProcessor();
        $processor->importStylesheet($xslDoc);
        $html = $processor->transformToXml($xml);

        return $html;
    }

    public static function convertJsonToXMLString($json, $parentElement)
    {
        $data = json_decode($json, true);
        $xmlHeader = '<?xml version="1.0"?><' . $parentElement . '></' . $parentElement . '>';
        $xmlData = new \SimpleXMLElement($xmlHeader);
        XMLExtensionsService::arrayToXml($data, $xmlData, $parentElement);
        $xmlString = $xmlData;
        return $xmlString->asXML();
    }

    public static function convertJsonToXMLFile($json, $parentElement,$filePath)
    {
        $data = json_decode($json, true);
        $xmlHeader = '<?xml version="1.0"?><' . $parentElement . '></' . $parentElement . '>';
        $xmlData = new \SimpleXMLElement($xmlHeader);
        XMLExtensionsService::arrayToXml($data, $xmlData, $parentElement);
        $xmlString = $xmlData->asXML(resource_path($filePath));

        return $xmlString;
    }

    private static function arrayToXml($data, $xmlData, $parentElement)
    {
        $element = substr($parentElement, 0, -1);
        // Ensure $data is an array before proceeding
        if (!is_array($data)) {
            // If $data is not an array, handle it by adding it directly as an XML element
            $xmlData->addChild($element, htmlspecialchars("$data"));
            return;
        }

        foreach ($data as $key => $value) {
            // Handle numeric keys for sequential data (arrays)
            if (is_numeric($key)) {
                $key = $element;
            }

            if (is_array($value)) {
                // Check if the value is an associative array (object-like) or an indexed array (list-like)
                if (XMLExtensionsService::isAssoc($value)) {
                    // Handle associative array (object-like)
                    $subnode = $xmlData->addChild("$key");
                    XMLExtensionsService::arrayToXml($value, $subnode, $key);
                } else {
                    // Handle indexed array (list-like)
                    $subnode = $xmlData->addChild("$key");
                    foreach ($value as $item) {
                        XMLExtensionsService::arrayToXml($item, $subnode, $key);
                    }
                }
            } else {
                // Add scalar values as XML elements
                $xmlData->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }

    // Helper function to check if an array is associative (i.e., an object)
    private static function isAssoc(array $arr)
    {
        if (empty($arr)) return false; // An empty array is not associative
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}
