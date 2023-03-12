<?php

namespace NavOnlineCashRegister\Response;

use SimpleXMLElement;
use ZipArchive;

class CashRegisterFileResponse extends AbstractResponse
{
    /**
     * @var SimpleXMLElement[]
     */
    protected $xmls;

    /**
     * @return SimpleXMLElement[]
     */
    public function getXmls(): array
    {
        return $this->xmls;
    }

    /**
     * @param SimpleXMLElement[] $xmls
     * @return CashRegisterFileResponse
     */
    public function setXmls(array $xmls): CashRegisterFileResponse
    {
        $this->xmls = $xmls;
        return $this;
    }

    /**
     * @param Response $baseResponse
     * @return static
     */
    public static function createFromResponse(Response $baseResponse)
    {
        $response = new static();
        $xmlObjects = [];
        foreach ($baseResponse->getRawData() as $rawData) {
            $tempFile = tempnam(sys_get_temp_dir(), 'raw');
            $handle = fopen($tempFile, 'w');
            fwrite($handle, $rawData->getContent());
            fclose($handle);
            $p7bFilesContents = static::getZipFilesContents($tempFile);
            unlink($tempFile);

            foreach ($p7bFilesContents as $fileContent) {
                $cleanContent = str_replace(["\n", "\r"], '', $fileContent);
                if (preg_match('/<\?xml.*<\/ROWS>/', $cleanContent, $match)) {
                    $xmlObjects [] = simplexml_load_string($match[0]);
                }
            }
        }

        $response->setXmls($xmlObjects);

        return $response;
    }

    /**
     * @param string $fileName
     * @return array
     */
    public static function getZipFilesContents($fileName)
    {
        $contents = [];

        $zip = new ZipArchive();
        $res = $zip->open($fileName);
        if ($res === TRUE) {
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $stat = $zip->statIndex($i);
                $contents [$stat['name']] = stream_get_contents($zip->getStream($stat['name']));
            }
            $zip->close();
        }

        return $contents;
    }

}