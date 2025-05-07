<?php namespace Pensoft\CommunitiesPractice\Models;

use Model;
use October\Rain\Database\Traits\Sortable;
use RainLab\Location\Models\Country as CountryModel;

/**
 * CommunitiesPractice Model
 */
class CommunitiesPractice extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use Sortable;

    /**
     * @var string table associated with the model
     */
    public $table = 'pensoft_communitiespractice_communities';

    /**
     * @var array guarded attributes aren't mass assignable
     */
    protected $guarded = ['*'];

    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = [];

    /**
     * @var array rules for validation
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array jsonable attribute names that are json encoded and decoded from the database
     */
	protected $jsonable = [
		'country_code'
	];

    /**
     * @var array appends attributes to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array hidden attributes removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array dates attributes that should be mutated to dates
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array hasOne and other relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];    
	public $belongsToMany = [
		'country' => [
			'RainLab\Location\Models\Country',
			'table' => 'pensoft_communitiespractice_countries',
			'key' => 'communities_practice_id',
			'otherKey' => 'country_id',
			'order' => 'name'
		],
	];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'cover' => 'System\Models\File',
        'file' => 'System\Models\File'
    ];
    public $attachMany = [];
    
    /**
     * Get country options for dropdown
     */
    public function getCountryOptions()
    {
        return CountryModel::orderBy('name')->lists('name', 'id');
    }
    
    /**
     * Get country name
     */
    public function getCountryNameAttribute()
    {
        if ($this->country && $this->country->count() > 0) {
            return $this->country->first()->name;
        }
        return null;
    }

    /**
     * Get country code options for dropdown
     */
    public function getCountryCodeOptions()
    {
		return CountryModel::whereNotNull('is_enabled')->where('is_enabled', true)->lists('code', 'code');
    }
}