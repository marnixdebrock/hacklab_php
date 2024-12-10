<?php

interface DAO
{

    public function get();
    public function add(Item $item);
    public function delete(int $id);
}
