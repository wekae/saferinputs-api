<?php


namespace App\Services\Cms;


use App\Http\Requests\cms\CommentsRequest;
use App\Repositories\Cms\CommentsRepositoryMysqlImpl;
use Illuminate\Http\Request;

class CommentsService
{
    protected $commentsRepository;

    public function __construct(CommentsRepositoryMysqlImpl $commentsRepository)
    {
        $this->commentsRepository = $commentsRepository ;
    }

    public function findAll(Request $request){
        $attributes = array("request"=>$request);
        return $this->commentsRepository->all($attributes);
    }

    public function find($id){
        return $this->commentsRepository->find($id);
    }

    public function findByPost(Request $request){
        $attributes = array("request"=>$request);
        return $this->commentsRepository->findByPost($attributes);
    }

    public function create(CommentsRequest $request){
        $attributes = array("request" => $request);
        return $this->commentsRepository->create($attributes);
    }

    public function update(CommentsRequest $request, $id){
        $attributes = array("request"=>$request);
        return $this->commentsRepository->update($id, $attributes);
    }

    public function delete($id){
        return $this->commentsRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array('request'=>$request);
        return $this->commentsRepository->filter($attributes);
    }

    public function summaryCount(Request $request){
        $attributes = array('request'=>$request);
        return $this->commentsRepository->summaryCount($attributes);
    }






}
