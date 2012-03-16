<?= form_open_multipart("admin/submit_news") ?> 
<p>
    <?= form_label('title') ?><br/>
    <?= form_input('title') ?>
</p>

<p>
    <?= form_label('added by') ?><br/>
    <?= form_input('added_by') ?>
</p>
<p>
    <?= form_label('date') ?><br/>
    <input type="text" name="date_added" id="datepicker"><br/>
</p> 

<p class="Image">
    <?= form_label('Image') ?><br/>

    <?= form_upload('file') ?>
</p>

<p>
    <?= form_label('content') ?><br/>
    <textarea cols=75 rows=20 name="content" id="content"  class='wymeditor'></textarea>

</p>
   
Published: <?=form_checkbox('published', '1')?><br/>


<?php echo form_submit('submit', 'Submit'); ?>
<?= form_close() ?> 
