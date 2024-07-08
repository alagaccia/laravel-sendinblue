<?php
namespace AndreaLagaccia\Sendinblue;

use AndreaLagaccia\Sendinblue\Sendinblue;
use Illuminate\Support\Facades\DB;

class TransactionalEmail extends Sendinblue
{
    protected $url;
    protected $template_url;

    public function __construct()
    {
        parent::__construct();

        $this->url = $this->api_base_url . 'smtp/email';
        $this->template_url = $this->api_base_url . 'smtp/templates';
    }

    public function send($to, $templateId = null, $htmlContent = null, $params = null, $tags = null)
    {
        $method_url = $this->url;

        $res = \Http::withHeaders($this->api_headers)->post($method_url, [
                'to' => [
                    [
                        'email' => $to['email'],
                        'name' => $to['name'] ?? null,
                    ]
                ],
                'templateId' => $templateId ?? null,
                'htmlContent' => $htmlContent ?? null,
                'textContent' => $htmlContent ? strip_tags($htmlContent) : null,
                'params' => $params,
                'tags' => $tags,
            ]);

        return $res->object();
    }

    public function getTemplateInformation($template_id)
    {
        $res = \Http::withHeaders($this->api_headers)->get("{$this->template_url}/{$template_id}");

        return $res->object();
    }
}
