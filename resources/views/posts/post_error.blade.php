@extends('layouts.app')
@section('title','Error')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-10 col-md-8 offset-1 offset-md-2">
            <table class="table">
                <tbody>
                <p class="text-center mt-5"><strong style="font-size: x-large;">投稿する内容多すぎます。前の投稿を削除して、もう一回投稿してください！</strong></p>
</tbody>

</table>




@guest
<p class="text-center"><strong>あなたはログインしていません。</strong></p>
@endguest
</div>
</div>

</div>
@endsection

