<?php

function postTopViewOnHome()
{
    try {
        $status = STATUS_PUBLISHED;
        $sql = "

        SELECT 
                    p.id            as p_id,
                    p.category_id   as p_category_id,
                    p.author_id     as p_author_id,
                    p.title         as p_title,
                    p.excerpt       as p_excerpt,
                    p.img_thumnail  as p_img_thumnail,
                    p.updated_at    as p_updated_at,
                    c.name          as c_name,
                    au.name         as au_name,
                    au.avatar       as au_avatar
                FROM posts as p
                INNER JOIN categories   as c    ON c.id     = p.category_id
                INNER JOIN authors      as au   ON au.id    = p.author_id
        WHERE p.status = '$status'ORDER BY p.view_count DESC LIMIT 1";


        $stmt = $GLOBALS['conn']->prepare($sql);


        $stmt->execute();
        return $stmt->fetch();
    } catch (\Exception $e) {
        debug($e);
    }
}

function postTop6latestOnHome($postTopViewOnHomeID)
{
    try {
        $status = STATUS_PUBLISHED;
        $sql = "
          SELECT 
                    p.id            as p_id,
                    p.category_id   as p_category_id,
                    p.author_id     as p_author_id,
                    p.title         as p_title,
                    p.excerpt       as p_excerpt,
                    p.img_thumnail  as p_img_thumnail,
                    p.updated_at    as p_updated_at,
                    c.name          as c_name,
                    au.name         as au_name,
                    au.avatar       as au_avatar
                FROM posts as p
                INNER JOIN categories   as c    ON c.id     = p.category_id
                INNER JOIN authors      as au   ON au.id    = p.author_id
                WHERE p.status = '$status'
                AND p.id <> :id
                ORDER BY p.view_count DESC LIMIT 6";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(':id', $postTopViewOnHomeID);

        $stmt->execute();
        return $stmt->fetchAll();
    } catch (\Exception $e) {
        debug($e);
    }
}

function postTop5Trendinglatest($postTopViewOnHomeID)
{

    try {
        $status = STATUS_PUBLISHED;
        $sql = "SELECT * FROM posts
         WHERE status = '$status'
         AND id <> :id
         AND is_trending = 1
         ORDER BY view_count DESC LIMIT 6";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(':id', $postTopViewOnHomeID);

        $stmt->execute();
        return $stmt->fetchAll();
    } catch (\Exception $e) {
        debug($e);
    }
}
