<?php 

namespace Auditoria;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class Enterprise extends Model
{
	protected $table = 'enterprises';

	protected $fillable = ['nit', 'nombre', 'descripcion', 'direccion'];

	public function user() {
		return $this->belongsTo(User::class);
	}

}