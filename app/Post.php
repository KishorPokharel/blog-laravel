<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Post extends Model
{
    public function category() {
    	return $this->belongsTo(Category::class);
    }

 //    public function delete(){
	//     if($this->attributes['featured']){
	//         $file = $this->attributes['featured'];
	//         if(File::isFile($file)){
	//             \File::delete($file);
	//         }
	//     }
	//     parent::delete();
	// }

	public function user() {
		return $this->belongsTo('App\User');
	}
}
