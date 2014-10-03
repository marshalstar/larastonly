<?php

class TagsController extends BaseController
{
    protected $baseSingular = 'tag';
    protected $basePlural = 'tags';
    protected $likeAttributes = ['id', 'name'];

    protected function newObj()
    {
        return new Tag();
    }

    protected function query()
    {
        return Tag::query();
    }

}
