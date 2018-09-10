<?php
namespace Pietrak98\LFMExtra\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Pietrak98\LFMExtra\src\FilesManager;

class ViewsController extends Controller
{

    private $filesManager;

    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $this->filesManager = new FilesManager($request, Auth::user());
            return $next($request);
        });
    }

    public function index()
    {
        $tree = $this->filesManager->getTree();
        $files = $this->filesManager->getFiles();

        $view = $this->getViewName();


        return view('lfme::index', compact('tree', 'files', 'view'));
    }

    private function getViewName() {
        if(Cookie::get('lfme-view') == 'list') {
            return 'list';
        } else {
            return 'grid';
        }
    }
}