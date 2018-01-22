<?php

namespace App\Content;

use Carbon\Carbon;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Articles extends Provider
{
    public function all()
    {
        return $this->cache('articles.all', function () {
            return $this->gather();
        });
    }

    public function find($slug)
    {
        return $this->all()->first(function ($article) use ($slug) {
            return $article->slug == $slug;
        }, function () {
            abort(404);
        });
    }

    public function feed()
    {
        return $this->cache('articles.feed', function () {
            return $this->all()->map(function ($article) {
                return [
                    'id' => $article->url,
                    'title' => $article->title,
                    //'updated' => $article->date,
                    'summary' => $article->contents,
                    'link' => $article->url,
                    'author' => 'Gunharth Randolf',
                ];
            });
        });
    }

    private function gather()
    {
        return collect($this->disk->files('music-articles'))
            ->filter(function ($path) {
                return !starts_with($path, ['music-articles/LICENSE', 'music-articles/README']) && ends_with($path, '.md');
            })
            ->map(function ($path) {
                $filename = str_after($path, 'articles/');

                [$slug, $extension] = explode('.', $filename, 2);

                //$date = Carbon::createFromFormat('Y-m-d', $date);

                $document = YamlFrontMatter::parse($this->disk->get($path));

                return (object) [
                    'path' => $path,
                    'slug' => $slug,
                    'url' => route('articles.show', [$slug]),
                    'title' => $document->title,
                    'subtitle' => $document->subtitle,
                    'category' => $document->category,
                    'categoryID' => $document->categoryID,
                    'articleID' => $document->articleID,
                    'original_publication_name' => $document->original_publication_name,
                    'original_publication_url' => $document->original_publication_url,
                    'read_more_text' => $document->read_more_text,
                    'read_more_url' => $document->read_more_url,
                    'contents' => markdown($document->body()),
                    'summary' => markdown($document->summary ?? $document->body()),
                ];
            })
            ->sortBy('categoryID')->sortBy('articleID')->groupBy('category');
    }
}
