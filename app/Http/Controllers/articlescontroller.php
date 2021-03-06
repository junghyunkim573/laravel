<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticlesRequest;

class articlescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$articles=\App\article::latest()->paginate(3);

		

        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {
        $rules=[
			'title'=>['required'],
			'content'=>['required','min:10'],
			];
		
		$messages=[
			'title.required'=>'제목은 필수 입력 항목입니다.',
			'content.required'=>'본문은 필수 입력 항목입니다.',
			'content.min'=>'본문은 최소 :min 글자 이상이 필요합니다.',
			];

		$this->validate($request->all(), $rules, $messages);

		if($validator->fails()){
			return back()->withErrors($validator)
						->withInput();
		}

		$article=\App\User::find(1)->articles()->create($request->all());

		if(! $article){
			return back()->with('flash_massage','글이 저장되지 않았습니다.')
						->withInput();
		}

		return redirect(route('articles.index'))
			->with('flash_message', '작성하신 글이 저장되었습니다.');
	

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return __method__ . '은 다음 기본키를 가진 article모델을 조회합니다.;' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return __method__ . '은 다음 기본키를 가진 article모델을 수정하기 위한 폼을 담은 뷰를 반환합니다.;' . $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return __method__ . '은 사용자의 입력한 폼데이터로 다음 기본키를 가진 article모델을 수정합니다.;' . $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return __method__ . '은 다음 기본키를 가진 article모델을 삭제합니다.;' . $id;
    }
}
