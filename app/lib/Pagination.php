<?php


namespace App\lib;


class Pagination {
    public $total = 0;
    public $page = 1;
    const limit = 20;
    public $text_first = '|&lt;';
    public $text_last = '&gt;|';
    public $text_next = '&gt;';
    public $text_prev = '&lt;';

    public function render() {
        $total = $this->total;

        if ($this->page < 1) {
            $page = 1;
        } else {
            $page = $this->page;
        }

        if (!(int)self::limit) {
            $limit = 10;
        } else {
            $limit = self::limit;
        }

        $num_pages = ceil($total / $limit);

        if ($this->page > $num_pages){
              new View('404');
              exit();
          }

        $output = '<ul class="pagination">';

        if ($page > 1) {
            $output .= '<li title="first"><a href="?pageno=1">' . $this->text_first . '</a></li>';

            if ($page - 1 === 0) {
                $output .= '<li title="prev"><a href="?pageno=' . $this->page  . '">' . $this->text_prev . '</a></li>';
            } else {
                $output .= '<li title="prev"><a href="?pageno=' .$this->page -1 . '">' . $this->text_prev . '</a></li>';
            }
        }

        if ($page < $num_pages) {
            $output .= '<li title="next"><a href="?pageno='. $this->page +1 .'">' . $this->text_next . '</a></li>';
            $output .= '<li title="last"><a href="?pageno=' . $num_pages . '">' . $this->text_last . '</a></li>';
        }

        $output .= '</ul>';

        if ($num_pages > 1) {
            return $output;
        } else {
            return '';
        }
    }
}
