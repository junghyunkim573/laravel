<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return __method__ . '은 article컬렉션을 만들기 위한 폼을 담은 뷰를 반환합니다.';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return __method__ . '은 사용자의 입력한 폼 데이터로 새로운 article 컬렉션을 만듭니다.';
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
