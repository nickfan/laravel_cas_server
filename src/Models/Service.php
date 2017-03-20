<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/1
 * Time: 15:06
 */

namespace Leo108\CAS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

/**
 * Class Service
 * @package Leo108\CAS\Models
 *
 * @property string  $name
 * @property boolean $allow_proxy
 * @property boolean $enabled
 */
class Service extends Model
{
    protected $table = 'cas_services';
    protected $fillable = ['name', 'enabled', 'allow_proxy'];
    protected $casts = [
        'enabled'     => 'boolean',
        'allow_proxy' => 'boolean',
    ];

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

    public function hosts()
    {
        return $this->hasMany(ServiceHost::class);
    }
}
