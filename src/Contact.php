<?php
namespace AndreaLagaccia\Sendinblue;

use AndreaLagaccia\Sendinblue\Sendinblue;

class Contact extends Sendinblue
{
    protected $url;

    public function __construct()
    {
        parent::__construct();

        $this->url = $this->api_base_url . 'contacts/';
    }

    public function create($email, $ATTRIBUTES, $list_id = null)
    {
        $method_url = $this->url;

        $res = \Http::withHeaders($this->api_headers)->post($method_url, [
                'updateEnabled' => false,
                'listIds' => [$list_id ?? $this->getListId()],
                'email' => $email,
                'attributes' => $ATTRIBUTES,
            ]);

        return $res;
    }

    public function update($email, $ATTRIBUTES, $list_id = null)
    {
        $method_url = $this->url . urlencode($email);

        $res = \Http::withHeaders($this->api_headers)->put($method_url, [
                'listIds' => [$list_id ?? $this->getListId()],
                'attributes' => $ATTRIBUTES,
            ]);

        return $res;
    }

    public function delete($email)
    {
        $method_url = $this->url . urlencode($email);

        $res = \Http::withHeaders($this->api_headers)->delete($method_url);

        return $res;
    }

    public function getInfo($email)
    {
        $method_url = $this->url . urlencode($email);

        $res = \Http::withHeaders($this->headers)->get($method_url);

        return $res;
    }

}
