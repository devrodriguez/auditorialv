<?php

namespace Auditoria;

use Illuminate\Database\Eloquent\Model;

class Auditor extends Model
{
    protected $table = 'auditors';

    protected $fillable = ['name', 'role'];
}
