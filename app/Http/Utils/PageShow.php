<?php
namespace App\Http\Utils;

/**
 * Class pageShow
 * @package App\Http\Utils
 * @Author YiYuan-LIn
 * @Date: 2019/12/25
 */
class PageShow
{
    public static function pageShow($cur_page, $pageSize, $total)
    {
        $totalPage = ceil($total / $pageSize);
        $htmlStr = '<ul class="pagination pagination-primary pagination-no-border justify-content-center">';

        if ($cur_page == 1) {
            $htmlStr .= '<li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>';
        }else{
            $htmlStr .= '<li class="page-item"><a href="?cur_page= '. ($cur_page - 1) . '" class="page-link"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>';
        }

        for ($i=3; $i>=1; $i--) {
            $_page = $cur_page - $i;
            if ($_page < 1) continue;
            $htmlStr .= '<li class="page-item" ><a href="?cur_page=' . $_page . '" class="page-link"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">' .$_page. '</font></font></a></li>';
        }

        $htmlStr .= '<li class="page-item active" ><a href="?cur_page=' . $cur_page . '" class="page-link"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">' .$cur_page. '</font></font></a></li>';

        for ($i=1; $i<=3; $i++) {
            $_page = $cur_page + $i;
            if ($_page > $totalPage) break;
            $htmlStr .= '<li class="page-item" ><a href="?cur_page=' . $_page . '" class="page-link"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">' .$_page. '</font></font></a></li>';
        }

        if ($cur_page < $totalPage) {
            $htmlStr .= '<li class="page-item"><a href="?cur_page='. ($cur_page + 1) . '" class="page-link"><i class="fa fa-angle-double-right"aria-hidden="true"></i></a></li>';
        }

        $htmlStr .= '</url>';

        return $htmlStr;
    }
}