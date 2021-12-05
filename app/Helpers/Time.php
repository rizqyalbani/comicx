<?php

namespace App\Helpers;

trait Time {

    public function date() {
        return date('d-m-Y H:i:s', strtotime($this->created_at));
    }

}