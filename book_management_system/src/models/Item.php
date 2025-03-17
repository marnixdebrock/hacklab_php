<?php

namespace Marnix\BookManagementSystem\models;

abstract class Item
{
    public abstract function toArray(): array;
}