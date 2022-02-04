<?php
namespace App\Repositories;

interface StudentRepositoryInterface
{
    public function index($request);

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($id);

    public function list($request);
}
