<?php

namespace App\Content;

use App;
use Carbon\Carbon;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Posts extends Provider
{
    public function all()
    {
        $posts = $this->cache('posts.all', function () {
            return $this->gather();
        });
        return $posts->each(function ($post) {
            $date = Carbon::parse($post->date);
            $post->dateShort = $date->format('F Y');
        });
    }

    public function published()
    {
        if (App::environment('production')) {
            return $this->all()
                ->filter(function ($post) {
                    return $post->published;
                });
        }
        return $this->all();
    }

    public function paginate($perPage = 15, $pageName = 'page', $page = null)
    {
        return $this->cache('posts.paginate.'.request('page', 1), function () use ($perPage, $pageName, $page) {
            return $this->all()->simplePaginate($perPage, $pageName, $page);
        });
    }

    // public function find($year, $slug)
    // {
    //     return $this->all()->first(function ($post) use ($year, $slug) {
    //         return $post->date->year == $year && $post->slug == $slug;
    //     }, function () {
    //         abort(404);
    //     });
    // }

    public function find($slug)
    {
        // return $this->all()->first(function ($post) use ($year, $slug) {
        //     return $post->date->year == $year && $post->slug == $slug;
        // }, function () {
        //     abort(404);
        // });

        return $this->all()->first(function ($post) use ($slug) {
            return $post->slug == $slug;
        }, function () {
            abort(404);
        });
    }

    public function feed()
    {
        return $this->cache('posts.feed', function () {
            return $this->all()->map(function ($post) {
                return [
                    'id' => $post->url,
                    'title' => $post->title,
                    'updated' => $post->date,
                    'summary' => $post->contents,
                    'link' => $post->url,
                    'author' => 'Gunharth Randolf',
                ];
            });
        });
    }

    private function gather()
    {
        return collect($this->disk->files('posts'))
            ->filter(function ($path) {
                return ends_with($path, '.md');
            })
            ->map(function ($path) {
                $filename = str_after($path, 'posts/');

                [$date, $slug, $extension] = explode('.', $filename, 3);

                $date = Carbon::createFromFormat('Y-m-d', $date);

                $document = YamlFrontMatter::parse($this->disk->get($path));

                return (object) [
                    'path' => $path,
                    'date' => $date,
                    'slug' => $slug,
                    // 'url' => route('posts.show', [$date->format('Y'), $slug]),
                    'url' => route('posts.show', [$slug]),
                    'title' => $document->title,
                    'subtitle' => $document->subtitle,
                    'category' => $document->category,
                    'contents' => markdown($document->body()),
                    'summary' => markdown($document->summary ?? $document->body()),
                    'summary_short' => mb_strimwidth($document->summary ?? $document->body(), 0, 140, "..."),
                    'preview_image' => $document->preview_image ? '/' . $document->preview_image : '/images/gr_logo.jpg',
                    'published' => $document->published ?? true,
                ];
            })
            ->sortByDesc('date');
    }
}
