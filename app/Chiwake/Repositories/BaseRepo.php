<?php namespace Chiwake\Repositories;

/*
 * No se realizan llamadas estaticas = static
 */

abstract class BaseRepo {

    const PAGINATE = true;

    public $filters = [];

    abstract public function getModel();

    //BUSCAR Y MOSTRAR ERROR
    public function findOrFail($id)
    {
        return $this->getModel()->findOrFail($id);
    }

    //ORDENAR
    public function orderBy($field, $order)
    {
        return $this->getModel()->orderBy($field, $order)->get();
    }

    //PAGINACION
    public function pagination($value)
    {
        return $this->getModel()->paginate($value);
    }

    //LISTAR
    public function lists($field, $id)
    {
        return $this->getModel()->lists($field, $id);
    }

    //MOSTRAR
    public function all(){
        return $this->getModel()->all();
    }

    //SELECT
    public function where($field, $value)
    {
        return $this->getModel()->where($field, $value);
    }

    //FILTRAR
    public function search(array $data = array(), $paginate = false, $orderField, $orderType)
    {
        $data = array_only($data, $this->filters);
        $data = array_filter($data, 'strlen');
        $q = $this->getModel()->select()->orderBy($orderField, $orderType);
        foreach ($data as $field => $value)
        {
            // slug_url -> filterBySlugUrl
            $filterMethod = 'filterBy' . studly_case($field);
            if (method_exists(get_called_class(), $filterMethod))
            {
                $this->$filterMethod($q, $value);
            }
            else
            {
                $q->where($field, $data[$field]);
            }
        }
        return $paginate ?
            $q->paginate()->appends($data)
            : $q->get();
    }

    //FILTRO
    public function filterBySearch($q, $value)
    {
        $q->where('titulo', 'LIKE', "%$value%");
    }

    public function create($entity, array $data)
    {
        $entity->save();
        return $entity;
    }

    public function update($entity, array $data)
    {
        $entity->fill($data);
        $entity->save();
        return $entity;
    }

    public function delete($entity)
    {
        if (is_numeric($entity))
        {
            $entity = $this->findOrFail($entity);
        }
        $entity->delete();
        return $entity;
    }
}