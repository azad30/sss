<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProblemRequest extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'requests';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'branchcode',
        'contact_name',
        'documentt',
        'branch_name',
        'contact_number',
        'problem_type',
        'module_type',
        'problem_name',
        'problem_member_name',
        'problem_member_id',
        'problem_samity_code',
        'problem_date',
        'problem_amount',
        'problem_details',
        'voucher_code',
        'right_member_name',
        'right_member_id',
        'right_samity_code',
        'right_amount',
        'right_details',
        'status_id',
        'seen_by_id',
        'assign_by_id',
        'assign_given_by_id',
        'assign_by_seen',
        'accomplished_by_id',
        'user_id'
    ];

    protected $dates = ['deleted_at'];
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function seen()
    {
        return $this->belongsTo('App\User', 'seen_by_id');
    }
    public function assign()
    {
        return $this->belongsTo('App\User', 'assign_by_id');
    }
    public function assignGiven()
    {
        return $this->belongsTo('App\User', 'assign_given_by_id');
    }
    public function accomplished()
    {
        return $this->belongsTo('App\User', 'accomplished_by_id');
    }
}
