<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/1
 * Time: 15:17
 */

namespace Leo108\CAS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class ServiceHost extends Model
{
    protected $table = 'cas_service_hosts';
    public $timestamps = false;
    protected $fillable = ['host'];

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $connection = Config::get('cas.connection');
        if(!empty($connection)){
            $this->connection = $connection;
        }
        parent::__construct($attributes);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
