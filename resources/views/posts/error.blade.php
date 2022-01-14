@extends('layouts.app')
@section('title','Error')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-10 col-md-8 offset-1 offset-md-2">
            <table class="table">
                <tbody>
                <p class="text-center"><strong>ほかの人の投稿を編集することができません。</strong></p>
</tbody>

</table>




@guest
<p class="text-center"><strong>あなたはログインしていません。</strong></p>
@endguest
</div>
</div>

</div>
@endsection

