<?php

namespace Pigs\BlogAdmin\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BlogAdminMenuController extends Controller
{
    public function index(Request $request)
    {
        try {
            $menus = DB::table(config('adm_blog_config.table.menu'))->orderByDesc('id')
                ->paginate($request->page_size ?? 20);

            $viewData = [
                'menus' => $menus,
                "query" => $request->query()
            ];

            return view('adm_blog::pages.menu.index', $viewData);
        } catch (\Exception $exception) {
            Log::error("[BlogAdminMenuController][index] === [Message] === ".
                $exception->getMessage()." === [Line] === ".
                $exception->getLine());
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->except("_token");
            $data['slug'] = Str::slug($request->name);
            $data["created_at"] = Carbon::now();
            $data["title_seo"] = $request->name;
            DB::table(config('adm_blog_config.table.menu'))->insert($data);
            return redirect()->route('get.adm_blog.menu.index');
        } catch (\Exception $exception) {
            Log::error("[BlogAdminMenuController][store] === [Message] === ".
                $exception->getMessage()." === [Line] === ".
                $exception->getLine());
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            DB::table(config('adm_blog_config.table.menu'))->where("id", $id)->delete();
            return redirect()->route('get.adm_blog.menu.index');
        } catch (\Exception $exception) {
            Log::error("[BlogAdminMenuController][delete] === [Message] === ".
                $exception->getMessage()." === [Line] === ".
                $exception->getLine());
        }
    }
}
