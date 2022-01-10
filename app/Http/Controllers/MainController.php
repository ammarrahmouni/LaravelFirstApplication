<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

define("POST_NUMBER", 3);

class MainController extends Controller
{
    public $data = [];
    public $data_category = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }



}
