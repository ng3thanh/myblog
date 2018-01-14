<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

abstract class EloquentRepository implements RepositoryInterface
{

    /**
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $_model;

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     *
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->_model = app()->make($this->getModel());
    }

    /**
     * Get All
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->_model->all();
    }

    /**
     * Get one
     *
     * @param
     *            $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->_model->find($id);
        return $result;
    }

    /**
     * Create
     *
     * @param array $attributes            
     * @return mixed
     */
    public function create(array $attributes)
    {
        try {
            DB::beginTransaction();
            
            $new = new $this->_model;

            foreach ($attributes as $key => $value) {
                $new->$key = $attributes[$key];
            }

            $new->save();
            
            DB::commit();
            
            return $new;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * Update
     *
     * @param
     *            $id
     * @param array $attributes            
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {

        $result = $this->find($id);
        if ($result) {
            try {
                DB::beginTransaction();
                
                $result->update($attributes);
                
                DB::commit();
                
                return $result;
                
            } catch (Exception $e) {
                DB::rollBack();
                
                return false;
            }
        }
        
        return false;
        
    }

    /**
     * Delete
     *
     * @param
     *            $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();
            return true;
        }
        
        return false;
    }
}