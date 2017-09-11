<?php

namespace Auditoria;

use Illuminate\Database\Eloquent\Model;

class ItemAudit extends Model
{
    protected $table = 'item_audits';

    protected $fillable = ['name', 'description'];
}
