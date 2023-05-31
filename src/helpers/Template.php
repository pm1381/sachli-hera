<?php

namespace App\Helpers;

class Template
{

    public static function adminNavigation($count, $limit)
    {
        $result = '';
        $listPage = '';
        if ($count) {
            $page = Tools::getPage();
        }

        $params = [];
        $query = parse_url(Tools::getCurrentUrl(), PHP_URL_QUERY);
        if ($query) {
            parse_str($query, $params);
        }

        $url = "?";
        foreach ($params as $key => $value) {
            if (in_array($key, Arrays::permanentParams())) {
                $url .= $key . '=' . urlencode($value) . '&';
            }
        }

        $export = intval(ceil($count / $limit));
        // dd($export);
        $max = $export;
        $visiblePages = [];

        if ($export > 3) {
            $visiblePages[] = 1;
            $next = $page + 1;
            $prev = $page - 1;
            $prev2 = $page - 2;
            $next2 = $page + 2;
            if ((!in_array($page, $visiblePages)) && $page != $max) {
                $visiblePages[] = $page;
            }
            if ((!in_array($next, $visiblePages)) && $next < $max) {
                $visiblePages[] = $next;
            }
            if ((!in_array($prev, $visiblePages)) && $prev > 1) {
                $visiblePages[] = $prev;
            }
            if ((! in_array($next2, $visiblePages)) && $next2 < $max) {
                $visiblePages[] = $next2;
            }
            if ((!in_array($prev2, $visiblePages)) && $prev2 > 1) {
                $visiblePages[] = $prev2;
            }
            $visiblePages[] = $max;
            sort($visiblePages);
            foreach ($visiblePages as $eachPage) {
                $active = "";
                if ($eachPage == $page) {
                    $active = "active";
                }
                if ($eachPage == $max) {
                    $listPage .= '<span>...</span>';
                }
                $listPage .= '<a href="' . $url . 'page=' . $eachPage . '" class="' . $active . '">' . $eachPage . '</a>';
                if ($eachPage == 1) {
                    $listPage .= '<span>...</span>';
                }
            }
        } else {
            for ($i=1; $i <= $export ; $i++) { 
                $active = "";
                if ($i == $page) {
                    $active = "active";
                }
                $listPage .= '<a href="' . $url . 'page=' . $i . '" class="' . $active . '">' . $i . '</a>';
            }
        }

        $result = '<div class="navigation" colspan="20">' . $listPage . '</div>';

        if ($export <= 1) {
            $result = '';
        }
        
        return $result;
    }
}
