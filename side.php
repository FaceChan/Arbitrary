<section class="side-list col-4 col-mb-12">
    <article class="recent-posts">
        <h3>最新文章</h3>
        <ul>
            <?php $this->widget('Widget_Contents_Post_Recent')->parse('
                <li><a href="{permalink}" class="item">{title}</a></li>'); ?>
        </ul>
    </article>

    <article class="recent-comments">
        <h3>最近回复</h3>
        <ul>
            <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
            <?php while($comments->next()): ?>
            <li>
                <?php $comments->author(true, true); ?> :
                <a href="<?php $comments->permalink(); ?>"><?php $comments->excerpt(30, '...'); ?></a>
            </li>
            <?php endwhile; ?>
        </ul>
    </article>

    <?php $all = Typecho_Plugin::export();
    if (array_key_exists('Links', $all['activated'])): ?>
    <article class="friend-list">
        <h3>友情链接</h3>
        <ul>
            <?php Links_Plugin::output('
            <li><a href="{url}" target="_blank">{name}</a></li>', 30); ?>
        </ul>
    </article>
    <?php endif; ?>

    <article class="tag-cloud">
        <h3>标签云</h3>
        <ul>
            <?php $this->widget('Widget_Metas_Tag_Cloud')->parse('
                <li><a href="{permalink}">{name}</a></li>
            '); ?> 
        </ul>
    </article>
</section>
