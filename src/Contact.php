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

    public function create($email, $ATTRIBUTES, $list_ids = null)
    {
        $method_url = $this->url;
        $listIds = !empty($list_ids) ? implode(',', $list_ids) : $this->getListId();

        $res = \Http::withHeaders($this->api_headers)->post($method_url, [
                'updateEnabled' => false,
                'listIds' => [ $listIds ],
                'email' => $email,
                'attributes' => $ATTRIBUTES,
            ]);

        return $res->body();
    }

    public function updateOrCreate($email, $ATTRIBUTES, $list_ids = null)
    {
        $method_url = $this->url;
        $listIds = !empty($list_ids) ? implode(',', $list_ids) : $this->getListId();

        $res = \Http::withHeaders($this->api_headers)->post($method_url, [
                'updateEnabled' => true,
                'listIds' => [ $listIds ],
                'email' => $email,
                'attributes' => $ATTRIBUTES,
            ]);

        return $res->body();
    }

    public function update($email, $ATTRIBUTES, $list_ids = null)
    {
        $method_url = $this->url . urlencode($email);
        $listIds = !empty($list_ids) ? implode(',', $list_ids) : $this->getListId();

        $res = \Http::withHeaders($this->api_headers)->put($method_url, [
                'listIds' => [ $listIds ],
                'attributes' => $ATTRIBUTES,
            ]);

        return $res->body();
    }

    public function delete($email)
    {
        $method_url = $this->url . urlencode($email);

        $res = \Http::withHeaders($this->api_headers)->delete($method_url);

        return $res->body();
    }

    public function getInfo($email)
    {
        $method_url = $this->url . urlencode($email);

        return \Http::withHeaders($this->api_headers)->get($method_url);
    }
}
