<!-- データベースにデータを入力するためのフォーム
titleとtextフォームで入力し、モデル内でtitleを元にslugを作成。 -->

<h2><?php echo $title ?></h2>

<?php

//フォームバリデーションを行、戻された全てのエラ〜メッセージを返します。
//メッセージがない場合、空のの文字列を返します。
echo validation_errors();
?>

<?php
//formの開始タグを作成。actionの先をhttp://localhost/test_app/news/create に設定する
//フォームヘルパーは自動的にCSRFのための隠しフィールドを挿入する。
//リクエストメソッドはデフォルトではPOSTになる。
echo form_open('news/create');
?>

<label for="title">Title</label>
<input type="text" name="title" /><br />

<label for="text">Text</label>
<textarea name="text"></textarea><br />

<input type="submit" name="submit" value="Create news item" />

</form>