<img src="<?=base_url()?>images/titles/latest_news.png"><br/>
		<?php foreach($latest_news as $row): ?>
		<strong><?=$row['news_title']?></strong>
		<p>
		<?php $content = str_replace('[readmore]', '', $row['news_content']); ?>
		<?=substr($content, 0, 300)?>...
		</p>
		<a href="<?=base_url()?>blog/post/<?=$row['news_id']?>">Read More</a>
		<?php endforeach; ?>