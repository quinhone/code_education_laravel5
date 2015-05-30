<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = [
	    'category_id',
	    'name',
	    'description', 
	    'price',
	    'featured', 
	    'recommend'
    ];
	
	public function category()
	{
		return $this->belongsTo('CodeCommerce\Category');
	}

    public function images()
    {
        return $this->hasMany('CodeCommerce\ProductImages');
    }

    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', '=',  1)->limit(8)->orderByRaw('RANDOM()');
    }

    public function scopeRecommend($query)
    {
        return $query->where('recommend', '=',  1)->limit(8)->orderByRaw('RANDOM()');
    }


}
