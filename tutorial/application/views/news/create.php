<!-- データベースにデータを入力するためのフォーム
titleとtextをフォームで入力し、モデル内でtitleを基にslugを作成する。 -->

<h2><?php echo $title; ?></h2>

<?php
//フォームバリデーションを行い、戻されたすべてのエラーメッセージを返す。
//メッセージがない場合、空も文字列を返す。
echo validation_errors();
?>

<?php
//formの開始タグを作成。action先をhttp://localhost/tutorial/news/createに設定
//フォームヘルパーは自動的にCSRFのための隠しフィールドを挿入する
//リクエストメソッドはデフォルトではPOSTになるよう。
echo form_open('news/create');
?>

<label for="title">Title</label>
<input type="text" name="title"><br>

<label for="text">Text</label>
<textarea name="text"></textarea><br>

<input type="submit" name="submit" value="送信" />

</form>