<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\Web;

use PhpOffice\PhpSpreadsheet\Calculation\Information\ExcelError;
use PhpOffice\PhpSpreadsheet\Settings;
use Psr\Http\Client\ClientExceptionInterface;

class Service
{
    /**
     * WEBSERVICE.
     *
     * Returns data from a web service on the Internet or Intranet.
     *
     * Excel Function:
     *        Webservice(url)
     *
     * @return string the output resulting from a call to the webservice
     */
<<<<<<< HEAD
    public static function webService(string $url): string
=======
    public static function webService(string $url)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $url = trim($url);
        if (strlen($url) > 2048) {
            return ExcelError::VALUE(); // Invalid URL length
        }

        if (!preg_match('/^http[s]?:\/\//', $url)) {
            return ExcelError::VALUE(); // Invalid protocol
        }

<<<<<<< HEAD
        // Get results from the webservice
=======
        // Get results from the the webservice
>>>>>>> 50f5a6f (Initial commit from local project)
        $client = Settings::getHttpClient();
        $requestFactory = Settings::getRequestFactory();
        $request = $requestFactory->createRequest('GET', $url);

        try {
            $response = $client->sendRequest($request);
<<<<<<< HEAD
        } catch (ClientExceptionInterface) {
=======
        } catch (ClientExceptionInterface $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::VALUE(); // cURL error
        }

        if ($response->getStatusCode() != 200) {
            return ExcelError::VALUE(); // cURL error
        }

        $output = $response->getBody()->getContents();
        if (strlen($output) > 32767) {
            return ExcelError::VALUE(); // Output not a string or too long
        }

        return $output;
    }

    /**
     * URLENCODE.
     *
     * Returns data from a web service on the Internet or Intranet.
     *
     * Excel Function:
     *        urlEncode(text)
     *
<<<<<<< HEAD
     * @return string the url encoded output
     */
    public static function urlEncode(mixed $text): string
=======
     * @param mixed $text
     *
     * @return string the url encoded output
     */
    public static function urlEncode($text)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (!is_string($text)) {
            return ExcelError::VALUE();
        }

        return str_replace('+', '%20', urlencode($text));
    }
}
