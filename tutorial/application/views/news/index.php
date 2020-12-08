<h2><?php echo $title; ?></h2>

<?php foreach ($news as $news_item) : ?>

    <h3><?php echo $news_item['title']; ?></h3>
    <div class="main">
        <?php echo $news_item['text']; ?>
    </div>
    <p><a href="<?php echo site_url('news/' . $news_item['slug']); ?>">詳細</a></p>

<?php endforeach; ?>

<p><a href="news/create" style="font-size:20px;">ニュースを投稿する</a></p>
<p><a href="../tutorial" style="font-size:20px;">ホームに戻る</a></p>