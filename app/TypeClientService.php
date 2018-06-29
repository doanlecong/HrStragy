<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeClientService extends Model
{
    protected $table = "type_client_services";

    public function clientServices() {
        return $this->hasMany('App\ClientService','type_client_service_id');
    }
}
