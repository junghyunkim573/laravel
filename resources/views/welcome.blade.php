@extends('layouts.master')


@section('style')
	<style>
		body{background:green; color:whiter;}
	</style>
@endsection

@section('content')
	@include('partials.footer')
@endsection

@section('script')
	<script>
		alert("저는 자식 뷰의 'script' 섹션입니다.");
	</script>
@endsection