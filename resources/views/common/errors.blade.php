@if (count($errors) > 0)
<!-- バリデーションエラーが存在したら -->

<!-- フォームのエラーリスト -->
<div class="alert alert-danger">
    <strong>エラーが起こっています。</strong>
    <br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif