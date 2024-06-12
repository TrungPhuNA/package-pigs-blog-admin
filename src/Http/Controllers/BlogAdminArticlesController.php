<?php

namespace Pigs\BlogAdmin\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Pigs\BlogAdmin\Enums\EnumAdmBlog;

class BlogAdminArticlesController extends Controller
{
    public function index(Request $request)
    {
        try {
            $menus = DB::table(config('adm_blog_config.table.articles'))->orderByDesc('id')
                ->paginate($request->page_size ?? 20);

            $viewData = [
                'articles' => $menus,
                "query"    => $request->query()
            ];

            return view('adm_blog::pages.article.index', $viewData);
        } catch (\Exception $exception) {
            Log::error("[BlogAdminArticlesController][index] === [Message] === ".
                $exception->getMessage()." === [Line] === ".
                $exception->getLine());
        }
    }

    public function create(Request $request)
    {
        try {
            $menus = DB::table(config('adm_blog_config.table.menu'))->where("status",
                EnumAdmBlog::STATUS_PUBLISHED)->get();
            $tags = DB::table(config('adm_blog_config.table.tags'))->where("status",
                EnumAdmBlog::STATUS_PUBLISHED)->get();
            $viewData = [
                "menus" => $menus,
                "tags"  => $tags
            ];
            return view('adm_blog::pages.article.create', $viewData);
        } catch (\Exception $exception) {
            Log::error("[BlogAdminArticlesController][store] === [Message] === ".
                $exception->getMessage()." === [Line] === ".
                $exception->getLine());
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->except("_token", "tags");
            $data['slug'] = Str::slug($request->name);
            $data["created_at"] = Carbon::now();
            $data["title_seo"] = $request->name;
            $data["description_seo"] = $request->description;
            $idInsert = DB::table(config('adm_blog_config.table.articles'))->insertGetId($data);
            if ($idInsert) {
                $tags = $request->tags ?? [];
                if (!empty($tags)) {
                    foreach ($tags as $item) {
                        DB::table(config('adm_blog_config.table.articles_tags'))->insert([
                            "article_id" => $idInsert,
                            "tag_id"     => $item,
                            "created_at" => Carbon::now()
                        ]);
                    }
                }
            }
            return redirect()->route('get.adm_blog.article.index');
        } catch (\Exception $exception) {
            Log::error("[BlogAdminArticlesController][store] === [Message] === ".
                $exception->getMessage()." === [Line] === ".
                $exception->getLine());
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            DB::table(config('adm_blog_config.table.articles'))->where("id", $id)->delete();
            return redirect()->route('get.adm_blog.article.index');
        } catch (\Exception $exception) {
            Log::error("[BlogAdminArticlesController][delete] === [Message] === ".
                $exception->getMessage()." === [Line] === ".
                $exception->getLine());
        }
    }
}
