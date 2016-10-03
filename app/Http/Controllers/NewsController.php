<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;

class NewsController extends Controller
{
    protected $validationRules = [
        'title' => 'required|min:5',
        'summary' => 'required|min:5',
        'content' => 'required|min:5',
        'publish' => 'boolean',
        'image' => 'mimes:jpeg,bmp,png|size:2048'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function posted()
    {
        $user = Auth::user();

        $posted_news = News::where('user_id', $user->id)->get();

        return view('news.posted', compact('posted_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post()
    {
        return view('news.edit', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, $this->validationRules);

        $news = new News($request->all());
        $this->storeImage($request, $news);
        $user->addNews($news);

        return redirect()->route('news_posted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);

        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();

        $news = News::where([
            ['id', '=', $id],
            ['user_id', '=', $user->id]
        ])->first();

        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $this->validate($request, $this->validationRules);
        $news->update($request->all());
        $this->storeImage($request, $news);
        $news->save();

        return redirect()->route('news_posted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Export news article as PDF.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, News $news)
    {
        $options = new Options;
        $options->setIsRemoteEnabled(true);
        $options->setIsHtml5ParserEnabled(true);
        $options->setDefaultFont('Helvetica');

        $dompdf = new Dompdf();
        $dompdf->setOptions($options);
        $dompdf->loadHtml(view('news.subviews.export', compact('news')));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream();
    }

    protected function storeImage(Request $request, &$news)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $old_filename = $news->image;
            $news->image = $request->file('image')->store('public');
            if (!is_null($old_filename) && Storage::exists($old_filename)) {
                Storage::delete($old_filename);
            }
        }
    }
}
