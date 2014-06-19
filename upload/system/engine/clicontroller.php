<?php

abstract class CLIController extends Controller {
    public function json($data) {
        return (defined('JSON_UNESCAPED_UNICODE')) ?
            (json_encode($data, JSON_UNESCAPED_UNICODE)) :
            (json_encode($data));
    }
}