<main>
    <ul>
        <?php foreach($data['data'] as $author): ?>
        <li>
            <h3><a href="<?php echo($_SERVER['PHP_SELF']) ?>?m=author&a=view&id=<?php echo($author->author_id); ?>"><?php echo($author->first_name.' '.$author->last_name) ?></a></h3>
            <img src="./img/authors_photo/logo/<?php echo($author->logo); ?>" alt="Image de <?php echo($author->first_name.' '.$author->last_name);?> "/>
            <p><?php echo(mb_substr($author->bio_text,0,200)); ?><a href="<?php echo($_SERVER['PHP_SELF']) ?>?m=author&a=view&id=<?php echo($author->author_id); ?>">Lire la suite</a></p>
            <a href="<?php echo($_SERVER['PHP_SELF']);?>?m=book&a=view&id=<?php echo($author->author_id);?>"></a>
        </li>
        <?php endforeach; ?>
    </ul>
</main>
