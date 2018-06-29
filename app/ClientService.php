<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientService extends Model
{
    //
    protected $table = "client_services";

    public function type() {
        return $this->belongsTo('App\TypeClientService','type_client_service_id');
    }
}
