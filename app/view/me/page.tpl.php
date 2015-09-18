<article class="article1">
 
<?=$content?>
 
<?php if(isset($byline)) : ?>
<footer class="byline">
<?=$byline?>
<figure class="rounded"><img src="<?=$this->url->asset("img/jon.jpg")?>" alt="Jon Fredelius"></figure>
</footer>
<?php endif; ?>
 
</article>