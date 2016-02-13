<?php
namespace App\Http\Controllers;

use Theme;
use Auth;
use App\Repositories\ProfileRepositoryInterface;

class ITIMController extends Controller
{
    protected $theme;
    protected $profile;
    protected $user;

    public function __construct()
    {

        $this->theme = Theme::uses('itim_world')->layout('default');

        $this->user = Auth::user();

        $ProfileRepository = \App::make('App\Repositories\ProfileRepositoryInterface');
        $this->profile = $ProfileRepository->findByWIPID($this->user['wip_id']);

    }
}
