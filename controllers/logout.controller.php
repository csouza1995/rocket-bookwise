<?php

if (Session::has('auth') && !empty(Session::get('auth'))) {
    Session::destroy();
}

redirect('/');
