<?php

namespace App\Repositories;

interface BaseRepoInterface
{
    // Get all records of model
    public function getAll(array $relations = [], string $orderBy = 'id', string $orderDir = 'asc');

    // Get all records of model with pagination
    public function getAllWithPaginate(int $paginateNumber, array $relations = [], string $orderBy = 'id', string $orderDir = 'asc');

    // Find an record of model
    public function find(int $id, array $relations = []);

    // Find by where and order by
    public function findByWhere(array $where, array $relations = [], string $orderBy = 'id', string $order = 'asc');

    // Get records by where in
    public function findByWhereIn(string $condition, array $attributes, array $relations = []);

    // Find by where like
    public function findByWhereLike(array $where, array $relations = []);

    // Get record where not in
    public function findByWhereNotIn(string $condition, array $attributes, array $relations = []);

    // Get record where between
    public function findByWhereBetween(string $condition, array $attributes, array $relations = []);

    // Create new record
    public function create(array $attributes);

    // Update an record
    public function update(int $id, array $attributes);

    // Delete an record
    public function delete(int $id);
}
