<?php

if ( ! function_exists('alert')) {
    /**
     * Arrange for a alert message.
     *
     * @param  string|null $message
     * @return \Squareboat\Alert\Alert
     */
    function alert($message = null)
    {
        $alert = app('alert');
        if ( ! is_null($message)) {
            return $alert->info($message);
        }
        return $alert;
    }
}
