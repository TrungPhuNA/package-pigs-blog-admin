<?php

namespace Pigs\BlogAdmin\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BlogAdminTagController extends Controller
{
    public function index(Request $request)
    {
        try {
            $tags = DB::table(config('adm_blog_config.table.tags'))->orderByDesc('id')
                ->paginate($request->page_size ?? 20);

            $viewData = [
                'tags'  => $tags,
                "query" => $request->query()
            ];

            return view('adm_blog::pages.tag.index', $viewData);
        } catch (\Exception $exception) {
            Log::error("[BlogAdminTagController][index] === [Message] === ".
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
            DB::table(config('adm_blog_config.table.tags'))->insert($data);
            return redirect()->route('get.adm_blog.tag.index');
        } catch (\Exception $exception) {
            Log::error("[BlogAdminTagController][store] === [Message] === ".
                $exception->getMessage()." === [Line] === ".
                $exception->getLine());
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $tag =DB::table(config('adm_blog_config.table.tags'))->where("id", $id)->delete();
            return redirect()->route('get.adm_blog.tag.index');
        } catch (\Exception $exception) {
            Log::error("[BlogAdminTagController][delete] === [Message] === ".
                $exception->getMessage()." === [Line] === ".
                $exception->getLine());
        }
    }
}
