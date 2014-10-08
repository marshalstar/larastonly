<?php

class TagsController extends BaseController
{
    protected $baseSingular = 'tag';
    protected $basePlural = 'tags';
    protected $likeAttributes = ['id', 'name'];

    protected function newObj($attributes = array())
    {
        return new Tag($attributes);
    }

    protected function query()
    {
        return Tag::query();
    }

}
