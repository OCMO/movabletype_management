<?php
# Movable Type (r) (C) 2001-2014 Six Apart, Ltd. All Rights Reserved.
# This code cannot be redistributed without permission from www.sixapart.com.
# For more information, consult your Movable Type license.
#
# $Id$

if (MULTIBLOG_ENABLED) {
function smarty_block_mtmultibloglocalblog($args, $content, &$ctx, &$repeat) {
    $localvars = array('local_blog_id', 'blog_id', 'blog');
    if (!isset($content)) {
        $blog_id = $ctx->stash('local_blog_id');
        if (!$blog_id) {
            $repeat = false;
            return '';
        }
        $ctx->localize($localvars);
        $blog = $ctx->mt->db()->fetch_blog($blog_id);
        $ctx->stash('blog', $blog);
        $ctx->stash('blog_id', $blog_id);
    } else {
        $repeat = false;
    }

    if (!$repeat)
        $ctx->restore($localvars);
    return $content;
}
}
?>