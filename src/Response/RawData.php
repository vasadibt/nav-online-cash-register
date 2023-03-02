<?php

namespace NavOnlineCashRegister\Response;

use NavOnlineCashRegister\Models\AbstractModel;

class RawData extends AbstractModel
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var array
     */
    protected $headers;
    /**
     * @var string
     */
    protected $content;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return RawData
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     * @return RawData
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return RawData
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}