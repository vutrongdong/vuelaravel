<?php
namespace App\Repository\Role;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {
	protected $table = 'roles';

	protected $fillable = [''];
}
