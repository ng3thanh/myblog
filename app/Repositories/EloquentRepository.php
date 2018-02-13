<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Redirect;

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
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->_model->findOrFail($id);
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

            $result['status'] = true;
            $result['content'] = $new;

        } catch (Exception $e) {
            DB::rollBack();
            logger('【 ' . __METHOD__ . ' 】 - ' . $e->getMessage());

            $result['status'] = false;
            $result['content'] = $e->getMessage();
        }
        return $result;
    }

    /**
     * Update
     *
     * @param $id
     * @param array $attributes            
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {

        $update = $this->find($id);
        if ($update) {
            try {
                DB::beginTransaction();

                $update->update($attributes);
                
                DB::commit();

                $result['status'] = true;
                $result['content'] = $update;

            } catch (Exception $e) {
                DB::rollBack();
                logger('【 ' . __METHOD__ . ' 】 - ' . $e->getMessage());

                $result['status'] = false;
                $result['content'] = $e->getMessage();
            }

        } else {
            $result['status'] = false;
            $result['content'] = 'Not found data to update';
        }

        return $result;
        
    }

    /**
     * Delete
     *
     * @param $id
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

    /**
     * Paginate data
     *
     * @param $paging
     * @return mixed
     */
    public function paginate($paging, $sort = 'asc', $orderBy = 'created_at'){
        return $this->_model->orderBy($orderBy, $sort)->paginate($paging);
    }

    /**
     * Get last item base on order by
     *
     * @param $orderBy
     * @param string $sort
     * @return mixed
     */
    public function getLastItemOrderBy($orderBy = 'created_at', $sort = 'asc') {
        return $this->_model->orderBy($orderBy, $sort)->firstOrFail();
    }
}